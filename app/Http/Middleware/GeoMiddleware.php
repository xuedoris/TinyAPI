<?php

namespace App\Http\Middleware;

use App\Libraries\GeoLocation\IpApi;
use App\Libraries\GeoLocation\FreeGeoIp;
use Closure;
use Exception;
use GuzzleHttp\Client;

class GeoMiddleware
{
    /**
     * Handle an incoming request for Geo Location to determine which API service to use.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $service = $request->query->get('service');

        // use freegeoip as default service
        if ($service === null || $service === 'freegeoip') {
            app()->bind('App\Libraries\GeoLocation\GeoLocation', function() {
                return new FreeGeoIp(new Client());
            });
        } elseif ($service === 'ip-api') {
            app()->bind('App\Libraries\GeoLocation\GeoLocation', function() {
                return new IpApi(new Client());
            });
        } else {
            abort(400, 'Requested IP service method is not found');    
        }

        return $next($request);
    }
}
