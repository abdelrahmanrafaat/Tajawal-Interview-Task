<?php

namespace Tajawal\SearchQuery\Readers;

use Tajawal\SearchQuery\Validators\AvailabilitiesValidator;
use Tajawal\Helpers\CarbonHelpers;
use Exception;
use Tajawal\Helpers\StringHelpers;
use Tajawal\Input\Reader;

class AvailabilitiesReader
{
    protected $inputReader;

    public function __construct(Reader $inputReader)
    {
        $this->inputReader = $inputReader;
    }

    public function read()
    {
        return $this->parse($this->inputReader->readLine());
    }

    protected function parse($availabilitiesString)
    {
        $availabilitiesRanges = StringHelpers::commaExplode($availabilitiesString);
        
        $this->validate($availabilitiesRanges);
        
        $parsedAvailabilities = [];
        foreach ($availabilitiesRanges as $date)
        {
            $parsedAvailability = $this->parseAvailabilityRange($date);
            $parsedAvailabilities[] = $parsedAvailability;
        }

        return $parsedAvailabilities;
    }

    //TODO : Exctract the validation step out of parsing
    protected function parseAvailabilityRange($range)
    {
        try{
            $datesAsStrings = explode(':', $range);
            
            $minAndMaxDates = CarbonHelpers::getMinAndMax(
                CarbonHelpers::convertFromString($datesAsStrings[0]),
                CarbonHelpers::convertFromString($datesAsStrings[1])
            );

            return [
                'from' => $minAndMaxDates['min'],
                'to' => $minAndMaxDates['max'],
            ];
        }catch(Exception $e){
            throw new Exception('Invalid Date Format');
        }
    }

    protected function validate(array $availabilitiesRanges)
    {
        return (new AvailabilitiesValidator)->validate($availabilitiesRanges);   
    }


}
