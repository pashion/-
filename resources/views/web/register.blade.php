@extends('web.layout.master')

@section('title','登录')

@section('content')
    <body>
    <div class="login_style register_style">
        <div class="login_top">
            <a href="{{url('/')}}"><img src="{{url('web')}}/images/logo.jpg" /></a>
        </div>
        <div class="login_add_style clearfix">
            <div class="login_ad">
                <img src="{{url('web')}}/images/bg_login_03.png" />
            </div>
            <div class="add_login_cont clearfix relative">
                <div class="login_content Reg_log_style ">
                    <div class="hd">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('error')}}
                                </div>
                            @endif

                            <ul class="login_name clearfix">
           
                                <li>会员注册</li>
                            </ul>
                    </div>
                    <div class="bd">
                        <form action="{{url('home/doregister')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <ul>

                                <li class="frame_style form_error"><input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="名字" value="{{old('username')}}"></li> 

                                <li class="frame_style form_error"><input type="email" class="form-control"  name="email" id="email" placeholder="邮箱" value="{{old('email')}}"></li>

                                <li class="frame_style form_error"><input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="密码"></li>

                                <li class="frame_style form_error"><input type="password" class="form-control" name="repassword" id="exampleInputEmail1" placeholder="重复密码"></li>
                                <li class="frame_style form_error Codes_text"><input type="text" name="code" class="form-control" id="exampleInputEmail1" placeholder="验证码">

                                    <div class="btn_Obtain">
                                        <img src="{{url('home/captcha')}}/1" onclick="this.src=this.src+'?a=1'">
                                    </div> </li>
                                <li class="login_checkbox"><label><input name="check" type="checkbox"  class="checkbox" />我已阅读并同意<a href="#">《用户服务协议》</a></label></li>
                                <li class="login_btn"><input  type="submit" class="submitbtn" value="注册" /></li>
                            </ul>
                        </form>
                    </div>
                    <!--二维码-->
                    <!-- <div class="erweima">
                        <img src="{{url('web/build')}}/images/erweima.jpg" width="80px" height="80px" />
                        <h5>微信扫一扫</h5>
                    </div> -->
                </div>
            </div>
        </div>
        <script>

    //username判断
    $("#email").on('blur',function()
    {
        $('.tip').remove();
        var that = $(this);
        //ajax进行post提交要进行csrf验证
        $.post('data',{'_token':'{{csrf_token()}}','email':that.val()},function(data) //第二个参数要传token的值 再传参数要用逗号隔开
        {
            if(data == 1)
            {
                that.parent().before('<div class="tip" style="color:red" >邮箱已存在，请用邮箱找回密码</div>');
            }else if(data == 0){
                that.parent().before('<div class="tip" style="color:green">邮箱可以使用</div>');
            }else if (data ==2){
                that.parent().before('<div class="tip" style="color:red">邮箱不符合规则</div>');
            }
        });
    });
</script>       
@endsection



<!-- 您在申请注册流程中点击同意前，应当认真阅读以下协议。请您务必审慎阅读、充分理解协议中相关条款内容，其中包括：
1、与您约定免除或限制责任的条款；
2、与您约定法律适用和管辖的条款；
3、其他以粗体下划线标识的重要条款。
如您对协议有任何疑问，可向平台客服咨询。
【特别提示】当您按照注册页面提示填写信息、阅读并同意协议且完成全部注册程序后，即表示您已充分阅读、理解并接受协议的全部内容。如您因平台服务与一家一世界发生争议的，适用《一家一世界平台服务协议》处理。如您在使用平台服务过程中与其他用户发生争议的，依您与其他用户达成的协议处理。
阅读协议的过程中，如果您不同意相关协议或其中任何条款约定，您应立即停止注册程序。 -->

