<?php
namespace Tajawal\Output;

use Tajawal\Output\Writer;
use Tajawal\Output\Formater;

class EnterPriceMessage
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
        $this->outputWriter->writeLine("Enter Hotels Price Range start:end Example: {$this->formater->yellowText('100:200')}"); 
    }

}
