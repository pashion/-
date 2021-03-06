@extends('web.layout.master')

@section('title','会员注册')

@section('content')
<script type="text/javascript"> 
 
  $(document).ready(function(){
	 $("input[type='text'],input[type='password']").blur(function(){
        var $el = $(this);
        var $parent = $el.parent();
		var flag = $el.parent().hasClass('Codes_text');
        $parent.attr('class','frame_style').removeClass(' form_error ');
		if(flag){	
		 $parent.attr('class','frame_style').addClass(' form_error Codes_text');	
		 }
		else{
			 if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_error');
        }
	     }
    });
	$("input[type='text'],input[type='password']").focus(function(){		
		var $el = $(this);
        var $parent = $el.parent();
		var flag = $el.parent().hasClass('Codes_text');
		if(flag){			  
			$parent.attr('class','frame_style').addClass('form_errors Codes_text');
		}
		 else{
		 $parent.attr('class','frame_style').removeClass(' form_errors'); 
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_errors');
        } else{
			 $parent.attr('class','frame_style').removeClass(' form_errors');
		}
		}
		});
	  });

</script>
<body>
<div class="login_style register_style">
 <div class="login_top"><a href="#"><img src="images/logo.jpg"  /></a><span class="title">会员登录</span></div>
 <div class="login_add_style clearfix">
  <div class="login_ad">
   <img src="images/bg_login_03.png" />
  </div>
  <div class="add_login_cont clearfix relative">
    <div class="login_content Reg_log_style ">
     <div class="hd"><ul class="login_name clearfix"><li>普通会员</li><li>专业会员</li></ul></div>
     <div class="bd">    
      <ul>
       <li class="frame_style form_error"><input name="" type="text"  id="username"/><i>手机号码</i></li>
       <li class="frame_style form_error"><input name="" type="password"   id="userpwd"/><i>密码</i></li>
       <li class="frame_style form_error Codes_text"><input name="" type="text" id="Codes_text"><i>验证码</i>
       <div class="btn_Obtain">
        <a href="javascript:ovid()" class="Get_validation">点击获取验证码</a>
        <a href="javascript:ovid()" class="validation_time"> <em>(3)</em>从新获取验证码</a>
       </div>
       </li>   
      <li class="frame_style form_error"><input name="" type="text"  class="invite" id="Cinvite_text"><i>邀请码</i></li>
      <li class="login_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>我已阅读并同意<a href="#">《用户服务协议》</a></label></li>
      <li class="login_btn"><input name="" type="submit"  class="submitbtn" value="登录" onclick="submitbtn()"/></li>      
      </ul> 
      <ul>   
       <ul>
       <li class="radio_name">
       <label><input name="radio_name" type="radio" value="" />个人</label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input name="radio_name" type="radio" value="" />公司</label></li>
       <li class="frame_style form_error"><input name="" type="text"  id="username"/><i>手机号码</i></li>
       <li class="frame_style form_error"><input name="" type="password"   id="userpwd"/><i>密码</i></li>
       <li class="frame_style form_error Codes_text"><input name="" type="text" id="Codes_text"><i>验证码</i>
       <div class="btn_Obtain">
        <a href="javascript:ovid()" class="Get_validation">点击获取验证码</a>
        <a href="javascript:ovid()" class="validation_time"> <em>(3)</em>从新获取验证码</a>
       </div>
       </li>   
      <li class="frame_style form_error"><input name="" type="text"  class="invite" id="Cinvite_text"><i>邀请码</i></li>
      <li class="login_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>我已阅读并同意<a href="#">《用户服务协议》</a></label></li>
      <li class="login_btn"><input name="" type="submit"  class="submitbtn" value="登录" onclick="submitbtn()"/></li>        
      </ul>         
      </div>
      <div class="login_prompt"><a href="#"><i class="icon_explanation"></i>会员说明</a></div>
    </div>
    <script> jQuery(".Reg_log_style").slide({trigger:"click"});</script> 
    <!--二维码-->
    <div class="erweima">
   <img src="images/erweima.jpg" width="80px" height="80px"/>
   <h5>微信扫一扫</h5>
  </div>
  </div> 
  </div> 
</div>
@endsection
