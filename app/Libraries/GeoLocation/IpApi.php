<?php

namespace App\Libraries\GeoLocation;

use GuzzleHttp\Client;

/*
 * To retrieve Geo Location data from the free service site ip-api.com
 */
class IpApi extends GeoLocation
{
   protected $apiUrl = 'http://ip-api.com/json/';
   	
   	/**
     * All the supported formats
     *
     * @var array
     */
   	protected $supportedFormats = [
   		'json', 'xml', 'csv', 'line'
   	];
    
    public function formatResult($result) 
    {
     	$data = json_decode($result, true);
     	if($data['status'] === 'success') {
     		return [
				'ip' => $data['query'],
			    'geo' => [
			        'service' => 'ip-api',
			        'city' => $data['city'],
			        'region' => $data['region'],
			        'country' => $data['country'],
			    ]
			];
     	} else {
     		return ['error' => 'Retrieve data failed'];
     	}
    }
}