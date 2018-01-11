<?php

namespace Tests\Config\Keys;

use PHPUnit\Framework\TestCase;
use Tajawal\Config\Keys\Searchable;

class SearchableTest extends TestCase
{
    public function testKeysShouldReturnDefaults()
    {
        $defaults = ['name', 'city', 'price', 'availability'];

        $searchable = new Searchable;
        $this->assertEquals($defaults, $searchable->getKeys());
        $this->assertEquals('name,city,price,availability', $searchable->toString());
    }
}