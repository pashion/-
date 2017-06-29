@extends('web.layout.master')

@section('title','修改密码')

@section('content')
<body>
<div class="Background_color">
<div class="user_top">
 <div class="top_style">
 <span class="l_f">客服热线：025-45874156</span>
 <div class="user_top_name r_f">
  <span class="shop_daun list_name">
  <span class="shop_name"><i class="icon_shop"></i><a  href="javascript:void()" class="direction_xia">手机端</a></span>
  <div class="shop_erwm">
  <div class="erweima"> <img src="images/img_28.jpg"  width="80p" hidden="80"/></div>
  </div>  
  </span> 
 <span class="user_shopping">12345678909 &nbsp;&nbsp;<a href="#">退出</a></span>
 </div> 
 </div>
</div>
<div class="user_lanmu">
 <div class="user_style nav">
  <a href="#" class="user_logo"><img src="images/user_logo_03.png" /></a>
  <div class="navitems">
   <ul class="">
    <li><a href="#">首页</a></li>
    <li><a href="#">账户设置</a></li>
    <li><a href="#">消息</a></li>
   </ul>
  </div>
  <div class="cart_shop">
   <em class="icon_cart"><span class="digital">1</span></em>我的购物车  
  </div>
 </div>
</div>
<!--修改密码-->
 <div class="user_style  clearfix">
 <div class="margin_sx">
    <!--左侧栏目-->
  <div class="left_mun">
  <div id="menu">
   <dl>
    <dt>我的交易</dt>
    <dd><a href="#" >我的订单</a></dd>
    <dd><a href="#">我的积分</a></dd>
   </dl>
   <dl>
    <dt>VIP专区</dt>
    <dd><a href="#">VIP活动专区</a></dd>
   </dl>
   <dl>
    <dt>我的收藏</dt>
    <dd><a href="#">设计师案例</a></dd>
    <dd><a href="#">场景方案</a></dd>
    <dd><a href="#" >单品</a></dd>
    <dd><a href="#">话题</a></dd>
   </dl>
    <dl>
    <dt>我的足迹</dt>
    <dd><a href="#" >秀秀记录</a></dd>
    <dd><a href="#">浏览记录</a></dd>
    <dd><a href="#">评论记录</a></dd>
    <dd><a href="#">点赞记录</a></dd>
   </dl>
   <dl>
    <dt>我的邀请</dt>
    <dd><a href="#">已邀请用户</a></dd>
   </dl>
   <dl>
    <dt>设置</dt>
    <dd><a href="#" >个人资料</a></dd>
    <dd><a href="#" >地址管理</a></dd>
    <dd><a href="#" class="hover">修改密码</a></dd>
   </dl>
  </div>
 </div>
  <!--右侧修改密码-->
  <div class="right_content clearfix">
    <div class="modify_pas_style clearfix">
     <div class="change_Password">
        <ul>
         <li>
         <label class="label_name">请填写手机效验码：</label><span class="text_style">
        <input name="Verification" type="text" class="text_add" id="Verification"/></span>
         <a href="javascript:ovid()" class="Get_SMSbtn">获取短信效验码</a>
         </li>
          <li><label class="label_name">旧密码：</label><span class="text_style"><input name="" type="text" class="text_add"/></span><span class="prompt"><i class="icon_tishi"></i>请输入旧密码！</span></li>
           <li><label class="label_name">新密码：</label><span class="text_style"><input name="" type="text" class="text_add"/></span><span class="prompt"><i class="icon_tishi"></i>请输入新密码！</span></li>
           <li><input name="" type="submit"  value="修改" class="submit_modify" onclick="submitmodify()"/></li>
        </ul>
     </div>
    </div>
  </div>
 </div>
 </div>
 @endsection
