<?php
namespace Tajawal\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Question\Question;
use Tajawal\Config\Keys\Searchable;
use Tajawal\Config\Keys\Sortable;
use Tajawal\Output\Writer;
use Tajawal\Input\Reader;
use Tajawal\Output\WelcomeMessage;
use Tajawal\Output\SearchSelectionMessage;
use Tajawal\SearchQuery\Readers\KeysReader;
use Tajawal\SearchQuery\Validators\KeysValidator;
use Tajawal\SearchQuery\Readers\ValuesReader;
use Tajawal\Output\EnterValuesMessage;
use Tajawal\Api\HotelsGetter;

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
        $outputWriter = new Writer($output);
        $inputReader = new Reader($this, $output, $input);

        (new WelcomeMessage($outputWriter))->display();
        (new SearchSelectionMessage($outputWriter))->display();

        $searchKeys = (new KeysReader($inputReader))->read();
        (new KeysValidator)->validate($searchKeys);

        $valuesReader = new ValuesReader($inputReader, $outputWriter);
        $enterValuesMessage = new EnterValuesMessage($outputWriter);
        $searchQuery = [];
        foreach ($searchKeys as $key) {
            $enterValuesMessage->for($key)->display();
            $searchQuery[$key] = $valuesReader->for($key)->read();
        }

        $hotels = (new HotelsGetter)->get(); 
        $hotels = (new HotelsFilter)->filter($hotels, $searchQuery);
        $hotels = (new HotelsSorter)->sort($hotels, $sortyBy);

        (new ResultsMessage($outputWriter))->display($hotels);
    }

}
