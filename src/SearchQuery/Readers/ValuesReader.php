<?php

namespace Tajawal\SearchQuery\Readers;

use Tajawal\SearchQuery\Readers\NamesReader;
use Tajawal\SearchQuery\Readers\CitiesReader;
use Tajawal\SearchQuery\Readers\PriceReader;
use Tajawal\SearchQuery\Readers\AvailabilitiesReader;

class ValuesReader{
    protected $inputReader;

    public function __construct($inputReader){
        $this->inputReader = $inputReader;
    }

    public function for($key){
        if($key == 'name')
            return new NamesReader($this->inputReader);
        
        if($key == 'city')
            return new CitiesReader($this->inputReader);

        if($key == 'price')
            return new PriceReader($this->inputReader);
        
        if($key == 'availability')
            return new AvailabilitiesReader($this->inputReader);
    }

}
