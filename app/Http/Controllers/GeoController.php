<?php

namespace App\Http\Controllers;

use App\Libraries\GeoLocation\GeoApiFactory;
use App\Libraries\GeoLocation\GeoLocation;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GeoController extends Controller
{
    private $geoFactory;

//    public function __construct(GeoLocation $geoLocation)
//    {
//        $this->geoLocation = $geoLocation;
//    }
    public function __construct(GeoApiFactory $geoFactory)
    {
        $this->$geoFactory = $geoFactory;
    }
    public function geolocation(Request $request, $ip = null)
    {
        $ip = $ip === null ? $request->ip() : $ip;
        GeoApiFactory::create($request->query->get('service'), new Client());
        $data = $this->geoLocation->getGeoData($ip);
        $this->setContentType($request->headers->get('Content-Type'));

        return $this->sendReponse($data, 200);
    }
/*
    public function geolocation(Request $request, $ip = null)
    {
        $ip = $ip === null ? $request->ip() : $ip;
        $data = $this->geoLocation->getGeoData($ip);
        $this->setContentType($request->headers->get('Content-Type'));

        return $this->sendReponse($data, 200);
    }*/
}
