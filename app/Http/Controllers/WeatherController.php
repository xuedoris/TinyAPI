<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\Weather\OpenWeatherMap;

class WeatherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request, $ip = null)
    {
        $ip = $ip === null ? $request->ip() : $ip;
        $data = (new OpenWeatherMap())->getWeather($ip);
        $this->setContentType($request->headers->get('Content-Type'));
        $this->sendReponse($data, 200);
    }
}
