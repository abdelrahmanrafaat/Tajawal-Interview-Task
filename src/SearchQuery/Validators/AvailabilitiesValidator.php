<?php

namespace Tajawal\SearchQuery\Validators;

use \Exception;

class AvailabilitiesValidator{
    
    public function validate(array $availabilitiesRanges){
        if($this->isEmpty($availabilitiesRanges) )
            throw new Exception('Availabilities can`t be empty');
    }

    protected function isEmpty(array $availabilitiesRanges){
        foreach ($availabilitiesRanges as $range) {
            if(empty($range)) return true;
        }

        return false;
    }

}
