<?php
namespace Tajawal\Api;

use GuzzleHttp\Client;

class ClientFactory
{
    public function make()
    {
        return new Client();
    }
}
