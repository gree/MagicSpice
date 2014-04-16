<?php

namespace MagicSpice;

trait ClassHelper
{
    use ClassHelper\Accessor\Get;

    protected $helperProperties;

    public function __construct(array $properties)
    {
        $this->magicSetProperties($properties);
    }

    protected function magicIsClassHelperTraitName($traitName)
    {
        return $traitName === __TRAIT__ || $traitName === 'MagicSpice\\ClassHelper\\Accessor\\Get';
    }

    /**
     * @return string
     */
    protected function magicGetPropertyName()
    {
        return strtolower(preg_replace(
            '/[A-Z]/',
            '_$0',
            lcfirst(preg_replace('/^(get|set|is)/', '', debug_backtrace(false, 2)[1]['function']))
        ));
    }

    /**
     * @param array $properties
     * @param bool $checkAll
     * @throws \Exception
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    protected function magicSetProperties(array $properties, $checkAll = true)
    {
        static $meta = [];
        static $converters = [];
        static $validators = [];

        $class = get_class($this);
        if (!isset($meta[$class])) {
            $meta[$class] = [];
            $converters[$class] = [];
            $validators[$class] = [];
            $self = new \ReflectionClass($this);
            $aliases = [$self->getTraitAliases()];
            $parent = $self->getParentClass();
            while ($parent) {
                array_unshift($aliases, $parent->getTraitAliases());
                $parent = $parent->getParentClass();
            }
            $aliases = call_user_func_array('array_merge', $aliases);
            foreach ($aliases as $alias => $traitMethod) {
                list($trait, $method) = explode('::', $traitMethod);
                if (!$this->magicIsClassHelperTraitName($trait)) {
                    continue;
                }
                $type = lcfirst(preg_replace('/OrNull$/', '', substr($method, 3), -1, $nullable));
                $camelProperty = ucfirst(preg_replace('/^(get|is)/', '', $alias));
                $snakeProperty =
                    strtolower(preg_replace('/[A-Z]/', '_$0', lcfirst($camelProperty)));
                $validator = [$this, 'validate' . $camelProperty];
                $fallback = [$this, 'fallback' . $camelProperty];
                $meta[$class][$snakeProperty] = [
                    'type' => $type,
                    'nullable' => (bool)$nullable,
                    'validator' => is_callable($validator) ? $validator : null,
                    'fallback' => is_callable($fallback) ? $fallback : null,
                ];
            }
        }

        foreach ($meta[$class] as $property => $propertyMeta) {
            $type = $propertyMeta['type'];
            $nullable = $propertyMeta['nullable'];

            if (!array_key_exists($property, $properties)) {
                if (!$checkAll) {
                    continue;
                }

                if ($nullable) {
                    $this->helperProperties[$property] = null;
                } else {
                    $message = sprintf('%s::%s must be defined.', __CLASS__, $property);
                    throw new \InvalidArgumentException($message);
                }
                $value = null;
            } else {
                $value = $properties[$property];
            }

            if (isset($validators[$class][$type])) {
                $validator = $validators[$class][$type]['function'];
                $expected  = $validators[$class][$type]['expected'];
            } else {
                $validator = "is_$type";
                $expected = true;
                if (!function_exists($validator)) {
                    $validator = [$this, 'validateType' . ucfirst($type)];
                    $expected = false;
                }
                $validators[$class][$type]['function'] = $validator;
                $validators[$class][$type]['expected'] = $expected;
            }

            // validate type
            if (!($nullable && is_null($value)) && $expected !== $validator($value)) {
                $actualType = gettype($value);
                $actualType = str_replace(['integer', 'double', 'boolean'], ['int', 'float', 'bool'], $actualType);
                $key = "{$actualType} {$type}";
                if (isset($converters[$class][$key])) {
                    $converter = $converters[$class][$key];
                } else {
                    $converter = [$this, sprintf('convert%sTo%s', ucfirst($actualType), ucfirst($type))];
                    if (!is_callable($converter)) {
                        //marks converter doesn't exist
                        $converter = 0;
                    }
                    $converters[$class][$key] = $converter;
                }

                if ($converter) {
                    // coerce and rescue
                    $value = $converter($value);
                } else {
                    if (is_object($value)) {
                        $value = 'a instance of ' . get_class($value);
                    } elseif (is_array($value)) {
                        $value = 'array';
                    } else {
                        $value = var_export($value, true);
                    }
                    $message = sprintf(
                        '%s::%s must be %s. %s is %s',
                        __CLASS__,
                        $property,
                        $type,
                        $value,
                        $actualType
                    );
                    throw new \InvalidArgumentException($message);
                }
            }

            // validate property constraint
            if ($propertyMeta['validator']) {
                $exception = null;
                try {
                    $result = $propertyMeta['validator']($value);
                } catch (\Exception $exception) {
                    $result = $exception;
                }

                if ($result) {
                    if ($propertyMeta['fallback']) {
                        $value = $propertyMeta['fallback']($value, $result);
                    } else {
                        if ($exception) {
                            throw $exception;
                        }
                        $message = sprintf(
                            '%s::%s value %s is invalid.',
                            __CLASS__,
                            $property,
                            $value
                        );
                        throw new \InvalidArgumentException($message);
                    }
                }
            }

            $this->helperProperties[$property] = $value;
        }
    }
}
