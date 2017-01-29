<?php

namespace App\Libraries\GeoLocation;

use GuzzleHttp\Client;

/*
 * Geo Location interface
 */

abstract class GeoLocation
{
    protected $apiUrl;
    protected $supportedFormats;
    protected $client;

    abstract public function formatResult($result);

    abstract public function validateResult($result);

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getGeoData($ip)
    {
        $rawResult = $this->getRawData($ip);

        return $this->formatResult($rawResult);
    }

    public function getRawData($ip)
    {
        $res = $this->client->request('GET', $this->apiUrl . $ip);
        // Analyse if returned data is valid.
        $validResult = $this->validateResult(json_decode($res->getBody(), true));

        return $validResult;
    }
}
