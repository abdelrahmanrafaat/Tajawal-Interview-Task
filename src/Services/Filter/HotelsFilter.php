<?php

namespace Tajawal\Services\Filter;

use Tajawal\Helpers\CarbonHelpers;
use Tajawal\Helpers\StringHelpers;

class HotelsFilter{
    public function filter(array $hotels, array $query){
        
        return array_filter($hotels, function($hotel) use (& $query){
            $isValidHotel = true;

            if($this->filterExists($query, 'name'))
                $isValidHotel = $isValidHotel && $this->applyNameFilter($hotel->name, $query['name']);
            
            if(!$isValidHotel) return false;

            if($this->filterExists($query, 'city'))
                $isValidHotel = $isValidHotel && $this->applyCityFilter($hotel->city, $query['city']);

            if(!$isValidHotel) return false;

            if($this->filterExists($query, 'price'))
                $isValidHotel = $isValidHotel && $this->applyPriceFilter($hotel->price, $query['price']);

            if(!$isValidHotel) return false;

            if($this->filterExists($query, 'availability'))
                $isValidHotel = $isValidHotel && $this->applyAvailabilityFilter($hotel->availability, $query['availability']);

            return $isValidHotel;
        });
    }

    protected function filterExists(array $query, $key){
        return isset($query[$key]);
    }

    public function applyNameFilter($hotelName, array $queryNames){
        foreach($queryNames as $desiredHotelName){
            if(StringHelpers::contains($hotelName, $desiredHotelName))
                return true;
        }

        return false;
    }

    public function applyCityFilter($hotelCity, array $queryCities){
        foreach($queryCities as $desiredCity){
            if(StringHelpers::contains($hotelCity, $desiredCity))
                return true;
        }

        return false;
    }

    public function applyPriceFilter($hotelPrice, array $queryPriceRange){
        return $queryPriceRange['from'] <= $hotelPrice && $hotelPrice <= $queryPriceRange['to'];
    }

    public function applyAvailabilityFilter(array $hotelAvailabilities, array $queryAvailabilities){
        foreach ($hotelAvailabilities as $hotelAvailablePeriod) {
            foreach ($queryAvailabilities as $searchPeriod) { 
                if(
                    CarbonHelpers::greaterThanOrEqual($hotelAvailablePeriod->from, $searchPeriod['from']) &&
                    CarbonHelpers::greaterThanOrEqual($hotelAvailablePeriod->to, $searchPeriod['to']) &&
                    CarbonHelpers::isWithinSameYear($hotelAvailablePeriod->from, $searchPeriod['from']) &&
                    CarbonHelpers::isWithinSameYear($hotelAvailablePeriod->to, $searchPeriod['to'])
                ){
                    return true;
                }
            }
        }
        
        return false;
    }
}
