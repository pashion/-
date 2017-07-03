<?php

	//前台路由
	Route::get('/', function () {

	    return view('web.index');
	});


//前台登录相关操作
Route::controller('/home','HomeLoginController');

//个人中心
Route::controller('/user/detail','UserDetailController');






	//后台登录页面和操作路由
	Route::controller('/admins', 'AdminLoginController');

//后台路由群，由中间件控制用户访问是否登录
// Route::group(['middleware'=>'adminLogin'], function () {
	//后台用户管理
	Route::controller('/admin/user','UserController');
	//权限管理路由	
	Route::controller('/admin/roles','RolesController');	
	Route::controller('/admin/permissions','PermissionsController');
	Route::controller('/admin/users','UsersController');



	Route::resource('goods', 'GoogsController');
	Route::resource('frenship','FrenshipController');
	Route::get('frenship/{id}/delete','FrenshipController@destroy');
	Route::resource('talking','TalkingController');
	Route::get('talking/{id}/delete','TalkingController@destroy');
	Route::resource('order','OrderController');


	//前台商品显示
	Route::resource('goodsShow', 'GoodsShowController');

	Route::get('getgoodSel', 'GoodInfoController@getGoodSel');

	//商品资源路由
	Route::resource('goods', 'GoogsController');
	//商品规格
	Route::resource('goodsSpec', 'GoodsSpecController');
	//商品分类查询路由
	Route::get('goodsType', 'GoodsTypeController@getKindType');
	Route::get('goodsgetstyle', 'GoodsTypeController@getGoodsStyle');
	Route::post('goodsgetstyles', 'GoodsTypeController@getStyle');
    //商品首页模板控制
    Route::get('indexModeCon', 'GoodsControlController@indexModeCon');
    //获取模板列表
    Route::get('getModeList', 'GoodsControlController@getModeList');
    //首页商品模块添加
    Route::post('postModeCon', 'GoodsControlController@addIndexMode');
    //返回设计方案
    Route::resource('design', 'DesignController');


	//商品图片上传
	Route::post('goods/file/upload', 'GoodsFileController@uploadGoodsFile');
	//商品图片删除
	Route::get('goods/file/upload', 'GoodsFileController@canclePic');
	//商品图片缩略图获取路由
	Route::get('goods/file/reducepic', 'GoodsFileController@reduce');
	//mingliang











	//志远

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
	Route::resource('Article','ArticleController');
	//文章封面图ajax路由
	Route::post('Article/ajax','ArticleController@ajax');
	//end志远
	
	
// });







