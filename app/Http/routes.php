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

//测试图形缩放类
Route::get('/', function(){
    $img = Image::make('../public/uploads/Wheel_2017-06-26-18-56-53.jpg')->resize(300, 100)->save('../public/uploads/test_abc.jpg');
//    return $img->response('jpg');
});

//添加子分类页面路由
Route::get('/SecoundType/increase','SecoundTypeController@increase');
//添加子分类处理路由
Route::post('/SecoundType/insert','SecoundTypeController@insert');
//分类ajax页面路由
Route::get('/SecoundType/ajax','SecoundTypeController@ajax');
//接收ajax请求并反馈路由
Route::get('/SecoundType/getmsg','SecoundTypeController@getmsg');
//分类资源路由
Route::resource('/SecoundType', 'SecoundTypeController');

//轮播图资源路由
Route::resource('/Wheel','WheelController');
//触发ajax
Route::post('/Wheel/sort','WheelController@sort');

//文章模块路由
Route::resource('/Article','ArticleController');
//文章封面图ajax路由
Route::post('/Article/ajax','ArticleController@ajax');

