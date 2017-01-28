<?php

namespace App\Libraries\GeoLocation;

/*
 * Geo Location interface
 */
abstract class GeoLocation
{
    abstract public function getGeoData($format);
}
