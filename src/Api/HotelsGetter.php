<?php

namespace Tajawal\Api;

use Tajawal\Api\ClientFactory;
use Tajawal\Api\GetHotelsRequest;
use Tajawal\Api\HotelsParser;

class HotelsGetter
{
    public function get(){
        $response = (new GetHotelsRequest)->make( (new ClientFactory)->make() );
        return (new HotelsParser)->parse($response);
    }

}