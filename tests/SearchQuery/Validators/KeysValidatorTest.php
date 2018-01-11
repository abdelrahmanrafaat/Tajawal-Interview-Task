<?php

namespace Tests\SearchQuery\Validators;

use PHPUnit\Framework\TestCase;
use Tajawal\SearchQuery\Validators\KeysValidator;
use Exception;

class KeysValidatorTest extends TestCase
{
    public function testValidateWillThrowExceptionIfAnyKeyIsEmpty()
    {
        $this->expectException(Exception::class);
        
        $keys = new KeysValidator;
        $keys->validate(['', '', '']);
    }

    public function testValidateWillThrowExceptionIfAnyKeyIsNotSearchableKey()
    {
        $this->expectException(Exception::class);
        
        $keys = new KeysValidator;
        $keys->validate(['dontExist']);
    }
}