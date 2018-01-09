<?php
namespace Tajawal\Output;

class EnterCityMessage{

    protected $outputWriter;
    protected $formater;

    public function __construct($outputWriter){
        $this->outputWriter = $outputWriter;
        $this->formater = new Formater;
    }

    public function display(){
        $this->outputWriter->writeLine("Enter cities that hotels are located at seperated by Comma {$this->formater->greenText(',')} Example: {$this->formater->yellowText('cairo,dubai')}"); 
    }

}
