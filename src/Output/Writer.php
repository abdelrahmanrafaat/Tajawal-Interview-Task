<?php

namespace Tajawal\Output;

class Writer{
    protected $output;

    public function __construct($output)
    {
        $this->output = $output;
    }

    public function writeLine($text = ''){
        $this->output->writeln($text);
    }

}