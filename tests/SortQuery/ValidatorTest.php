<?php

namespace Tests\SortQuery;

use PHPUnit\Framework\TestCase;
use Tajawal\SortQuery\Validator;
use Exception;

class ValidatorTest extends TestCase
{
    public function testValidateThrowsExceptionIfSortByKeyDontExistInSortableKeys(){
        $this->expectException(Exception::class);
        $sortKeyValidator = new Validator;

        $sortKeyValidator->validate('dontExist');
    }

}