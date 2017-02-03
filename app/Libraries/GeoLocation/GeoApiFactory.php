<?php

namespace App\Libraries\GeoLocation;

use App\Libraries\GeoLocation\IpApi;
use App\Libraries\GeoLocation\FreeGeoIp;

class GeoApiFactory
{
    /**
     * @param $name
     * @param $client
     * @return mixed
     */
    public static function create($name, $client)
    {
        switch ($name) {
            case 'ip-api':
                return new IpApi($client);
                break;
            case 'freegeoip':
            case null:
                return new FreeGeoIp($client);
                break;
            default:
                abort(400, 'Requested IP service method is not found');
                break;

        }
    }
}