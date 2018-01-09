<?php
namespace Tajawal\Services\Map;

use Tajawal\Helpers\CarbonHelpers;

class HotelsMapper{

    public function map(array $hotels){
        return array_map(function($hotel){
            $mappedHotel =  (object)[];

            $mappedHotel->name  = $hotel->name;
            $mappedHotel->price = $hotel->price;
            $mappedHotel->city = $hotel->city;
            $mappedHotel->availability = $this->mapAvailability($hotel->availability);

            return $mappedHotel;
        }, $hotels);
    }

    protected function mapAvailability(array $availability){
        return array_map(function($availablePeriod){
            return (object)[
                'from' => CarbonHelpers::convertFromString($availablePeriod->from),
                'to' => CarbonHelpers::convertFromString($availablePeriod->to),
            ];
        }, $availability);
    }

}