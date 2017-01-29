<?php

namespace App\Http\Middleware;

use Closure;
use App\Libraries\GeoLocation\IpApi;
use App\Libraries\GeoLocation\FreeGeoIp;
use Exception;

class GeoMiddleware
{
    /**
     * Handle an incoming request.
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
                return new FreeGeoIp();
            });
        } elseif ($service === 'ip-api') {
            app()->bind('App\Libraries\GeoLocation\GeoLocation', function() {
                return new IpApi();
            });
        } else {
            abort(403, 'Unauthorized action.');    
        }

        return $next($request);
    }
}
