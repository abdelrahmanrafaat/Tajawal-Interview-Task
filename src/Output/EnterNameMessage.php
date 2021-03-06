<?php
namespace Tajawal\Output;

use Tajawal\Output\Formater;
use Tajawal\Output\Writer;

class EnterNameMessage
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
        $this->outputWriter->writeLine("Enter names of hotels you are searching for seperated by Comma {$this->formater->greenText(',')} Example: {$this->formater->yellowText('Helton,Plaza')}"); 
    }

}
