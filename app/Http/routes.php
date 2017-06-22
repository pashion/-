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

    return view('welcome');

});


//商品资源路由
Route::resource('goods', 'GoogsController');
//查询属性头用
Route::get('goods/head/get', 'HeadController@getHead');
//商品文件上传
Route::post('goods/file/upload', 'GoodsFileController@uploadGoodsFile');
//商品图片取消
Route::get('goods/file/upload', 'GoodsFileController@canclePic');