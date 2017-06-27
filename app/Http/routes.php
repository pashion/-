<?php



//登录页面和操作
Route::controller('/admins', 'AdminLoginController');

//后台路由群，由中间件控制用户访问是否登录
Route::group(['middleware'=>'adminLogin'], function () {
	//后台用户管理
	Route::controller('/admin/user','UserController');	
	Route::controller('/admin/roles','RolesController');	
	Route::controller('/admin/permissions','PermissionsController');
	Route::controller('/admin/users','UsersController');
	
});


Route::resource('goods', 'GoogsController');
Route::resource('frenship','FrenshipController');
Route::get('frenship/{id}/delete','FrenshipController@destroy');
Route::resource('talking','TalkingController');
Route::get('talking/{id}/delete','TalkingController@destroy');
Route::resource('order','OrderController');

Route::get('/', function () {

    return view('web.index');
});
//测试图形缩放类
Route::get('/', function(){
    $img = Image::make('../public/uploads/Wheel_Sfm.jpg')->resize(300, 200);
    return $img->response('jpg');
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
Route::resource('Article','ArticleController');
//文章封面图ajax路由
Route::post('Article/ajax','ArticleController@ajax');


