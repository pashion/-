<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link  href="css/common.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="js/layer/layer.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<title>会员登录</title>
<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
</head>
<script type="text/javascript"> 
 
  $(document).ready(function(){
	 $("input[type='text'],input[type='password']").blur(function(){
        var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_error');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_error');
        }
    });
	$("input[type='text'],input[type='password']").focus(function(){		
		var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_errors');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_errors');
        } else{
			 $parent.attr('class','frame_style').removeClass(' form_errors');
		}
		});
	  })


</script>
<body>
<div class="login_style">
 <div class="login_top"><a href="#"><img src="images/logo.jpg"  /></a><span class="title">会员登录</span></div>
 <div class="login_add_style clearfix">
  <div class="login_ad">
   <img src="images/bg_login_03.png" />
  </div>
  <div class="add_login_cont clearfix">
    <div class="login_content Reg_log_style ">
      <div class="login_name"><span>账号登录</span></div>
      <ul>
       <li class="frame_style form_error"><input name="" type="text"  id="username"/><i>手机号码</i></li>
       <li class="frame_style form_error"><input name="" type="password"   id="userpwd"/><i>密码</i></li>     
      </ul> 
      <div class="login_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>记住用户名和手机号</label></div>
      <div class="login_btn"><input name="" type="submit"  class="submitbtn" value="登录" onclick="submitbtn()"/></div>
      <div class="login_prompt"><a href="#">忘记密码？</a><a href="#">注册</a></div>
    </div>
  </div>
  </div>
</div>
 <div class="footer clearfix">
<div class="footer_spacing clearfix">
  <span class="left_link l_f"><a href="#">首页</a>|<a href="#">设计精粹</a>|<a href="#">场景方案</a>|<a href="#">单品大库</a>|<a href="#">奇货可享</a>|<a href="#">找找感觉</a></span>
  <span class="copyright r_f">copyright©南京一家一世界网络科技有限公司 版权所有   苏ICP备16043372号-1</span>
  </div>
</div>
</body>
</html>
