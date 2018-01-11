<?php

namespace Tests\Helpers;

use PHPUnit\Framework\TestCase;
use Tajawal\Helpers\StringHelpers;

class StringHelpersTest extends TestCase
{
    public function testCommaExplode(){
        $this->assertEquals(['a', 'b', 'c'], StringHelpers::commaExplode('a,b,c'));
        $this->assertEquals(['a', 'b', 'c'], StringHelpers::commaExplode(',,a,b,c,,'));
    }

    public function testCommaImplode(){
        $this->assertEquals('a,b,c', StringHelpers::commaImplode(['a', 'b', 'c']));
        $this->assertEquals('a', StringHelpers::commaImplode(['a']));
    }

    public function testContains(){
        $this->assertTrue(StringHelpers::contains('house of stark', 'stark'));
        $this->assertFalse(StringHelpers::contains('house of stark', 'lannister'));
    }

}