@extends('web.layout.master')

@section('title','积分')

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
<!--积分管理-->
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
  <!--积分列表-->
 <div class="right_content clearfix">
  <div class="integral common_Management" >
   <div class="title_name">我的积分</div>
    <div class="integral_style backgroundcolor ">
        <div class="user_integral">
        当前积分：<span class="number">34433<em>分</em></span><a href="javascript:void()" onclick="Recharge()" class="Integral_recharge">充值</a>
        <a href="#" class="help_user"><i class="icon icon_help"></i>积分说明</a>
        </div>
        <div class="Points_record">
         <div>最近30天积分记录</div>
         <table class="table">
           <thead>
            <tr>
             <th width="500">积分说明</th>
             <th width="100">积分</th>
             <th width="200">时间</th>
            </tr>          
           </thead>
            <tbody>
             <tr>
              <td  style="text-align:left">注册认证积分</td>
              <td><span class="jia">+30</span></td>
              <td>2016-8-23 12:34:22</td>
              </tr>
               <tr>
              <td  style="text-align:left">注册认证积分</td>
              <td><span class="jia">+30</span></td>
              <td>2016-8-23 12:34:22</td>
              </tr>
               <tr>
              <td  style="text-align:left">注册认证积分</td>
              <td><span class="jia">+30</span></td>
              <td>2016-8-23 12:34:22</td>
              </tr>
               <tr>
              <td  style="text-align:left">注册认证积分</td>
              <td><span class="jia">+30</span></td>
              <td>2016-8-23 12:34:22</td>
              </tr>
               <tr>
              <td  style="text-align:left">注册认证积分</td>
              <td><span class="jian">-350</span></td>
              <td>2016-8-23 12:34:22</td>
              </tr>
               <tr>
              <td  style="text-align:left">注册认证积分</td>
              <td><span class="jia">+30</span></td>
              <td>2016-8-23 12:34:22</td>
              </tr>
            </tbody>
         </table>
        </div>
    </div>
   </div>
 </div>
 </div>
 </div>
</div>
<div id="Recharge_style" class="display">
  <div class="padding">
     <div class="Amount">
       <ul class="clearfix">
        <li class="Amount_select"><a href="#" class="Amount_style Amount_checked">
         <h2>300<em>积分</em></h2>
         <h5>28.5元</h5>
        </a>
        </li>
         <li class="Amount_select"><a href="#" class="Amount_style">
         <h2>500<em>积分</em></h2>
         <h5>45.5元</h5>
        </a>
        </li>
         <li class="Amount_select"><a href="#" class="Amount_style">
         <h2>1000<em>积分</em></h2>
         <h5>99.5元</h5>
        </a>
        </li>
         <li class="Amount_select"><a href="#" class="Amount_style">
         <h2>2000<em>积分</em></h2>
         <h5>190.5元</h5>
        </a>
        </li>
         <li class="Amount_select"><a href="#" class="Amount_style">
         <h2>4000<em>积分</em></h2>
         <h5>358.5元</h5>
        </a>
        </li>
         </li>
         <li class="Amount_select"><a href="#" class="Amount_style">
         <h2>5000<em>积分</em></h2>
         <h5>588.5元</h5>
        </a>
        </li>
       </ul>
       <div class="Offers">充1000送1000</div>
       <div class="clearfix method">
        <label><input name="" type="radio" value=""  class="radio"/><img src="images/icon_Payment_03.png" /></label>
       <label><input name="" type="radio" value="" class="radio"/><img src="images/icon_Payment_05.png" /></label>
       <label><input name="" type="radio" value="" class="radio"/><img src="images/icon_Payment_07.png" /></label>
       </div>
     </div>
     <div class="Button_operation clearfix textalign margin_sx">
       <a href="javascruipt:ovid()" class="Payment_btn">立即支付</a>&nbsp;&nbsp;&nbsp;&nbsp;
       <a href="javascript:ovid()" class="cancel_btn">取消</a>
     </div>
  </div>
@endsection
  
<script type="text/javascript">
 function Recharge(){
	    layer.open({
			 type: 1,
			 title:false,
			 shadeClose: false, //点击遮罩关闭层
             area : ['550px' , ''],
             content:$('#Recharge_style'),
			 shift: 2,
			})
	 
	 }
</script>
