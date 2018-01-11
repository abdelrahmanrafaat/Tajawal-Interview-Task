<?php

namespace Tests\Config\Keys;

use PHPUnit\Framework\TestCase;
use Tajawal\Config\Keys\Sortable;

class SortableTest extends TestCase
{
    public function testKeysShouldReturnDefaults()
    {
        $defaults = ['name', 'price'];

        $sortable = new Sortable;
        $this->assertEquals($defaults, $sortable->getKeys());
        $this->assertEquals('name,price', $sortable->toString());
    }
}