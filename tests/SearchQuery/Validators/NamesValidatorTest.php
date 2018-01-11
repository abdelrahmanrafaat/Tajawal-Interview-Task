<?php

namespace Tests\SearchQuery\Validators;

use PHPUnit\Framework\TestCase;
use Tajawal\SearchQuery\Validators\NamesValidator;
use Exception;

class NamesValidatorTest extends TestCase
{
    public function testValidateWillThrowExceptionIfAnyNameIsEmpty()
    {
        $this->expectException(Exception::class);
        
        $nameValidator = new NamesValidator;
        $nameValidator->validate(['', '', '']);
    }
}