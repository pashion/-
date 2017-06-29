@extends('web.layout.master')

@section('title','成功加入购物车')

@section('content')
<script type="text/javascript">
$(document).ready(function(){
 $(".q_code ").hover(function(){
			$(this).find(".q_code_layer").addClass("hover").css("display","block");
		},function(){
			$(this).find(".q_code_layer").removeClass("hover").css("display","none");  

		}
	); 
	 $(".diagram ").hover(function(){
			$(this).addClass("hover");
		},function(){
			$(this).removeClass("hover");  

		}
	); 
		$(".product").hover(function(){
			$(this).addClass("hover");
			$(this).find(".operating").animate({bottom: "0", }, "fast");
		},function(){
			$(this).removeClass("hover");
			$(this).find(".operating").animate({bottom: "-30",}, "fast");  

		}
	); 
	 $(".add_cart_btn ").hover(function(){
			$(this).addClass("hover");
		},function(){
			$(this).removeClass("hover");  

		}
	); 
})
</script>
<body>
<div class="header">
 <div class="header_top">
   <div class="top_info clearfix">
   <div class="logo_style l_f"><a href="#"><img src="images/logo.jpg" /></a></div>
   <div class="Search_style l_f">
   <form>
   <div class="select">
    <select name="" size="1">
      <option value="1">设计精髓</option>
      <option value="2">设计店家</option>
    </select>
    </div>
    <input name="" type="text"  class="add_Search"/>
    <input name="" type="submit"  value="" class="submit_Search"/>
    </form>
   </div>
   <div class="Cart_user r_f">
   <div class="Cart_Quantity "><span class="number">0</span></div>
   <div class="header_operating l_f">
    <span class="header_touxiang"><img src="images/touxiang_03.png" /></span>
    <a href="#">登录</a><a href="@">注册</a>
   </div>
   </div>
 </div>
 <div class="header_menu">
 <!--菜单导航栏-->
 <ul class="menu" id="nav">
   <li class="nLi"><a href="#">网站首页</a></li>
   <li class="nLi"><a href="#">设计精粹</a></li>                
   <li class="nLi Down"><a href="#">场景方案</a><em class="icon_jiantou"></em>
    <ul class="sub">
      <li><a href="#">新闻首页</a></li>
      <li><a href="#">新闻人物</a></li>
      <li><a href="#">新闻电视</a></li>
      <li><a href="#">新闻图片</a></li>
      <li><a href="#">新闻视频</a></li>
      <li><a href="# ">新闻专题</a></li>
    </ul>
   </li>             
   <li class="nLi Down"><a href="#">单品大库</a><em class="icon_jiantou"></em></li>      
   <li class="nLi Down"><a href="#">奇货可享</a><em class="icon_jiantou"></em></li>
   <li class="nLi Down"><a href="#">找找感觉</a><em class="icon_jiantou"></em></li>
 </ul>
 <script>jQuery("#nav").slide({ type:"menu", titCell:".nLi", targetCell:".sub",effect:"slideDown",delayTime:300,triggerTime:0,returnDefault:false,trigger:"click"});</script>
 <div class="q_code">
  <a href="" class="q_code_applnk" rel="nofollow"></a>
    <div class="q_code_layer" style="display: none;">
    <a href="" class="qcode_lnk" rel="nofollow">
      <span class="qcode_title">只分享装修干货</span>
    </a>  
    </div>
  </div>
 </div>
 </div>
</div>
<!--确认加入购物车-->
<div class="content_style clearfix">
 <div class="Confirm_style clearfix"> 
 <div class="Confirmation_prompt"><i class="icon_Confirmation"></i>商品已经成功加入购物车</div>
    <div class="left_commodity clearfix">
      <p class="img"><img src="images/product/p-2.jpg"  width="80px" height="80px"/></p>
      <p class="name">
      <a href="#">格杰仕真皮床双人床1.8米现代简约婚床皮艺床1.5米软包欧式床定制</a>
      <span class="specification">颜色：蓝色/尺寸：XL/数量：2</span>
      </p>
    </div>
    <div class="right_operating">
     <a href="#" class="View_lik">查看商品详情</a>
      <a href="购物车.html" class="cart_btn">去购物车结算<i class="icon_jiantou"></i></a>
    </div>
 </div>
 <!--猜你喜欢-->
 <div class="recommend_pic Confirmation">
  <div class="recommend_title">猜你喜欢</div>
  <table>
   <tbody>
    <tr>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
    </tr>
    <tr>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
    </tr>
   </tbody>
  </table>
 </div>
</div>
@endsection

