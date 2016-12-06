<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return Response::make(['error' => 'Unauthorized access.'], 403);
});

/* JWT */
Route::post('authenticate', 'JWTController@authenticate');
Route::post('me', 'JWTController@me');

/**
 * @SWG\Swagger(
 *     basePath="/api",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Location Service API",
 *         description="This is Location Service API documentation."
 *     )
 * )
 */

$api = app('Dingo\Api\Routing\Router');

/* Silahkan dimatikan middleware jwt.auth nya jika mau lihat dokumentasi
 * Dengan JWT Auth : ['middleware' => 'cache|jwt.auth']
 */
$api->version('v1', ['middleware' => 'cache'], function ($api) {

    $api->get('provinces', 'App\Http\Controllers\ProvinceController@index');
    $api->get('provinces/{id}', 'App\Http\Controllers\ProvinceController@show');
    $api->post('provinces', 'App\Http\Controllers\ProvinceController@store');
    $api->put('provinces/{id}', 'App\Http\Controllers\ProvinceController@update');
    $api->delete('provinces/{id}', 'App\Http\Controllers\ProvinceController@destroy');

    $api->get('cities', 'App\Http\Controllers\CityController@index');
    $api->get('cities/{id}', 'App\Http\Controllers\CityController@show');
    $api->post('cities', 'App\Http\Controllers\CityController@store');
    $api->put('cities/{id}', 'App\Http\Controllers\CityController@update');
    $api->delete('cities/{id}', 'App\Http\Controllers\CityController@destroy');

    $api->get('districts', 'App\Http\Controllers\DistrictController@index');
    $api->get('districts/{id}', 'App\Http\Controllers\DistrictController@show');
    $api->post('districts', 'App\Http\Controllers\DistrictController@store');
    $api->put('districts/{id}', 'App\Http\Controllers\DistrictController@update');
    $api->delete('districts/{id}', 'App\Http\Controllers\DistrictController@destroy');

    $api->get('zipcodes', 'App\Http\Controllers\ZipcodeController@index');
    $api->get('zipcodes/{id}', 'App\Http\Controllers\ZipcodeController@show');
    $api->post('zipcodes', 'App\Http\Controllers\ZipcodeController@store');
    $api->put('zipcodes/{id}', 'App\Http\Controllers\ZipcodeController@update');
    $api->delete('zipcodes/{id}', 'App\Http\Controllers\ZipcodeController@destroy');

    $api->get('stores', 'App\Http\Controllers\StoreController@index');
    $api->get('stores/{id}', 'App\Http\Controllers\StoreController@show');
    $api->post('stores', 'App\Http\Controllers\StoreController@store');
    $api->put('stores/{id}', 'App\Http\Controllers\StoreController@update');
    $api->delete('stores/{id}', 'App\Http\Controllers\StoreController@destroy');

    $api->get('csos/', 'App\Http\Controllers\CsoController@index');
    $api->get('csos/{id}', 'App\Http\Controllers\CsoController@show');

    // $api->get('ymcs', 'App\Http\Controllers\YmcController@index');
    // $api->post('ymcs', 'App\Http\Controllers\YmcController@store');
    // $api->put('ymcs/{id}', 'App\Http\Controllers\YmcController@update');
    // $api->delete('ymcs/{id}', 'App\Http\Controllers\YmcController@destroy');
});
