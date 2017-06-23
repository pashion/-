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

//Route::get('/', 'CuisineController@index');


Route::resource('/type', 'TypeController');
Route::get('/SecoundType/increase','SecoundTypeController@increase');
Route::post('/SecoundType/insert','SecoundTypeController@insert');
Route::get('/SecoundType/ajax','SecoundTypeController@ajax');
Route::get('/SecoundType/getmsg','SecoundTypeController@getmsg');
Route::resource('/SecoundType', 'SecoundTypeController');