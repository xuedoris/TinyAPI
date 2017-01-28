<?php

namespace App\Libraries\GeoLocation;

/*
 * Geo Location interface
 */
abstract class GeoLocation
{
    abstract public function getGeoData($ip);

    protected function formatResult($result) 
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
