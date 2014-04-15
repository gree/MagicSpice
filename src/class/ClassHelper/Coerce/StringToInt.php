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
            $value = eval("return $string;");
            if (is_int($value)) {
                return $value;
            }
        }
        throw new \Exception(sprintf('%s is can not convert to int.'), $string);
    }
}
