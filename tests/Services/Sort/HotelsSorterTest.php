<?php

namespace Tests\Services\Sort;

use PHPUnit\Framework\TestCase;
use Tajawal\Services\Sort\HotelsSorter;

class HotelsSorterTest extends TestCase
{
    private $hotelsSorter;

    public function __construct()
    {
        $this->hotelsSorter = new HotelsSorter;

        parent::__construct();
    }

    public function testSortByName()
    {
        $unsortedHotels = [
            (object)[
                'name' => 'c-hotel'
            ],
            (object)[
                'name' => 'a-hotel'
            ],
            (object)[
                'name' => 'b-hotel'
            ],
        ];

        $sortedHotels = $this->hotelsSorter->sort($unsortedHotels, 'name');

        $this->assertEquals($sortedHotels[0]->name, 'a-hotel');
        $this->assertEquals($sortedHotels[2]->name, 'c-hotel');
    }

    public function testSortByPrice()
    {
        $unsortedHotels = [
            (object)[
                'price' => 10
            ],
            (object)[
                'price' => 20
            ],
            (object)[
                'price' => 7
            ],
        ];

        $sortedHotels = $this->hotelsSorter->sort($unsortedHotels, 'price');

        $this->assertEquals($sortedHotels[0]->price, 7);
        $this->assertEquals($sortedHotels[2]->price, 20);
    }

}