<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Validator;
use App\Http\Requests;
use DB;

class UserController extends Controller
{

    //加载用户模块的列表页面
    public function getIndex()
    {
        $users = DB::table('users_register')->paginate(3);
        // dd($users);
        return view('zhuazi/users/index', ['users' => $users]);
    }

    //加载用户的添加页面
    public function getAdd()
    {

        return view('zhuazi/users/add');
    }

    //执行添加
    public function postInsert(Request $request) {

       $this->validate($request,[
            'username'=>'required|min:3|max:15',
            // 'phone'=>'required|regex:/1[3-9]\d{9}/',
            'email'=>'required|email',
            'password'=>'required|regex:/\w{6,}/',
            'repassword'=>'required|same:password',

        ],[
            //验证规则
            'username.required'=>'用户不能为空',
            // 'phone.required'=>'电话号码不能为空',
            'email.required'=>'邮箱不能为空',
            'password.required'=>'密码不能为空',
            'repassword.required'=>'密码不能为空',

            'username.min'=>'用户名最少为3位数', 
            'username.max'=>'用户名最多为15位数', 
            // 'phone.regex'=>'电话号码格式不对',
            'email.email'=>'邮箱格式不对',
            'password.regex'=>'请输入不少于6位任意数字字母下划线',
            'repassword.same'=>'两次密码不一致，请重新输入',
        ]);

           //获取用户信息数据
           $users = $request->only('password','username','email','status');

           //密码加密 解密用Hash::check方法
           $users['password'] = Hash::make($users['password']);

           //用于邮箱验证使用
           $users['token'] = str_random(50);

           //获取Ip
           $users['register_ip']=$request->getClientIp();
           // dd($users);

           //创建时间
           $users['created_at'] = date('Y-m-d H:i:s');

           //把数据写入数据库
           if ( DB::table('users_register')->insert($users) ) {

                return redirect('admin/user/index')->with('success','添加成功');

           }else{

                return back()->with('error','添加失败');

           }
    } 

    //删除用户
    public function getDelete($id)
    {

        $res = DB::table('users_register')->where('id', '=', $id)->delete();
        if ( $res ) {
            return redirect('admin/user/index')->with('success', '删除成功');
        }else{
            return redirect('admin/user/index')->with('error', '删除成功');
        }

    }  

    //修改用户信息
    public function getEdit($id)
    {

        $data = DB::table('users_register')->where('id', '=', $id)->first();
        // dd($data);
        return view('zhuazi/users/update',compact('data'));

    }

    //执行修改       
     public function postUpdate(Request $request)
    {
        //获取修改数据
        $user = $request->except('_token','id');
        $user['token'] = str_random(50);
        // dd($user);
        //执行修改
        $res = DB::table('users_register')->where('id', '=', $request->input('id'))->update($user);
        if ($res) {
            return redirect('admin/user/index')->with('success', '修改成功');
        }else{
            return back()->with('error', '修改失败');
        }
        

    }

    //执行搜索
    public function postSearch(Request $request)
    {

        $data = $request->input('username');

        $users = DB::select('select * from users_register where username = :username or phone = :phone or email = :email', ['username' => $data, 'phone' => $data, 'email' => $data]);
        return view('zhuazi.users.search',compact('users'));

    }

    //执行用户添加验证
    public function postData() 
    {
       $users = DB::table('users_register')->where('username', $_POST['username'])->get();
        // dd($user);
       $patten = '/.{3,}/';
       preg_match($patten,$_POST['username'],$match);
       if ($users) {
            echo 1;
       }else if ( !$match ){
            echo 2;
       }else{
            echo 0;
       }
    }

                  


}
