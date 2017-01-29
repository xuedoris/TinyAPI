<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\GeoLocation\GeoLocation;

class GeoController extends Controller
{
    private $geoLocation; 
    
    public function __construct(GeoLocation $geoLocation)
    {
	    $this->geoLocation = $geoLocation;
	}

    public function geolocation(Request $request, $ip = null)
    {
    	$ip = $ip === null ? $request->ip() : $ip;
    	$data = $this->geoLocation->getGeoData($ip);
    	$this->setContentType($request->headers->get('Content-Type'));

    	return $this->sendReponse($data, 200);
    }
}
