<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Contracts\Encryption\DecryptException;
use Hash;

class AdminLoginController extends Controller
{


	public function getIndex()
	{
		return view('login');
	}

	//执行登录操作
    public function postLogin(Request $request)
    {
    	// dd(123);
        $name = $request->input('admin_name');
        $pass = $request->input('password');
        //获取登录数据信息
        $users = DB::select('select * from users where name = ?', array($name));
        if ($users != null) {

            if ( $users['0']->name == $name && Hash::check($pass,$users['0']->password) ) {

                $request->session()->put(['admin_name'=>$name]);
                // dd(session('admin_name'));
                return view('zhuazi/production/index');

            }else{

                echo "<script> alert('账号或密码错误');history.go(-1);window.location.reload();</script>";
            }

        }else{

            echo "<script> alert('账号或密码错误');history.go(-1);window.location.reload();</script>";

        }
        
    }


    public function getLogout (Request $request)
    {
        //删除session
        $request->session()->forget('admin_data');
        return redirect('/admins');

    }

}
