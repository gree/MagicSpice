<?php

namespace MagicSpice\ClassHelper\Accessor;

trait Set
{
    use Common;

    /**
     * @param array $value
     *
     * @return void
     */
    private function setArray(array $value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param array|null $value
     *
     * @return void
     */
    private function setArrayOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param bool $value
     *
     * @return void
     */
    private function setBool($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param bool|null $value
     *
     * @return void
     */
    private function setBoolOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName($value);
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param callable $value
     *
     * @return void
     */
    private function setCallable($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param callable|null $value
     *
     * @return void
     */
    private function setCallableOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param float $value
     *
     * @return void
     */
    private function setFloat($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param float|null $value
     *
     * @return void
     */
    private function setFloatOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param int $value
     *
     * @return void
     */
    private function setInt($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param int|null $value
     *
     * @return void
     */
    private function setIntOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param object $value
     *
     * @return void
     */
    private function setObject($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param object|null $value
     *
     * @return void
     */
    private function setObjectOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param resource $value
     *
     * @return void
     */
    private function setResource($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param resource|null $value
     *
     * @return void
     */
    private function setResourceOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param string $value
     *
     * @return void
     */
    private function setString($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }

    /**
     * @param string|null $value
     *
     * @return void
     */
    private function setStringOrNull($value)
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName();
        }

        $this->magicSetProperties([$name => $value], false);
    }
}
