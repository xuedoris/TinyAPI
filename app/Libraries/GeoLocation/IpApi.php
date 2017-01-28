<?php

namespace App\Libraries\GeoLocation;

/*
 * To retrieve Geo Location data from the free service site ip-api.com
 */
class IpApi implements GeoLocation
{
   	const APIURL = 'http://ip-api.com/';

    public function getGeoData($format)
    {

    }
}