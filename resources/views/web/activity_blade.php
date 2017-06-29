@extends('web.layout.master')

@section('title','活动专区')

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
 <!--用户中心-->
 <div class="user_style  clearfix">
 <div class="margin_sx">
  <div class="left_mun">
  <div id="menu">
   <dl>
    <dt>我的交易</dt>
    <dd><a href="用户中心-我的订单.html">我的订单</a></dd>
    <dd><a href="用户中心-积分.html">我的积分</a></dd>
   </dl>
   <dl>
    <dt>VIP专区</dt>
    <dd><a href="活动专区.html" class="hover">VIP活动专区</a></dd>
   </dl>
   <dl>
    <dt>我的收藏</dt>
    <dd><a href="用户中心-收藏.html">设计师案例</a></dd>
    <dd><a href="#">场景方案</a></dd>
    <dd><a href="#">单品</a></dd>
    <dd><a href="#">话题</a></dd>
   </dl>
    <dl>
    <dt>我的足迹</dt>
    <dd><a href="用户中心-秀秀记录.html">秀秀记录</a></dd>
    <dd><a href="#">浏览记录</a></dd>
    <dd><a href="#">评论记录</a></dd>
    <dd><a href="#">点赞记录</a></dd>
   </dl>
   <dl>
    <dt>我的邀请</dt>
    <dd><a href="用户中心-邀请用户.html">已邀请用户</a></dd>
   </dl>
   <dl>
    <dt>设置</dt>
    <dd><a href="用户中心-个人信息.html">个人资料</a></dd>
    <dd><a href="用户中心-地址管理.html" >地址管理</a></dd>
    <dd><a href="用户中心-修改密码.html">修改密码</a></dd>
   </dl>
  </div>
 </div>
 <!--右侧内容样式-->
 <div class="right_content clearfix">
   <div class="activity_style">
    <div class="Activities_style">
      <h2><span class="bg_as">1</span><a href="#">欧美简约清晰风格家具特卖会</a></h2>
      <div class="img_link"><a href="#"><img src="images/product/zs_1.jpg" /></a></div>
      <div class="activity_time">活动时间：2016-11-1至2016-11-11</div>
    </div>
    <div class="Activities_style">
      <h2><span class="bg_as">2</span><a href="#">欧美简约清晰风格家具特卖会</a></h2>
      <div class="img_link"><a href="#"><img src="images/product/zs_1.jpg" /></a></div>
      <div class="activity_time">活动时间：2016-11-1至2016-11-11</div>
    </div>
      <!--分页-->
       <div class="pic_page_style clearfix">
      <ul class="page_example pagination">
       <li><li class="first disabled" data-page="1"><a href="javascript:void(0);"> 〈 上一页 </a></li></li>
       <li class="page active" data-page="1"><a href="javascript:void(0);">1</a></li>
       <li class="page" data-page="2"><a href="javascript:void(0);">2</a></li>
       <li class="page" data-page="10"><a href="javascript:void(0);">10</a></li>
       <li class="page" data-page=""><a href="javascript:void(0);">...</a></li>
       <li class="last" data-page="35"><a href="javascript:void(0);">下一页 〉</a></li>
      </ul>
      </div>
   </div>
 </div>
 </div>
 </div>
  @endsection


<script>
 $('.pagination').css({
   "margin-left":($(".right_content").width() - $('.pagination').outerWidth())/2, 
   });
	$(window).resize(function(){ 
  $('.pagination').css({ 
   "margin-left":($(".right_content").width() - $('.pagination').outerWidth())/2, 
   }); 
}); 
</script>