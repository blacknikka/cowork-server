<?php

namespace App\Util\Scraping;

use GuzzleHttp\Client;

class GetDataFromWeb
{
    public static function getData()
    {
        $client = new Client();
        $response = $client->request(
            'GET',
            'https://goworkship.com/magazine/tokyo-coworking-space/',
            ['verify' => false]
        );

        return $response;
    }
}
