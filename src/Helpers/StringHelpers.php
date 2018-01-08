<?php

namespace Tajawal\Helpers;

class StringHelpers{
    public static function commaExplode($string){
        return explode(',', trim($string, ','));
    }
}