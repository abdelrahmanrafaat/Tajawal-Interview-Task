<?php

namespace Tests\Config\Keys;

use PHPUnit\Framework\TestCase;
use Tajawal\Config\Keys\KeysGetter;

class KeysGetterTest extends TestCase
{
    public function testGetKeysReturnsArrayOfKeys(){
        $keys = ['firstKey', 'secoundKey'];
        $keysGetter = new KeysGetter($keys);

        $this->assertEquals($keys, $keysGetter->getKeys());
    }    

    public function testToStringReturnsKeysSeperatedByComma(){
        $keys = ['firstKey', 'secoundKey'];
        $keysGetter = new KeysGetter($keys);

        $this->assertEquals('firstKey,secoundKey', $keysGetter->toString());
    }
}