<?php

namespace Tajawal\SearchQuery\Readers;

use Tajawal\Helpers\StringHelpers;

class KeysReader{
    protected $reader;

    public function __construct($reader){
        $this->reader = $reader;
    }

    public function read()
    {
        $searchKeysLine = $this->reader->readLine();
        return $this->parse($searchKeysLine);
    }

    public function parse($searchKeysLine)
    {
        return StringHelpers::commaExplode($searchKeysLine);
    }
}