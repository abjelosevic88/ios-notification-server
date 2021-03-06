<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'IndexController@home');
Route::get('/home', 'HomeController@index');

Route::post('/files', function () {
    $file = request()->file('file')->store('public/uploads');
    dd(Storage::url($file));
});

Route::resource('applications', 'ApplicationController');
Route::resource('messages', 'MessageController');

Auth::routes();
