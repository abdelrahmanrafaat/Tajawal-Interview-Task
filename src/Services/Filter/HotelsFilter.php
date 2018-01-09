<?php

namespace Tajawal\Services\Filter;

use Tajawal\Helpers\CarbonHelpers;

class HotelsFilter{
    public function filter($hotels, $query){
        
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

    protected function filterExists($query, $key){
        return isset($query[$key]);
    }

    protected function applyNameFilter($hotelName, $queryNames){
        return in_array($hotelName, $queryNames);

    }

    protected function applyCityFilter($hotelCity, $queryCities){
        return in_array($hotelCity, $queryCities);
    }

    protected function applyPriceFilter($hotelPrice, $queryPriceRange){
        return $queryPriceRange['from'] <= $hotelPrice && $hotelPrice <= $queryPriceRange['to'];
    }

    protected function applyAvailabilityFilter($hotelAvailabilities, $queryAvailabilities){
        foreach ($hotelAvailabilities as $hotelAvailablePeriod) {
            foreach ($queryAvailabilities as $searchPeriod) { 
                if(
                    CarbonHelpers::greaterThanOrEqual($hotelAvailablePeriod->from, $searchPeriod['from']) &&
                    CarbonHelpers::greaterThanOrEqual($hotelAvailablePeriod->to, $searchPeriod['to']) 
                ){
                    return true;
                }
            }
        }
        
        return false;
    }

    
}