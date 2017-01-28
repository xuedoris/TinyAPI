<?php

namespace App\Libraries\GeoLocation;

/*
 * To retrieve Geo Location data from the free service site freegeoip.net
 */
class FreeGeoIp extends GeoLocation
{
    const APIURL = 'http://freegeoip.net/';

    public function getGeoData($format)
    {
    	echo 123;
    }
}
