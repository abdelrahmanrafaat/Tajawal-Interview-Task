<?php

namespace Tajawal\SearchQuery\Validators;

use Exception;

class PriceValidator{
    
    public function validate($priceRange){
        if(!$this->checkRangeSize($priceRange) || !$this->areNumbers($priceRange))
            throw new Exception('Invalid Price Range');
    }

    protected function checkRangeSize(Array $priceRange){
        return count($priceRange) == 2; 
    }

    protected function areNumbers(Array $priceRange){
        foreach ($priceRange as $price) {
            if(!is_numeric($price)) return false;
        }

        return true;
    }

}