<?php

namespace MagicSpice\Dummy;

use MagicSpice\ClassHelper\Accessor\Get;
use MagicSpice\ClassHelper\Coerce\IntToString;
use MagicSpice\ClassHelper\Coerce\StringToInt;

class LoosePerson extends Person
{
    use StringToInt;
    use IntToString;
    use Get {
        getStringOrNull as public getAddress;
    }
}
