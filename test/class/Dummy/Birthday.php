<?php

namespace MagicSpice\Dummy;

use MagicSpice\ClassHelper;

class Birthday
{
    use ClassHelper {
        getInt as public getYear;
        getInt as public getMonth;
        getInt as public getDay;
    }

    protected function validateYear($year)
    {
        if ($year < 1900) {
            return true;
        }
    }

    protected function validateMonth($month)
    {
        if ($month < 1) {
            return 1;
        }
        if ($month > 12) {
            return 12;
        }
    }

    protected function fallbackMonth($month, $result)
    {
        return $result;
    }

    protected function validateDay($day)
    {
        if ($day < 1) {
            return 1;
        }
        if ($day > 31) {
            return 31;
        }
    }

    protected function fallbackDay($day, $result)
    {
        return $result;
    }

    protected function validateMutualCondition(array $properties)
    {
        $lastDay = 31;
        if ($properties['month'] === 2) {
            if (($properties['year'] % 4 === 0 && $properties['year'] % 100) || $properties['year'] % 400 === 0) {
                $lastDay = 29;
            } else {
                $lastDay = 28;
            }
        } elseif (in_array($properties['month'], [4, 6, 9, 11])) {
            $lastDay = 30;
        }

        if ($properties['day'] > $lastDay) {
            return $lastDay;
        }
    }

    protected function fallbackMutualCondition(array $properties, $result)
    {
        $properties['day'] = $result;

        return $properties;
    }
}
