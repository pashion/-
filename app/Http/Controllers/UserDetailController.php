<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Hash;
use Validator;
use Config;

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
      //查询用户地址表
      $users = DB::table('users_address')->where('user_id','=',session('user')[0]->id)->get();
   	return view('web/layout/userdetail/address',compact("users"));
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

   //加载修改密码页
   public function getChangepass()
   {
   	return view('web.layout.userdetail.changepass');
   }

   //修改密码
   public function postChange(Request $req)
   {
   		//表单验证
   		$this->validate($req,[
   			'password'=>'required|regex:/\w{6,}/',
            'repassword'=>'required|same:password',
   			],[
   			'password.regex'=>'密码最少为6位数',
   			'repassword.same'=>'两次密码不相等,请重新输入',
   			'password.required'=>'密码不能为空',
   			'repassword.required'=>'密码不能为空',
   			]);

         //密码加密
   		$pass['password'] = Hash::make($req->input('repassword'));

   		if ( DB::table('users_register')->where('id', '=', $req->input('id'))->update($pass) ) {

   			$req->session()->forget('user');
   			echo "<script> alert('密码修改成功，请重新登录');top.location.href='http://qq.com/home/login';</script>";

   		}
   		
   }

   //个人中心页获取用户名
   public function getUsername(Request $req)
   {     

		$user = DB::table('users_register')->where('id', '=', $req->input('id'))->get();
      return $user;
   }


   //加载个人资料页面
   public function getData()
   {
   	return view('web.layout.userdetail.userdata');
   }

   //AJAX加载个人资料数据
   public function getUserdata(Request $req)
   {
      //查询用户个人资料
      $data =  DB::table('users_data')->where('user_id', '=', $req->input('id'))->get();
      return $data;
   }

   //保存个人资料
   public function postSaveuserdata(Request $req)
   {
         //表单验证
         $this->validate($req,[
            'name'=>'required|min:1|max:6',
            ],[
            'name.required'=>'名称不能为空',
            'name.min'=>'用户名最少为1位数', 
            'name.max'=>'用户名最多为6位数', 
            ]);

         
         $u['username'] = $req->input('name');
         $user = DB::table('users_register')->where('id', '=', $req->input('user_id'))->get();

         //修改用户名
         if ( $user[0]->username !=  $req->input('name') ) {
               DB::table('users_register')->where('id', '=', $req->input('user_id'))->update($u);
         }

         //判断是否有个人资料存在 没有就走insert 有就走update（else）
         $userdata = DB::table('users_data')->where('user_id', '=', $req->input('user_id'))->get();
         if ( !$userdata ) {

            $data = $req->except('_token');
            // dd($data);
            if ( $req->hasFile('avatar') ) {
               //获取图片后缀
               $exten = $req->file('avatar')->getClientOriginalExtension();
               //随机图片名字
               $name = time()+rand(1,9999);
               $req->file('avatar')->move('./uploads/',$name.'.'.$exten);
               $data['avatar'] = './uploads/'.$name.'.'.$exten;

            }

            //添加个人资料
            if ( DB::table('users_data')->insert($data) ) {

            return redirect('user/detail/data')->with('success','填写成功');
                   
            }

         }else{

            $data = $req->except('_token','avatar');
            // dd($data);
            if ( $req->hasFile('avatar') ) {
               //获取图片后缀
               $exten = $req->file('avatar')->getClientOriginalExtension();
               //随机图片名字
               $name = time()+rand(1,9999);
               $req->file('avatar')->move('/uploads/',$name.'.'.$exten);
               $data['avatar'] = '/uploads/'.$name.'.'.$exten;

            }

            //修改个人资料
            DB::table('users_data')->where('user_id', '=', $req->input('user_id'))->update($data);



     return redirect('user/detail/data')->with('success','修改成功');
            


         }
   }

   //删除地址
   public function getDeladdress($id)
   {
      DB::table('users_address')->where('id', '=' ,$id)->delete();
      // echo "<script> alert('删除成功');history.go(-1);window.location.reload();</script>";
     return redirect('user/detail/address')->with('success','删除成功');
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






   public function getAbord()
   {
      return view('web.layout.userdetail.abord');
   }


}
