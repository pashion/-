<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{url('web/bootstrap')}}/css/bootstrap.min.css" type="text/css" rel="stylesheet" /> 
<link  href="{{url('web/build')}}/css/common.css" type="text/css" rel="stylesheet" />
<link href="{{url('web/build')}}/css/style.css" type="text/css" rel="stylesheet" />
<title>密码重置</title>
</head>
    <body>
    <div class="login_style">
        <div class="login_top"><a href="#"><img src="{{url('web')}}/images/logo.jpg"  /></a></div>
        <div class="login_add_style clearfix">
            <div class="login_ad">
                <img src="{{url('web')}}/images/bg_login_03.png" />
            </div>
            <div class="add_login_cont clearfix">
                <div class="login_content Reg_log_style ">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="login_name"><span>密码重置</span></div>
                    <ul>
                    <form action="{{url('home/resetpassword')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <li class="frame_style form_error"><input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="密码" ></li>
                        <li class="frame_style form_error"><input type="password" class="form-control" name="repassword" id="exampleInputEmail1" placeholder="重复密码" ></li>
                    </ul>
                    <div class="login_btn"><input type="submit"  class="submitbtn" value="提交"/></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div class="footer clearfix" style="margin-top:0; background:#f5f5f5; border-top:1px solid #e6e6e6;">
<div class="footer_spacing clearfix">
  <div style="text-align:center">copyright&copy;广东一家一世界网络科技有限公司 版权所有 粤ICP备16043372号-1</div> 
  </div>
</div>
</div>
</body>
</html>