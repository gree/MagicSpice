<?php

namespace MagicSpice\Dummy;

class StrictPerson extends Person
{
    protected function validateName($name)
    {
        if (strlen($name) > 10) {
            return true;
        }
    }

    protected function fallbackName($name, $result)
    {
        return substr($name, 0, 10);
    }
}
