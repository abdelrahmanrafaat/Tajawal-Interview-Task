<?php

namespace Tajawal\Api;

use Exception;

class GetHotelsRequest
{
    public function make($client)
    {
        try {
            $hotelsEndPoint = 'https://api.myjson.com/bins/tl0bp';
            return $client->request('GET', $hotelsEndPoint);
        }catch(Exception $e){
            Throw new Exception('Couldn`t fetch hotels, try again later');
        }
    }
    
}
