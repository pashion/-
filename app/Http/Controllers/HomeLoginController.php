<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use App\Http\Requests;
use DB;
use Hash;
use Mail;

class HomeLoginController extends Controller
{
	//注册页面
    public function getIndex()
    {
    	return view('web.register');
    }

    //登录界面
    public function getLogin()
    {
    	return view('web.login');
    }

   //执行登录验证操作
    public function postDologin(Request $request)
    {
      //验证验证码
      if ( $request->input('code') != session('code') ) {
         echo "<script> alert('验证码错误');history.go(-1);window.location.reload();</script>";
      }

        $email = $request->input('email');
        $pass = $request->input('password');
        //获取登录数据信息
        $users = DB::select('select * from users_register where email = ?', array($email));
        if ($users != null) {

            if ( $users['0']->email == $email && Hash::check($pass,$users['0']->password) ) {

                $request->session()->put(['username'=>$users['0']->username]);
                // dd(session('admin_email'));
                return view('/');

            }else{

                echo "<script> alert('密码错误');history.go(-1);window.location.reload();</script>";
            }

        }else{

            echo "<script> alert('邮箱错误');history.go(-1);window.location.reload();</script>";

        }
        
    }

    //执行注册
    public function postDoregister(Request $request)
    {
    	if ($request->input('code') != session('code')) {
    		return back()->with('error','验证码错误');
    	}	

    	 $this->validate($request,[
            'username'=>'required|min:3|max:15',
            'email'=>'required|email',
            'password'=>'required|regex:/\w{6,}/',
            'repassword'=>'required|same:password',
            'check'=>'required'

        ],[
            //验证规则
            'username.required'=>'用户不能为空',
            'email.required'=>'邮箱不能为空',
            'password.required'=>'密码不能为空',
            'repassword.required'=>'密码不能为空',
            'check.required'=> '请仔细阅读用户协议并勾选',

            'username.min'=>'用户名最少为3位数', 
            'username.max'=>'用户名最多为15位数', 
            'email.email'=>'邮箱格式不对',
            'password.regex'=>'密码不少于6位任意数字字母下划线',
            'repassword.same'=>'两次密码不一致，请重新输入',
        ]);
           //获取用户信息数据
           $users = $request->only('username','password','email');

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
           if ( $id = DB::table('users_register')->insertGetID($users) ) 
           {
           		$this->getSendMail($users['email'], $id, $users['token']);
           		echo "<script> alert('已发送邮件，请到您的邮箱进行激活验证');window.location.href='http://qwer.com/home/index';</script>";
           }else{
           	 	echo "<script> alert('注册失败');history.go(-1);window.location.reload();</script>";
           }
    }

    //发送邮箱验证
    public function getSendMail($email, $id, $token)
    {	
    	//在闭包函数里不能直接使用闭包函数外的变量 如果要使用 要用use
    	Mail::send('web.mail.activate', ['id'=>$id,'token'=>$token], function ($message)use($email) {
    		$message->to($email);
    		$message->subject('邮箱激活');
		});
    }

    //邮箱激活操作
    public function getActivate(Request $request)
    {
    	//获取用户数据
    	$user = DB::table( 'users_register' )->where('id', '=', $request->input('id'))->first();
      //匹配用户token值是否一致
    	if ( $user->token == $request->input('token') ) {

    		$s['status'] = 1;

    		if ( DB::table('users_register')->where('id', '=', $request->input('id'))->update($s) ) {
    			
           	 	echo "<script> alert('激活成功');window.location.href='http://localhost/ww/shop-laravel/public/home/login';</script>";

    		}
    	}
    }

    //验证码生成
   	public function getCaptcha($tmp)
    {
    	ob_clean();//清除操作
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(136, 197, 34);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        \Session::flash('code', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }


     //执行注册email验证
    public function postData() 
    {
       $users = DB::table('users_register')->where('email', $_POST['email'])->get();
        // dd($user);
       $patten = '/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/';
       preg_match($patten,$_POST['email'],$match);
       if ($users) {
            echo 1;
       }else if ( !$match ){
            echo 2;
       }else{
            echo 0;
       }
    }

    //加载密码找回模板
    public function getEmail()
    {
      return view('web.mail.findpassword');
    }

    //接受邮箱找回
    public function postFind(Request $request)
    {
      //获取用户发送过来的邮箱进行数据库查询
      $user = DB::table( 'users_register' )->where( 'email', '=', $request->input( 'email' ) )->get();
      //如果有数据进行邮箱发送
      if ( $user ) {

          $this->pullMail( $user[0]->email, $user[0]->id, $user[0]->token );

          echo "<script> alert('发送邮件成功，请到邮箱进行密码找回');window.location.href='http://qwer.com/';</script>";

      }else{

              echo "<script> alert('邮箱错误，请重新输入');history.go(-1);window.location.reload();</script>";

      }

    }

    //发送邮箱验证
    public function pullMail($email, $id, $token)
    { 
      //在闭包函数里不能直接使用闭包函数外的变量 如果要使用 要用use
      Mail::send('web.mail.reset', ['id'=>$id,'token'=>$token], function ($message)use($email) {
        $message->to($email);
        $message->subject('密码找回');
      });

    }

    //接受邮箱密码找回信息
    public function getReset(Request $request)
    {
      $user = DB::table( 'users_register' )->where('id', '=', $request->input('id'))->first();
      if ( $user->token == $request->input('token') ) {
        return view( 'web.mail.resetpassword',compact('user'));
      }else{
          echo "<script> alert('密码找回失败，请重新发送');window.location.href='http://qwer.com/email';</script>";
      }
    }

    //进行密码重置
    public function postResetpassword(Request $request)
    {
        $this->validate($request,[
            'password'=>'required|regex:/\w{6,}/',
            'repassword'=>'required|same:password',
          ],[
            'password.required'=>'密码不能为空',
            'repassword.required'=>'密码不能为空',
            'password.regex'=>'密码不少于6位任意数字字母下划线',
            'repassword.same'=>'两次密码不一致，请重新输入',
          ]);
        $pass['password'] = $request->input('password');
        if ( DB::table('users_register')->where('id', '=', $request->input('id'))->update($pass) ) {
          echo "<script> alert('密码找回成功，请登录');window.location.href='http://qwer.com/home/login';</script>";
        }else{
              echo "<script> alert('密码重置失败，请重新填写');history.go(-1);window.location.reload();</script>";
        }

    }
}
