<?php

	//前台路由
	Route::get('/', 'GoodInfoController@getGoodsIndex');


//前台登录相关操作
Route::controller('/home','HomeLoginController');

<<<<<<< HEAD




//前台商品显示,包括商品详情,商品列表,商品选项价格查询
Route::resource('goodsShow', 'GoodsShowController');
//返回商品选
Route::get('getgoodSel', 'GoodInfoController@getGoodSel');
//返回单个商品的选项价格
Route::get('getgoodSelPrice', 'GoodInfoController@getGoodSelPrice');
//返回配套商品
Route::get('getgoodSelCoordin', 'GoodInfoController@getGoodSelCoordin');
//返回商品首页
Route::get('index', 'GoodInfoController@getGoodsIndex');
//返回首页的方案模块内容
Route::get('getDesign', 'GoodInfoController@getDesignScheme');



//返回方案列表,单个方案详情
Route::resource('scene', 'DesignController');
//保存方案评论内容
Route::post('sendComment', 'DesignCommentController@saveDesignComment');
//返回方案评论内容
Route::get('getComment', 'DesignCommentController@getDesignComment');
//保存方案评论回复sendRealyContent
Route::post('sendRealyContent', 'DesignCommentController@saveDesignRealy');
=======
//这个路由群组限制没有登录用户
Route::group(['middleware'=>'homeLogin'],function () {
	//个人中心
	Route::controller('/user/detail','UserDetailController');
});
>>>>>>> 1b584baf3143af13c103834b3a901ddb12807e61







	//后台登录页面和操作路由
	Route::controller('/admins', 'AdminLoginController');

<<<<<<< HEAD
	//后台路由群，由中间件控制用户访问是否登录
//后台路由群，由中间件控制用户访问是否登录
    // Route::group(['middleware'=>'adminLogin'], function () {
=======
//后台路由群，由中间件控制用户访问是否登录，没有登录跳转到登录页面
// Route::group(['middleware'=>'adminLogin'], function () {
>>>>>>> 1b584baf3143af13c103834b3a901ddb12807e61
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


<<<<<<< HEAD
=======
	//前台商品显示
	Route::resource('goodsShow', 'GoodsShowController');

	Route::get('getgoodSel', 'GoodInfoController@getGoodSel');

>>>>>>> 1b584baf3143af13c103834b3a901ddb12807e61
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
    Route::get('getModeList', 'GoodsControlController@getModeList');//获取模板列表
    Route::post('postModeCon', 'GoodsControlController@addIndexMode'); //首页商品模块添加
	//商品图片上传
	Route::post('goods/file/upload', 'GoodsFileController@uploadGoodsFile');
	//商品图片删除
	Route::get('goods/file/upload', 'GoodsFileController@canclePic');
	//商品图片缩略图获取路由
	Route::get('goods/file/reducepic', 'GoodsFileController@reduce');

        //返回设计方案
// Route::resource('design', 'DesignController');

    //后台方案模块路由
    Route::resource('designAdmin', 'DesignsAdminController');










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

	// 创建隐式控制器,先生成控制器再写路由,控制器的路径注意层级！！
	Route::controller('goods_list','Goods_listController');

	//购物车路由
	Route::controller('shopCart','ShopCartController');
	//end志远
<<<<<<< HEAD



=======
	
	
>>>>>>> 1b584baf3143af13c103834b3a901ddb12807e61
// });







