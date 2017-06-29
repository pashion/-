@extends('web.layout.master')

@section('title','我的订单')

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
<!--我的订单列表-->
<div class="user_style  clearfix">
 <div class="margin_sx">
 <div class="left_mun">
  <div id="menu">
   <dl>
    <dt>我的交易</dt>
    <dd><a href="#" class="hover">我的订单</a></dd>
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
    <dd><a href="#">单品</a></dd>
    <dd><a href="#">话题</a></dd>
   </dl>
    <dl>
    <dt>我的足迹</dt>
    <dd><a href="#">秀秀记录</a></dd>
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
    <dd><a href="#">修改密码</a></dd>
   </dl>
  </div>
 </div>
 <!--订单列表-->
 <div class="right_content clearfix">
   <div class="Order_Management common_Management" >
    <div class="title_name">我的订单</div>
    <div class="Order_style">
     <ul class="Order_sort clearfix">
     <li><a href="javascript:void(0)" class="Order_Select">全部订单</a></li>
     <li><a href="javascript:void(0)">待收款</a></li>
     <li><a href="javascript:void(0)">待评价</a></li>
     <li><a href="javascript:void(0)">售后</a></li>
     </ul>  
     <div class="Order_list">
      <ul class="Order_name clearfix"><li style="width:450px">订单详情</li><li style="width:110px">金额</li><li style="width:100px">状态</li><li style="width:150px">操作</li></ul>
      <table class="table">
       <tbody>
       <tr class="order_number"><td colspan="4" ><span class="time">2016-101-26 23:23</span><span class=""><em>订单号</em>345435345345</span></td></tr>
         <tr class="order_product">
          <td width="450px">
          <p class="checkbox"><input name="" type="checkbox" value="" /></p>
          <div class="Order_pro_name">
           <div class="p_img"><img src="images/product/02_small.jpg"  width="60" height="60"/></div>
           <div class="p_name">
            <a href="#">好视力 LED 台灯 护眼学习工作阅读台灯可调光床头护眼台灯TG2309-WH </a>
            <h4 class="p_type">颜色分类：蓝色</h4>
           </div>
           <div class="Quantity">
             x1
           </div>
           </div>
           </td>
          <td  width="110" class="Order_price">￥786.00</td>
          <td width="100" class="order_status textalign">
           <a href="#" class="payment">等待付款</a>
           <a href="#" class="track"><em class="icon_cart"></em>跟踪<i></i></a>
           <a href="#">订单详情</a>
          </td>
          <td class="textalign" width="150">
           <a href="#" class="payment_btn">付款</a>
           <a href="#">取消订单</a>
          </td>
         </tr>
       </tbody>
       <tbody>
       <tr class="order_number"><td colspan="4" ><span class="time">2016-101-26 23:23</span><span class=""><em>订单号</em>345435345345</span></td></tr>
         <tr class="order_product">
          <td width="450px">
          <p class="checkbox"><input name="" type="checkbox" value="" /></p>
          <div class="Order_pro_name">
           <div class="p_img"><img src="images/product/02_small.jpg"  width="60" height="60"/></div>
           <div class="p_name">
            <a href="#">好视力 LED 台灯 护眼学习工作阅读台灯可调光床头护眼台灯TG2309-WH </a>
            <h4 class="p_type">颜色分类：蓝色</h4>
           </div>
           <div class="Quantity">
             x1
           </div>
           </div>
           </td>
          <td  width="110" class="Order_price">￥786.00</td>
          <td width="100" class="order_status textalign">
           <a href="#" class="payment">等待付款</a>
           <a href="#" class="track"><em class="icon_cart"></em>跟踪<i></i></a>
           <a href="#">订单详情</a>
          </td>
          <td class="textalign" width="150">
           <a href="#" class="payment_btn">付款</a>
           <a href="#">取消订单</a>
          </td>
         </tr>
       </tbody>
       <tbody>
       <tr class="order_number"><td colspan="4" ><span class="time">2016-101-26 23:23</span><span class=""><em>订单号</em>345435345345</span></td></tr>
         <tr class="order_product">
          <td width="450px">
          <p class="checkbox"><input name="" type="checkbox" value="" /></p>
          <div class="Order_pro_name">
           <div class="p_img"><img src="images/product/02_small.jpg"  width="60" height="60"/></div>
           <div class="p_name">
            <a href="#">好视力 LED 台灯 护眼学习工作阅读台灯可调光床头护眼台灯TG2309-WH </a>
            <h4 class="p_type">颜色分类：蓝色</h4>
           </div>
           <div class="Quantity">
             x1
           </div>
           </div>
           </td>
          <td  width="110" class="Order_price">￥786.00</td>
          <td width="100" class="order_status textalign">
           <h4 href="#" class="payment">已付款</h4>
           <a href="#" class="track"><em class="icon_cart"></em>跟踪<i></i></a>
           <a href="#">订单详情</a>
          </td>
          <td class="textalign" width="150">
           <a href="#">取消订单</a>
          </td>
         </tr>
       </tbody>
      </table>
      <!--分页-->
       <div class="pic_page_style clearfix">
      <ul class="page_example pagination">
       <li><li class="first disabled" data-page="1"><a href="javascript:void(0);"> 〈 上一页 </a></li></li>
       <li class="page active" data-page="1"><a href="javascript:void(0);">1</a></li>
       <li class="page" data-page="2"><a href="javascript:void(0);">2</a></li>
       <li class="page" data-page="3"><a href="javascript:void(0);">3</a></li>
       <li class="page" data-page="4"><a href="javascript:void(0);">4</a></li>
       <li class="page" data-page="5"><a href="javascript:void(0);">5</a></li>
       <li class="page" data-page="6"><a href="javascript:void(0);">6</a></li>     
       <li class="page" data-page="7"><a href="javascript:void(0);">7</a></li>
       <li class="page" data-page="8"><a href="javascript:void(0);">8</a></li>
       <li class="page" data-page="9"><a href="javascript:void(0);">9</a></li>
       <li class="page" data-page="10"><a href="javascript:void(0);">10</a></li>
       <li class="page" data-page=""><a href="javascript:void(0);">...</a></li>
       <li class="last" data-page="35"><a href="javascript:void(0);">下一页 〉</a></li>
      </ul>
      </div>
     </div>  
    </div>
   </div>
  </div>
  </div>
 </div>
 @endsection
<script>
 $('.pagination').css({
   "margin-left":($(".Order_style").width() - $('.pagination').outerWidth())/2, 
   });
	$(window).resize(function(){ 
  $('.pagination').css({ 
   "margin-left":($(".Order_style ").width() - $('.pagination').outerWidth())/2, 
   });
	})
</script>