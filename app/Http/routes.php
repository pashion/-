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


