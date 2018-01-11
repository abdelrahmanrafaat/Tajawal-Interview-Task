<?php

namespace Tests\SearchQuery\Validators;

use PHPUnit\Framework\TestCase;
use Tajawal\SearchQuery\Validators\CitiesValidator;
use Exception;

class CitiesValidatorTest extends TestCase
{
    public function testValidateWillThrowExceptionIfAnyCityIsEmpty(){
        $this->expectException(Exception::class);
        
        $citiesValidator = new CitiesValidator;
        $citiesValidator->validate(['', '', '']);
    }
}