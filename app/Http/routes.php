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


Route::get('/', function () {

    return view('zhuazi.production.index');
});


Route::resource('goods', 'GoogsController');