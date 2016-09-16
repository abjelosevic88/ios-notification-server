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

$api = app('Dingo\Api\Routing\Router');

/*
|--------------------------------------------------------------------------
| Application Unauthenticated Routes
|--------------------------------------------------------------------------
*/
$api->version('v1', function ($api) {
    $api->get('/message', 'App\Http\Controllers\ApplicationController@getMessage');
});

/*
|--------------------------------------------------------------------------
| Application Authenticated Routes
|--------------------------------------------------------------------------
*/
$api->version('v1', ['middleware' => 'jwt.auth'], function ($api) {
    //
});
