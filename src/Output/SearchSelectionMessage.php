<?php

namespace Tajawal\Output;

use Tajawal\Config\Keys\Searchable;
use Tajawal\Output\Formater;

class SearchSelectionMessage{
    protected $formater;
    protected $outputWriter;

    public function __construct($outputWriter){
        $this->formater = new Formater;
        $this->outputWriter = $outputWriter;
    }

    public function display()
    {
        $searchableKeys = (new Searchable)->getKeys();

        $this->outputWriter->writeline('Search By ?');
        $this->outputWriter->writeline('  Select one or more of the following search keys');
        
        foreach ($searchableKeys as $key) {
            $this->outputWriter->writeline("   {$this->formater->greenText($key)}");
        }

        $this->outputWriter->writeline("Enter search keys seperated by Comma {$this->formater->greenText(',')} ");
    }

}
