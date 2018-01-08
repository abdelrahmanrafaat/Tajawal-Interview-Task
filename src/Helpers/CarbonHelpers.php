<?php
namespace Tajawal\Helpers;

use Carbon\Carbon;

class CarbonHelpers{
    public static function convertFromString($stringDate){
        return Carbon::createFromFormat('d-m-Y', $stringDate)->startOfDay();
    }

    public static function getMinAndMax($firstDate, $secoundDate){
        return [
            'min' => $firstDate->min($secoundDate),
            'max' => $firstDate->max($secoundDate),
        ];
    }

    public static function greaterThanOrEqual($first, $secound){
        return $first->gte($secound);
    }

}