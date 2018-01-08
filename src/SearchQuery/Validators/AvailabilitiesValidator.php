<?php

namespace Tajawal\SearchQuery\Validators;

use \Exception;

class AvailabilitiesValidator{
    
    public function validate($availabilitiesRanges){
        if($this->isEmpty($availabilitiesRanges) )
            throw new Exception('Availabilities can`t be empty');
    }

    protected function isEmpty($availabilitiesRanges){
        foreach ($availabilitiesRanges as $range) {
            if(empty($range)) return true;

        }
        return false;
    }

}
