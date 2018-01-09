<?php

namespace Tajawal\SortQuery;

use Tajawal\Config\Keys\Sortable;
use Exception;

class Validator{
    public function validate($sortOption){
        if( !empty($sortOption) && !in_array($sortOption, (new Sortable)->getKeys()) )
            throw new Exception('Invalid Sorting option');
    }

}
