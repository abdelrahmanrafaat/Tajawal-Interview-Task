<?php
namespace Tajawal\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Question\Question;
use Tajawal\Config\Keys\Searchable;
use Tajawal\Config\Keys\Sortable;

class HotelsFinderCommand extends Command
{
    private $sortableKeys;
    private $searchableKeys;

    public function __construct()
    {
        $this->sortableKeys = new Sortable;
        $this->searchableKeys = new Searchable;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('find:hotels')
             ->setDescription('Search for hotels with given criteria and sort the retuned result')
             ->addOption(
                'sort',
                's',
                InputOption::VALUE_OPTIONAL,
                "Specifiy one from Sorting options ({$this->sortableKeys->toString()})",
                ''
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
            
    }

}
