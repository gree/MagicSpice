<?php

namespace MagicSpice\Dummy;

use DateTime;
use MagicSpice\ClassHelper;

trait ExtendedClassHelper
{
    use ClassHelper;

    // must be defined if you want to extend class helper
    protected function magicIsClassHelperTraitName($traitName)
    {
        return $traitName === __TRAIT__;
    }

    private function validateTypeDateTime($value)
    {
        return !$value instanceof DateTime;
    }

    /**
     * @return DateTime
     */
    private function getDateTime()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetPropertyName($name);
        }

        return $this->helperProperties[$name];
    }

    /**
     * @return DateTime|null
     */
    private function getDateTimeOrNull()
    {
        static $name;
        if (!$name) {
            $name = $this->magicGetProperty($name);
        }

        return $this->helperProperties[$name];
    }
}
