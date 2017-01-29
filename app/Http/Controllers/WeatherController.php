<?php

namespace App\Http\Controllers;

use App\Libraries\Weather\OpenWeatherMap;
use App\Libraries\GeoLocation\IpApi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    private $openWeatherMap;
    private $client;
    private $ipApi;

    public function __construct()
    {
        $this->client = new Client();
        $this->ipApi = new IpApi($this->client);
        $this->openWeatherMap = new OpenWeatherMap($this->client, $this->ipApi);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request, $ip = null)
    {
        $ip = $ip === null ? $request->ip() : $ip;
        $data = $this->openWeatherMap->getWeather($ip);
        $this->setContentType($request->headers->get('Content-Type'));

        return $this->sendReponse($data, 200);
    }
}
