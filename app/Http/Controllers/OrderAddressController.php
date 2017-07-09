<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Hash;
use Validator;
use Config;
use Redis;
use URL;

class OrderAddressController extends Controller
{
	    //加载地址管理页面
	   public function getAddress()
	   {
	      //查询用户地址表
	      $users = DB::table('users_address')->where('user_id','=',session('user')[0]->id)->get();
	   	return view('web/layout/userdetail/addressg',compact("users"));
	   }

	   //数据库查询省份信息
	   public function getProvince(Request $req)
	   {
	      //查询省市县信息
			$provinces = DB::table('district')->where('upid', '=', $req->input('upid'))->get();
			return $provinces;
	   }

	   //保存地址信息
	   public function postAddaddress(Request $req)
	   {
	         $address['user_id'] = $req->input('user_id');
	         $address['phone'] = $req->input('phone');
	         $address['get_name'] = $req->input('get_name');
	         $address['code'] = $req->input('code');
	         $address['province'] = $req->input('province');
	         $address['city'] = $req->input('city');
	         $address['county'] = $req->input('county');
	   		$address['detaile_address'] = $req->input('detail_address');
	   		$address['status'] = 0;
	         // dd(DB::table('users_address')->insert($address));
	   		if ( DB::table('users_address')->insert($address) ) {
	   			return 1;
	   		}else{
	   			return 0;
	   		}
	   }
	    //删除地址
	   public function getDeladdress($id)
	   {
	      DB::table('users_address')->where('id', '=' ,$id)->delete();
	      // echo "<script> alert('删除成功');history.go(-1);window.location.reload();</script>";
	     return redirect('goods_list')->with('success','删除成功');
	      // return back()->with('success','删除成功');
	      // return URL::previous();
	   }

	   //修改地址
	   public function postUpdateaddress(Request $req)
	   {
	      $data = $req->except('_token','id');

	      if ( DB::table('users_address')->where('id', '=', $req->input('id'))->update($data) ) {
	         return redirect('user/detail/address')->with('success','修改成功');
	      }
	   }

	   //修改默认地址状态
	   public function getStatus(Request $req)
	   {
	      $id = session('user')[0]->id;
	      DB::update('update users_address set status = 0 where user_id = ?',[$id]);
	      $s['status'] = 1;
	      if ( DB::table('users_address')->where('id', '=', $req->input('id'))->update($s) ) {
	         return 1;
	      }else{
	         return 0;
	      }
	   }  


}
