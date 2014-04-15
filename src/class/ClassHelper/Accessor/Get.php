<?php

namespace MagicSpice\ClassHelper\Accessor;

trait Get
{
    use Common;

    /**
     * @return array
     */
    private function getArray()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return array|null
     */
    private function getArrayOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return bool
     */
    private function getBool()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return bool|null
     */
    private function getBoolOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return callable
     */
    private function getCallable()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return callable|null
     */
    private function getCallableOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return float
     */
    private function getFloat()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return float|null
     */
    private function getFloatOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return int
     */
    private function getInt()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return int|null
     */
    private function getIntOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return object
     */
    private function getObject()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return object|null
     */
    private function getObjectOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return resource
     */
    private function getResource()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return resource|null
     */
    private function getResourceOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return string
     */
    private function getString()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return string|null
     */
    private function getStringOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        return $this->helperProperties[$name];
    }
}
