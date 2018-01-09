<?php

namespace Tajawal\Services\Sort;

class HotelsSorter{
    public function sort($hotels, $sortyBy){
        $sortyBy = (empty($sortyBy)) ? 'price' : $sortyBy;

        usort($hotels, function($first, $secound) use (&$sortyBy) {
            return $first->{$sortyBy} > $secound->{$sortyBy};
        });

        return $hotels;
    }
}
