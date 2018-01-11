<?php

namespace Tajawal\Output;

use Tajawal\Output\EnterPriceMessage;
use Tajawal\Output\EnterCityMessage;
use Tajawal\Output\EnterNameMessage;
use Tajawal\Output\EnterAvailabilityMessage;
use Tajawal\Output\Writer;

class EnterValuesMessage
{
    protected $outputWriter;

    public function __construct(Writer $outputWriter)
    {
        $this->outputWriter = $outputWriter;
    }

    public function for($key)
    {
        if($key == 'name')
            return new EnterNameMessage($this->outputWriter);
        
        if($key == 'city')
            return new EnterCityMessage($this->outputWriter);

        if($key == 'price')
            return new EnterPriceMessage($this->outputWriter);
        
        if($key == 'availability')
            return new EnterAvailabilityMessage($this->outputWriter);
    }
}

                