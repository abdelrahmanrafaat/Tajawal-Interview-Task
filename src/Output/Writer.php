<?php

namespace Tajawal\Output;

use Symfony\Component\Console\Output\OutputInterface;

class Writer{
    protected $output;

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    public function writeLine($text = ''){
        $this->output->writeln($text);
    }

}