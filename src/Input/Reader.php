<?php
namespace Tajawal\Input;

use Symfony\Component\Console\Question\Question;

class Reader{
    protected $commandInstance;
    protected $output;
    protected $input;

    public function __construct($commandInstance, $output, $input)
    {
        $this->commandInstance = $commandInstance;
        $this->output = $output;
        $this->input = $input;
    }

    public function readLine(){
        return $this->commandInstance
                    ->getHelper('question')
                    ->ask($this->input, $this->output, new Question(''));
    }

}