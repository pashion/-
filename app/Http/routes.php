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


//商品规格
Route::resource('goodsSpec', 'GoodsSpecController');


//商品分类查询路由
Route::get('goodsType', 'GoodsTypeController@getKindType');
Route::get('goodsgetstyle', 'GoodsTypeController@getgGoodsStyle');
//商品文件上传
Route::post('goods/file/upload', 'GoodsFileController@uploadGoodsFile');
//商品图片取消
Route::get('goods/file/upload', 'GoodsFileController@canclePic');
//商品图片缩略图获取路由
Route::get('goods/file/reducepic', 'GoodsFileController@reduce');




















