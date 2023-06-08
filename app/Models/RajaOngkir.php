<?php

namespace app\Helpers;

use GuzzleHttp\Client;

class RajaOngkir
{
    protected $apiKey;
    protected $client;

    public function __construct()
    {
        $this->apiKey = config('rajaongkir.api_key');
        $this->client = new Client([
            'base_uri' => 'https://api.rajaongkir.com/starter/',
            'headers' => [
                'key' => $this->apiKey,
            ],
        ]);
    }

    public function getProvinces()
    {
        $response = $this->client->request('GET', 'province');
        return json_decode($response->getBody()->getContents(), true);
    }
    

}
