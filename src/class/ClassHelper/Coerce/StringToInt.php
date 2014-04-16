<?php

namespace MagicSpice\ClassHelper\Coerce;

trait StringToInt
{
    /**
     * @param string $string
     *
     * @return int
     * @throws \Exception
     */
    protected function convertStringToInt($string)
    {
        $maxLength = strlen(PHP_INT_MAX) - 1;
        if ($string === '0' || preg_match("/^-?[1-9][0-9]{0,$maxLength}$/", $string)) {
            $value = $string + 0;
            if (is_int($value)) {
                return $value;
            }
        }
        throw new \InvalidArgumentException(sprintf('%s can not convert to int.', $string));
    }
}
