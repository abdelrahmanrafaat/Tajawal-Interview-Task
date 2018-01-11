<?php

namespace Tests\Helpers;

use PHPUnit\Framework\TestCase;
use Tajawal\Helpers\CarbonHelpers;
use InvalidArgumentException;
use Carbon\Carbon;

class CarbonHelpersTest extends TestCase
{
    public function testConvertFromStringShouldReturnCarbonInstance(){
        $stringDate = '25-10-2020';
        $carbonDate = CarbonHelpers::convertFromString($stringDate);

        $this->assertTrue($carbonDate Instanceof Carbon); 
    }
    
    public function testConvertFromStringWillThrowExceptionIFNotValidDateFormat(){
        $this->expectException(InvalidArgumentException::class);
        
        $invalidStringDate = '2522-110-12020';
        CarbonHelpers::convertFromString($invalidStringDate);
    }

    public function testMinAndMax(){
        $smallerDate = Carbon::now();
        $greaterDate = $smallerDate->addDays(1);

        $minAndMax = [
            'min' => $smallerDate,
            'max' => $greaterDate,
        ];
        
        $this->assertEquals($minAndMax, CarbonHelpers::getMinAndMax($smallerDate, $greaterDate));
    }

    public function testGreaterThanOrEqual(){
        $smallerDate = Carbon::now();
        $greaterDate = $smallerDate->addDays(1);

        $this->assertTrue(CarbonHelpers::greaterThanOrEqual($greaterDate, $smallerDate));
    }

}