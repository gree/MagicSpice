<?php

namespace MagicSpice\Dummy;

use MagicSpice\ClassHelper;

class Person
{
    use ClassHelper {
        getString as public getName;
        getInt as public getAge;
    }
}
