<?php

namespace Tajawal\SearchQuery\Readers;

use Tajawal\SearchQuery\Validators\NamesValidator;
use Tajawal\Helpers\StringHelpers;

class NamesReader{
    protected $inputReader;

    public function __construct($inputReader){
        $this->inputReader = $inputReader;
    }

    public function read(){
        return $this->parse($this->inputReader->readLine());
    }

    protected function parse($namesString){
        $names = StringHelpers::commaExplode($namesString);
        
        $this->validate($names);
        
        return $names;
    }

    protected function validate($names){
        return (new NamesValidator)->validate($names);   
    }
}
