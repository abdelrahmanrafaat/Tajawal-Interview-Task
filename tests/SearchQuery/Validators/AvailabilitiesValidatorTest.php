<?php

namespace Tests\SearchQuery\Validators;

use PHPUnit\Framework\TestCase;
use Tajawal\SearchQuery\Validators\AvailabilitiesValidator;
use Exception;

class AvailabilitiesValidatorTest extends TestCase
{
    public function testValidateWillThrowExceptionIfAnyAvailabilityIsEmpty(){
        $this->expectException(Exception::class);
        
        $availabilitiesValidator = new AvailabilitiesValidator;
        $availabilitiesValidator->validate(['', '', '']);
    }
}