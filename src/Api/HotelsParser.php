<?php
namespace Tajawal\Api;

use Tajawal\Services\Map\HotelsMapper;

class HotelsParser{
    public function parse($response){
        $decodedResponseBody = json_decode( $response->getBody() );
        return $this->map($decodedResponseBody->hotels); 
    }

    protected function map($hotels){
        return (new HotelsMapper)->map($hotels);
    }
}