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
     * @todo need to support other format
     * @var array
     */
   	protected $supportedFormats = [
   		'json', 'xml', 'csv', 'line'
   	];
    
    public function validateResult($data)
    {
      if($data['status'] === 'success') {
        return $data;
      } else {
        abort(400, 'Error message from:ip-api, '.$data['message'].'. Requested IP:'.$data['query']);
      }
    }

    public function formatResult($data) 
    {
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