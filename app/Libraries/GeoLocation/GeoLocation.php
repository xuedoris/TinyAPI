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
    	$client = new Client();
		$res = $client->request('GET', $this->apiUrl . $ip);

		return $this->formatResult($res->getBody());
    }
}
