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
     * @todo need to support other format
     * @var array
     */
   	protected $supportedFormats = [
   		'json', 'xml', 'csv',
   	];

    public function validateResult($data)
    {
      if($data['latitude'] !== 0) {
        return $data;
      } else {
        abort(400, 'Error message from:freegeoip, no valide data returned. Requested IP:'.$data['ip']);
      }
    }

    public function formatResult($data) 
    { 
      return [
        'ip' => $data['ip'],
          'geo' => [
              'service' => 'freegeoip',
              'city' => $data['city'],
              'region' => $data['region_name'],
              'country' => $data['country_name'],
          ]
      ];
    }
}
