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

    abstract public function formatResult($result);

    public function getGeoData($ip)
    {
		$rawResult = $this->getRawData($ip);
		return $this->formatResult($rawResult);
    }

    public function getRawData($ip)
    {
    	$client = new Client();
		$res = $client->request('GET', $this->apiUrl . $ip);
		return json_decode($res->getBody(), true);
    }
}
