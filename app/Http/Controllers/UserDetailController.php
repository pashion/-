<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserDetailController extends Controller
{
	//加载个人中心首页
   public function getIndex()
   {
   		return view('web.user_index');
   }

   //加载订单页面
   public function getOrder()
   {
   		return view('web.myorders');
   }
}
