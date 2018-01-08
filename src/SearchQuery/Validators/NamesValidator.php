<?php
namespace Tajawal\SearchQuery\Validators;

use Exception;

class NamesValidator{
    
    public function validate($names){
        if($this->isEmpty($names))
            throw new Exception('Names Can`t be empty');
    }

    protected function isEmpty($names){
        foreach ($names as $name) {
            if(empty($name)) return true;
        }

        return false;
    }
}
