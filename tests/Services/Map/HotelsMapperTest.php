<?php

namespace Tests\Services\Map;

use PHPUnit\Framework\TestCase;
use Tajawal\Services\Mocks\UnMappedHotelsMock;
use Tajawal\Services\Map\HotelsMapper;
use Tajawal\Helpers\CarbonHelpers;

class HotelsMapperTest extends TestCase
{
    private $hottelsMapper;
    private $unMappedHotels;

    public function __construct(){
        parent::__construct();

        $this->hotelsMapper = new HotelsMapper;
        $this->unMappedHotels = new UnMappedHotelsMock;
    }

    public function testMapNameReturnsName(){
        $hotelName = $this->unMappedHotels->getOneHotel()->name;
        $this->assertEquals($hotelName, $this->hotelsMapper->mapName($hotelName));
    }

    public function testMapCityReturnsCity(){
        $hotelCity = $this->unMappedHotels->getOneHotel()->city;
        $this->assertEquals($hotelCity, $this->hotelsMapper->mapCity($hotelCity));
    }

    public function testMapPriceReturnsPrice(){
        $hotelPrice = $this->unMappedHotels->getOneHotel()->price;
        $this->assertEquals($hotelPrice, $this->hotelsMapper->mapPrice($hotelPrice));
    }

    public function testMapAvailabilityReturnsArrayObjectOfContainingCarbonInstances(){
        $hotelFirstAvailability = $this->unMappedHotels->getOneHotel()->availability[0];
        
        $mappedAvailability = [ 
            (object)[
                'from' => CarbonHelpers::convertFromString($hotelFirstAvailability->from),
                'to' => CarbonHelpers::convertFromString($hotelFirstAvailability->to),
            ]
        ];

        $this->assertEquals($mappedAvailability, $this->hotelsMapper->mapAvailability([$hotelFirstAvailability]));
    }

}