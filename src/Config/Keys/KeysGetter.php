<?php

namespace Tajawal\Config\Keys;

use Tajawal\Config\Keys\KeysGetterInterface;
use Tajawal\Helpers\StringHelpers;

class KeysGetter implements KeysGetterInterface{

    private $keys;

    public function __construct(Array $keys)
    {
        $this->keys = $keys;
    }

    public function getKeys()
    {
        return $this->keys;
    }
    
    public function toString()
    {
        return StringHelpers::commaImplode($this->keys);
    }

}