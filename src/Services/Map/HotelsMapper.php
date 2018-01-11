<?php
namespace Tajawal\Services\Map;

use Tajawal\Helpers\CarbonHelpers;

class HotelsMapper{

    public function map(array $hotels){

        return array_map(function($hotel){
            $mappedHotel =  (object)[];

            $mappedHotel->name = $this->mapName($hotel->name);
            $mappedHotel->price = $this->mapPrice($hotel->price);
            $mappedHotel->city = $this->mapCity($hotel->city);
            $mappedHotel->availability = $this->mapAvailability($hotel->availability);

            return $mappedHotel;
        }, $hotels);
    }

    public function mapName($name){
        return $name;
    }

    public function mapPrice($price){
        return $price;
    }

    public function mapCity($city){
        return $city;
    }

    public function mapAvailability(array $availability){
        return array_map(function($availablePeriod){
            return (object)[
                'from' => CarbonHelpers::convertFromString($availablePeriod->from),
                'to' => CarbonHelpers::convertFromString($availablePeriod->to),
            ];
        }, $availability);
    }

}