<?php

namespace Tajawal\Output;

use Tajawal\Output\Formater;

class WelcomeMessage{
    protected $outputWriter;

    public function __construct($outputWriter){
        $this->outputWriter = $outputWriter;
    }

    public function display()
    {
        $welcomeText = (new Formater)->greenText('Welcome to Tajawal hotels reservation');
        $this->outputWriter->writeLine($welcomeText);
    }

}