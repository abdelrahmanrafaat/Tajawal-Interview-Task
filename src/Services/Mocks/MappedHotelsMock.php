<?php
namespace Tajawal\Services\Mocks;

use Tajawal\Services\Mocks\UnMappedHotelsMock;
use Tajawal\Services\Map\HotelsMapper;

class MappedHotelsMock
{
    public function get()
    {
        $unMappedHotels = (new UnmappedHotelsMock)->get();
        return (new HotelsMapper)->map($unMappedHotels);
    }

}

