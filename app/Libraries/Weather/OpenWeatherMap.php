<?php

namespace App\Libraries\Weather;

use App\Libraries\GeoLocation\IpApi;

use GuzzleHttp\Client;

/*
 * To retrieve Geo Location data from the free service site ip-api.com
 */
class OpenWeatherMap
{
    protected $apiUrl = 'http://api.openweathermap.org/data/2.5/weather?';
    
    /**
     * All the supported formats
     * @todo need to support other format
     * @var array
     */
    protected $supportedFormats = [
        'json', 'xml', 'csv'
    ];

    public function getWeather($ip)
    {
        $geoData = (new IpApi())->getRawData($ip);

        $query = http_build_query([
            'q' => $geoData['city'].','.$geoData['countryCode'],
            'units' => 'metric',
            'appid' => getenv('OPENWEATHER_KEY'),
        ]);
        $client = new Client();
        $res = $client->request('GET', $this->apiUrl . $query);
        
        return $this->formatResult($res->getBody(), $ip);
    }

    private function formatResult($result, $ip) 
    {
        $data = json_decode($result, true);
        if(isset($data['cod']) && (int) $data['cod'] === 200) {
            return [
                'ip' => $ip,
                'city' => $data['name'],
                'temperature' => [
                    'current' => $data['main']['temp'],
                    'low' => $data['main']['temp_min'],
                    'high' => $data['main']['temp_max'],
                ],
                'wind' => [
                    'speed' => $data['wind']['speed'],
                    'direction' => $data['wind']['deg'],
                ]
            ];
        } else {
            abort($data['cod'], 'Error message from:openweathermap, '.$data['message'].'. Requested IP:'.$ip);
        }
    }
}