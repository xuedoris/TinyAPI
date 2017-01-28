<?php

namespace App\Libraries\GeoLocation;

/*
 * To retrieve Geo Location data from the free service site ip-api.com
 */
class IpApi implements GeoLocation
{
   	private const $apiUrl = 'http://ip-api.com/';
   	private const $supportedFormats = ['json', 'xml', 'csv', 'line'];

    public function getGeoData($format)
    {

    }
}