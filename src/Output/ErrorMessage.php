<?php

namespace Tajawal\Output;

use Tajawal\Output\Formater;
use Tajawal\Output\Writer;

class ErrorMessage{
    protected $formater;
    protected $outputWriter;

    public function __construct(Writer $outputWriter){
        $this->formater = new Formater;
        $this->outputWriter = $outputWriter;
    }

    public function display($message){
        $errorMessage = "{$this->formater->redText($message)}";
        $this->outputWriter->writeLine($errorMessage);
    }

}
