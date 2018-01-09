<?php

namespace Tajawal\SearchQuery\Readers;

use Tajawal\SearchQuery\Validators\CitiesValidator;
use Tajawal\Helpers\StringHelpers;
use Tajawal\Input\Reader;

class CitiesReader{
    protected $inputReader;

    public function __construct(Reader $inputReader){
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

    protected function validate(array $cities){
        return (new CitiesValidator)->validate($cities);   
    }
}
