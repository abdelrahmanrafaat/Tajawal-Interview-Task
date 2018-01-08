<?php

namespace Tajawal\Config\Keys;

use Tajawal\Config\Keys\KeysGetterInterface;

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
        $keysDelimiter = ','; 
        return implode($keysDelimiter, $this->keys);
    }

}