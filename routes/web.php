<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->group(['middleware' => App\Http\Middleware\GeoMiddleware::class], function () use ($app) {
	$app->get('/geolocation', 'GeoController@geolocation');
	$app->get('/geolocation/{ip}', 'GeoController@geolocation');
});

$app->get('/weather', WeatherController::class);
