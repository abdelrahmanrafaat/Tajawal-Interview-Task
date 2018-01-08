<?php

namespace Tajawal\SearchQuery\Readers;

use Tajawal\SearchQuery\Validators\CitiesValidator;
use Tajawal\Helpers\StringHelpers;

class CitiesReader{
    protected $inputReader;

    public function __construct($inputReader){
        $this->inputReader = $inputReader;
    }

    public function read(){
        return $this->parse($this->inputReader->readLine());
    }

    protected function parse($citiesString){
        $cities = StringHelpers::commaExplode($citiesString);

        $this->validate($cities);

        return $cities;
    }

    protected function validate($cities){
        return (new CitiesValidator)->validate($cities);   
    }
}
