<?php

namespace App\Libraries\GeoLocation;

/*
 * To retrieve Geo Location data from the free service site freegeoip.net
 */
class FreeGeoIp extends GeoLocation
{
    const APIURL = 'http://freegeoip.net/';

    public function getGeoData()
    {
    	echo 123;
    }

    private function formatResult($result) 
    {
     	$data = json_decode($result, true);
	
		return [
			'ip' => $data['query'],
		    'geo' => [
		        'service' => 'ip-api',
		        'city' => $data['city'],
		        'region' => $data['region'],
		        'country' => $data['country'],
		    ]
		];
    }
}
