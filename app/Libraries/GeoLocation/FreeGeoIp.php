<?php

namespace App\Libraries\GeoLocation;

/*
 * To retrieve Geo Location data from the free service site freegeoip.net
 */
class FreeGeoIp extends GeoLocation
{
    protected $apiUrl = 'http://freegeoip.net/json/';

    /**
     * All the supported formats
     *
     * @var array
     */
   	protected $supportedFormats = [
   		'json', 'xml', 'csv',
   	];

    public function formatResult($data) 
    {
      if($data['latitude'] !== 0) {
        return [
          'ip' => $data['ip'],
            'geo' => [
                'service' => 'freegeoip',
                'city' => $data['city'],
                'region' => $data['region_name'],
                'country' => $data['country_name'],
            ]
        ];
      } else {
        return ['error' => 'No data returned'];
      }
    }
}
