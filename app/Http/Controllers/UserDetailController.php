<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Hash;
use Validator;

class UserDetailController extends Controller
{
	
   //加载个人中心
   public function getOrder()
   {
   		return view('web.myorders');
   }

   //加载top顶部栏
   public function getTop()
   {
   	return view('web/layout/top');
   }

   //加载菜单栏
   public function getMemu()
   {
   	return view('web/layout/memu');
   }

   //加载订单页
   public function getOrders()
   {
   	return view('web/layout/userdetail/orders');
   }



   	//加载地址管理页面
   public function getAddress()
   {
   	return view('web/layout/userdetail/address');
   }

   //数据库查询省份信息
   public function getProvince(Request $req)
   {
   		$provinces = DB::table('district')->where('upid', '=', $req->input('upid'))->get();
   		return $provinces;
   }

   //保存地址信息
   public function postAddaddress(Request $req)
   {
   		$address = $req->except('_token');
   		$address['status'] = 1;
   		dd($address);
   		if ( DB::table('user_address')->insert($address) ) {
   			echo 1;
   		}else{
   			echo 2;
   		}
   }

   //加载修改密码页
   public function getChangepass()
   {
   		return view('web.layout.userdetail.changepass');
   }

   //修改密码
   public function postChange(Request $req)
   {
   		// $user = DB::select('select password from users_register where id = ?',[$req->input('id')]);
   		// // dd($user[0]->password);
   		// if ( !Hash::check($req->input('password'), $user[0]->password) ) {
   		// 	echo "<script> alert('密码错误');history.go(-1);window.location.reload();</script>";
   		// 	die();
   		// }
   		
   		$this->validate($req,[
   			'password'=>'required|regex:/\w{6,}/',
            'repassword'=>'required|same:password',
   			],[
   			'password.regex'=>'密码最少为6位数',
   			'repassword.same'=>'两次密码不相等,请重新输入',
   			'password.required'=>'密码不能为空',
   			'repassword.required'=>'密码不能为空',
   			]);

   		$pass['password'] = Hash::make($req->input('repassword'));
   		if ( DB::table('users_register')->where('id', '=', $req->input('id'))->update($pass) ) {

   			$req->session()->forget('user');
   			echo "<script> alert('密码修改成功，请重新登录');top.location.href='http://qwer.com/home/login';</script>";

   		}
   		
   }

   public function getAvatar(Request $req)
   {
   		$user = DB::table('users_register')->where('id', '=', $req->input('id'));
   }


   //加载个人资料页面
   public function getData()
   {
   		return view('web.layout.userdetail.userdata');
   }

   //保存个人资料
   public function postSaveuserdata(Request $req)
   {
   		// dd($req->file(''));
   }


}
