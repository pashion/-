<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{url('web/bootstrap')}}/css/bootstrap.min.css" type="text/css" rel="stylesheet" /> 
<link  href="{{url('web/build')}}/css/common.css" type="text/css" rel="stylesheet" />
<link href="{{url('web/build')}}/css/style.css" type="text/css" rel="stylesheet" />
<title>密码找回</title>
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
                    <div class="login_name"><span>密码找回</span></div>
                    <ul>
                    <form action="{{url('home/find')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <li class="frame_style form_error"><input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="邮箱" ></li>
                    </ul>
                    <div class="login_btn"><input type="submit"  class="submitbtn" value="密码找回"/></div>
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