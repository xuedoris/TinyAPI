<?php

namespace App\Libraries\GeoLocation;

/*
 * To retrieve Geo Location data from the free service site freegeoip.net
 */
class FreeGeoIp
{
    const $apiUrl = 'http://freegeoip.net/';
    const $supportedFormats = ['json', 'xml', 'csv', 'jsonp'];
}