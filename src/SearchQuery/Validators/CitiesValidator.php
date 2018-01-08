<?php
namespace Tajawal\SearchQuery\Validators;

use Exception;

class CitiesValidator{
    
    public function validate($cities){
        if($this->isEmpty($cities))
            throw new Exception('Cities Can`t be empty');
    }

    protected function isEmpty($cities){
        foreach ($cities as $city) {
            if(empty($city)) return true;
        }

        return false;
    }
}
