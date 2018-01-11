<?php

namespace Tajawal\SearchQuery\Readers;

use Tajawal\SearchQuery\Validators\PriceValidator;
use Tajawal\Helpers\StringHelpers;
use Tajawal\Input\Reader;

class PriceReader
{
    protected $inputReader;

    public function __construct(Reader $inputReader)
    {
        $this->inputReader = $inputReader;
    }

    public function read()
    {
        return $this->parse($this->inputReader->readLine());
    }

    protected function parse($priceRangeString)
    {
        $priceRange = explode(':', $priceRangeString);

        $this->validate($priceRange);

        return [
            'from' => min($priceRange),
            'to' => max($priceRange),
        ];
    }

    protected function validate(array $priceRange)
    {
        return (new PriceValidator)->validate($priceRange);
    }

}
