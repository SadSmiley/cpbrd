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

Route::get('/', 'MainController@index');
Route::get('/report/{id}', 'MainController@report');
Route::post('/report/{id}', 'MainController@submit_report');
Route::get('/proponent', 'MainController@proponent');
Route::get('/proponent/view/{id}', 'MainController@proponent_view');