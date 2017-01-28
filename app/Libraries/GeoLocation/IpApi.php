<?php

namespace App\Libraries\GeoLocation;

use GuzzleHttp\Client;

/*
 * To retrieve Geo Location data from the free service site ip-api.com
 */
class IpApi extends GeoLocation
{
   	const APIURL = 'http://ip-api.com/';
   	
   	/**
     * All the supported formats
     *
     * @var array
     */
   	protected $supportedFormats = [
   		'json', 'xml', 'csv', 'line'
   	];


    public function getGeoData($format)
    {
    	$client = new Client();
		$res = $client->request('GET', self::APIURL.$format);
		echo $res->getStatusCode();
		// 200
		echo $res->getHeaderLine('content-type');
		// 'application/json; charset=utf8'
		echo $res->getBody();

    }
}
