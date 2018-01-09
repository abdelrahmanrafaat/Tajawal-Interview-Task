<?php

namespace Tajawal\Output;

use Tajawal\Output\Formater;
use Tajawal\Output\Writer;

class ResultsMessage{
    protected $outputWriter;

    public function __construct(Writer $outputWriter){
        $this->outputWriter = $outputWriter;
    }

    public function display(array $hotels)
    {
        $this->outputWriter->writeLine();

        if(empty($hotels)){
            $this->displayNoHotelsWasFound();
            return;
        }

        $header = (new Formater)->greenText('###### Hotels ######');
        $this->outputWriter->writeLine($header);
        $this->displayHotels($hotels);
    }

    protected function displayNoHotelsWasFound(){
        $this->outputWriter->writeLine(
            (new Formater)->greenText('Sorry, no hotels were found')
        );
    }

    protected function displayHotels(array $hotels){
        foreach ($hotels as $hotel) {
            $this->displayHotelData($hotel);
            $this->outputWriter->writeLine();
        }
    }

    protected function displayHotelData($hotel){
        $this->outputWriter->writeLine(
            (new Formater)->greenText("Hotel Name : {$hotel->name} | Price : {$hotel->price}")
        );
    }

}