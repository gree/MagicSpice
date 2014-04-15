<?php

namespace MagicSpice\Dummy;

use MagicSpice\ClassHelper\Accessor\Get;
use MagicSpice\ClassHelper\Accessor\Set;

class SettablePerson extends Person
{
    use Get, Set {
        getStringOrNull as public getAddress;
        setString as public setName;
        setInt as public setAge;
        setStringOrNull as public setAddress;
    }
}
