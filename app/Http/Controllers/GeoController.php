<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Libraries\GeoLocation\IpApi;
use App\Libraries\GeoLocation\GeoLocation;

class GeoController extends BaseController
{
    private $geoLocation; 
    
    public function __construct(GeoLocation $geoLocation)
    {
	    $this->geoLocation = $geoLocation;
	}

    public function geolocation()
    {
    	 $this->geoLocation->getGeoData('json');    	
    }
}
