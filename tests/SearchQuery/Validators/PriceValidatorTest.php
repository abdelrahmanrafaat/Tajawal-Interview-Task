<?php

namespace Tests\SearchQuery\Validators;

use PHPUnit\Framework\TestCase;
use Tajawal\SearchQuery\Validators\PriceValidator;
use Exception;

class PriceValidatorTest extends TestCase
{
    public function testValidateWillThrowExceptionIfPriceRangeNotEqual2()
    {
        $this->expectException(Exception::class);
        
        $priceValidator = new PriceValidator;
        $priceValidator->validate([1, 2, 3]);
    }

    public function testValidateWillThrowExceptionIfAnyPriceIsNotNumeric()
    {
        $this->expectException(Exception::class);
        
        $priceValidator = new PriceValidator;
        $priceValidator->validate(['notNumber', 2]);
    }
    
}