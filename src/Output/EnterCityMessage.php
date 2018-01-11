<?php
namespace Tajawal\Output;

use Tajawal\Output\Writer;

class EnterCityMessage
{

    protected $outputWriter;
    protected $formater;

    public function __construct(Writer $outputWriter)
    {
        $this->outputWriter = $outputWriter;
        $this->formater = new Formater;
    }

    public function display()
    {
        $this->outputWriter->writeLine("Enter cities that hotels are located at seperated by Comma {$this->formater->greenText(',')} Example: {$this->formater->yellowText('cairo,dubai')}"); 
    }
}

