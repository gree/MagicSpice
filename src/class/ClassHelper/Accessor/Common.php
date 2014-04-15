<?php

namespace MagicSpice\ClassHelper\Accessor;

trait Common
{
    /**
     * @param $traitName
     *
     * @return bool
     */
    abstract protected function magicIsClassHelperTraitName($traitName);

    /**
     * @return string
     */
    abstract protected function magicGetPropertyName();

    /**
     * @param array $properties
     * @param bool $checkAll
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    abstract protected function magicSetProperties(array $properties, $checkAll = true);
}
