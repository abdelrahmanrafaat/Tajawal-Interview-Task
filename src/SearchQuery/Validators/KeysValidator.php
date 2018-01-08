<?php

namespace Tajawal\SearchQuery\Validators;

use Tajawal\Config\Keys\Searchable;
use \Exception;

class KeysValidator{
    protected $searchableKeys;

    public function __construct(){
        $this->searchableKeys = (new Searchable)->getKeys();
    }
    
    public function validate($inputSearchKeys){
        foreach($inputSearchKeys as $key){
            if($this->isEmpty($key))
                throw new Exception('You can`t search by an empty key');

            if(!$this->isSearchable($key))
                throw new Exception("You can`t search by {$key}");
        }
    }

    protected function isEmpty($key){
        return empty($key); 
    }

    protected function isSearchable($key){
        return in_array($key, $this->searchableKeys);
    }    

}
