<?php

namespace MagicSpice\ClassHelper\Coerce;

trait IntToString
{
    /**
     * @param int $int
     *
     * @return string
     */
    protected function convertIntToString($int)
    {
        return "$int";
    }
}
