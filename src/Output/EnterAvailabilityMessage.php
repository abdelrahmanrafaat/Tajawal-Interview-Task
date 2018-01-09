<?php
namespace Tajawal\Output;

class EnterAvailabilityMessage{

    protected $outputWriter;
    protected $formater;

    public function __construct($outputWriter){
        $this->outputWriter = $outputWriter;
        $this->formater = new Formater;
    }

    public function display(){
        $this->outputWriter->writeLine("Enter the dates Ranges seperated by Comma {$this->formater->greenText(',')}");
        $this->outputWriter->writeLine("    Dates should be on the format {$this->formater->greenText('d-m-Y')} Example: {$this->formater->yellowText('1-10-2018:10-10-2018,1-5-2018:10-5-2018')}");
    }

}
