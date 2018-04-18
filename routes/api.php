<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/parkingspot/{spot}', 'ApiParkingSpotController@status_spot');

Route::get('/sensor/{id}', 'ApiParkingSpotController@show');

Route::put('/sensor/{id}', 'ApiParkingSpotController@update');

Route::put('/sensorall', 'ApiParkingSpotController@updateAll');

Route::get('/sensor', 'ApiParkingSpotController@index');
