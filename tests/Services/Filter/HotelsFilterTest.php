<?php

namespace Tests\Services\Filter;

use PHPUnit\Framework\TestCase;
use Tajawal\Services\Filter\HotelsFilter;
use Tajawal\Services\Mocks\MappedHotelsMock;
use Tajawal\Helpers\CarbonHelpers;

class HotelsFilterTest extends TestCase
{
    private $hotelsFilter;
    private $hotels;

    public function __construct()
    {
        $this->hotelsFilter = new HotelsFilter;
        $this->hotels = (new MappedHotelsMock)->get();

        parent::__construct();
    }

    public function testQueryNamesContainsHotelName()
    {
        $queryNames = ['helton', 'rotana'];

        $this->assertTrue($this->hotelsFilter->applyNameFilter('rotana', $queryNames));
        $this->assertFalse($this->hotelsFilter->applyNameFilter('dontExist', $queryNames));
    }

    public function testQueryCitiesContainsHotelCity()
    {
        $queryNames = ['cairo', 'dubai'];

        $this->assertTrue($this->hotelsFilter->applyCityFilter('cairo', $queryNames));
        $this->assertFalse($this->hotelsFilter->applyCityFilter('dontExist', $queryNames));
    }

    public function testHotelPriceIsWithinQueryPriceRange()
    {
        $queryPrice = ['from' => 10, 'to' => 200];

        $this->assertTrue($this->hotelsFilter->applyPriceFilter(50, $queryPrice));
        $this->assertFalse($this->hotelsFilter->applyPriceFilter(500, $queryPrice));
    }

    public function testHotelAvailabilitesMatchesQueryAvailabilites()
    {
        $hotelAvailabiltiy = $this->hotels[0]->availability;

        $withinRangeAvailability = [
            [
                'from' => CarbonHelpers::convertFromString('1-10-2020'),
                'to' => CarbonHelpers::convertFromString('10-10-2020'),
            ],
        ];

        $outOfRangeAvailability = [
            [
                'from' => CarbonHelpers::convertFromString('1-5-2002'),
                'to' => CarbonHelpers::convertFromString('10-5-2002'),
            ],
        ];

        $this->assertTrue($this->hotelsFilter->applyAvailabilityFilter($hotelAvailabiltiy, $withinRangeAvailability));
        $this->assertFalse($this->hotelsFilter->applyAvailabilityFilter($hotelAvailabiltiy, $outOfRangeAvailability));
    }



}