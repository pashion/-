@extends('web.layout.master')

@section('title','会员登录')

@section('content')

    <body>
    <div class="login_style">
        <div class="login_top"><a href="{{url('/')}}"><img src="{{url('web')}}/images/logo.jpg"  /></a></div>
        <div class="login_add_style clearfix">
            <div class="login_ad">
                <img src="{{url('web')}}/images/bg_login_03.png" />
            </div>
            <div class="add_login_cont clearfix">
                <div class="login_content Reg_log_style ">
                    <div class="login_name"><span>账号登录</span></div>
                    <ul>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                          <span class="sr-only">Success:</span>
                            {{session('success')}}
                        </div>
                    @endif
                     @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{session('error')}}
                        </div>
                    @endif
                    <form action="{{url('home/dologin')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <li class="frame_style form_error"><input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="邮箱" ></li>

                        <li class="frame_style form_error"><input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="密码"></li>
                        <li class="frame_style form_error"><input type="text" class="form-control" name="code" id="exampleInputEmail1" placeholder="验证码"></li>
                        <img src="{{url('home/captcha')}}/1" onclick="this.src=this.src+'?a=1'"><span style="color:green">点击图片刷新验证码</span>

                    </ul>
                    <div class="login_btn"><input type="submit"  class="submitbtn" value="登录"/></div>
                    </form>
                    <div class="login_prompt"><a href="{{url('home/email')}}">忘记密码？</a><a href="{{url('home/index')}}">注册</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
