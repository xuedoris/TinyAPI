<?php

namespace App\Libraries\GeoLocation;

/*
 * Geo Location interface
 */
interface GeoLocation
{
    public function getGeoData($format);
}