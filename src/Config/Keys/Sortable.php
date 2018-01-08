<?php

namespace Tajawal\Config\Keys;

use Tajawal\Config\Keys\KeysGetter;

class Sortable extends KeysGetter
{
    public function __construct(Array $keys = [])
    {
        $keys = (count($keys) == 0) ? ['name', 'price'] : $keys;
        parent::__construct($keys);
    }

}
