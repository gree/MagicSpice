<?php

namespace MagicSpice\Dummy;

class Event
{
    use ExtendedClassHelper {
        getString as public getName;
        getDateTime as public getDate;
    }
}
