<?php
namespace Tajawal\Input;

use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Reader
{
    protected $commandInstance;
    protected $output;
    protected $input;

    public function __construct(Command $commandInstance, OutputInterface $output, InputInterface $input)
    {
        $this->commandInstance = $commandInstance;
        $this->output = $output;
        $this->input = $input;
    }

    public function readLine()
    {
        return $this->commandInstance
                    ->getHelper('question')
                    ->ask($this->input, $this->output, new Question(''));
    }

}