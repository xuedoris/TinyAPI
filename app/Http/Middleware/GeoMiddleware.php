<?php

namespace App\Http\Middleware;

use App\Libraries\GeoLocation\GeoApiFactory;
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
        app()->bind('App\Libraries\GeoLocation\GeoLocation', function() use ($request) {
            $service = $request->query->get('service');
            return GeoApiFactory::create($service, new Client());
        });
        return $next($request);
    }
}
