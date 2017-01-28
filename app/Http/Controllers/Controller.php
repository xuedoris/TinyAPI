<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Libraries\IpApi;

class Controller extends BaseController
{
    public function index()
    {
    	$geo = new IpApi();
    	$geo->index();
    }
}
