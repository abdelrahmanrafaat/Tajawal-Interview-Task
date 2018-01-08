<?php

namespace Tajawal\Config\Keys;

use Tajawal\Config\Keys\KeysGetter;

class Searchable extends KeysGetter
{
    public function __construct(Array $keys = [])
    {
        $keys = (count($keys) == 0) ? ['name', 'city', 'price', 'availability'] : $keys;
        parent::__construct($keys);
    }


}
