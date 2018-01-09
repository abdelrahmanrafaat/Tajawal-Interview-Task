<?php

namespace Tajawal\Helpers;

class StringHelpers{
    public static function commaExplode($string){
        return explode(',', trim($string, ','));
    }

    public static function contains($haystack, $needle){
        return stripos($haystack, $needle) !== false;
    }
}