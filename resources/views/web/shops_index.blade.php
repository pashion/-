@extends('web.layout.master')

@section('title','店铺首页')

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
})
</script>
<body>
<div class="Background_color">
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
<!--店铺首页-->
<div class="content_style clearfix">
  <div class="page_Style shops_style">
   <div class="Shop_header">
    <div class="Shop_header_top">
     <img src="images/shop_img_03.png" />
     <div class="shop_Into">
       <div class="shop_logo"><img src="images/dp_logo.jpg"  width="85px" height="85"/></div>
       <span class="name">合宜万家好物店</span>
       <div class="shop_fx_sc">
           <a href="#" class="Store_data"><em class="icon_like"></em>234567</a>
           <a href="#" class="Store_data"><em class="icon_user"></em>234567</a>
           <a href="#" class="Store_data"><em class="icon_Collection"></em>收藏</a>
           <a href="#" class="Store_data"><em class="icon_shareit"></em>分享</a>
       </div>
       </div>
     </div>
     <!--地址信息-->
     <div class="shop_info">
      <p> 合家万家家具生活馆汇集全球时尚，产品种类齐全全国际高端品质，汇集全球时尚，产品种类全国际高端品质，平民消费理念国际高端品质。</p>
      <p> 电话：400-025-888</p>
      <p>地址：江苏省南京市建邺区清江南路88号</p>
     </div>
   </div>
   <!--产品列表-->
   <div class="shops_proc_list clearfix"  >
     <ul class="prodcuts_style clearfix">
       <li class="product">
       <div class="pic_img textalign"><a href="#"><img src="images/product/p-1.jpg"></a>
        <div class="operating" style="bottom: -30px;"><a href="#" class="pic_cart">加入购物车</a><a href="#" class="Collection">收藏</a></div>
       </div>
       <p class="pic_nme"><a href="#">A家家具 床 实木床 1.5米1.8米双人床简约软包皮床卧室家具 床 框架床</a></p>
       <p class="pic_price">￥2310.00</p>
       </li>  
        <li class="product">
       <div class="pic_img textalign"><a href="#"><img src="images/product/p-2.jpg"></a>
        <div class="operating" style="bottom: -30px;"><a href="#" class="pic_cart">加入购物车</a><a href="#" class="Collection">收藏</a></div>
       </div>
       <p class="pic_nme"><a href="#">A家家具 床 实木床 1.5米1.8米双人床简约软包皮床卧室家具 床 框架床</a></p>
       <p class="pic_price">￥2310.00</p>
       </li>
        <li class="product">
       <div class="pic_img textalign"><a href="#"><img src="images/product/p-3.jpg"></a>
        <div class="operating" style="bottom: -30px;"><a href="#" class="pic_cart">加入购物车</a><a href="#" class="Collection">收藏</a></div>
       </div>
       <p class="pic_nme"><a href="#">A家家具 床 实木床 1.5米1.8米双人床简约软包皮床卧室家具 床 框架床</a></p>
       <p class="pic_price">￥2310.00</p>
       </li>
        <li class="product">
       <div class="pic_img textalign"><a href="#"><img src="images/product/p-4.jpg"></a>
        <div class="operating" style="bottom: -30px;"><a href="#" class="pic_cart">加入购物车</a><a href="#" class="Collection">收藏</a></div>
       </div>
       <p class="pic_nme"><a href="#">A家家具 床 实木床 1.5米1.8米双人床简约软包皮床卧室家具 床 框架床</a></p>
       <p class="pic_price">￥2310.00</p>
       </li> 
         <li class="product">
       <div class="pic_img textalign"><a href="#"><img src="images/product/p-5.jpg"></a>
        <div class="operating" style="bottom: -30px;"><a href="#" class="pic_cart">加入购物车</a><a href="#" class="Collection">收藏</a></div>
       </div>
       <p class="pic_nme"><a href="#">A家家具 床 实木床 1.5米1.8米双人床简约软包皮床卧室家具 床 框架床</a></p>
       <p class="pic_price">￥2310.00</p>
       </li>  
        <li class="product">
       <div class="pic_img textalign"><a href="#"><img src="images/product/p-6.jpg"></a>
        <div class="operating" style="bottom: -30px;"><a href="#" class="pic_cart">加入购物车</a><a href="#" class="Collection">收藏</a></div>
       </div>
       <p class="pic_nme"><a href="#">A家家具 床 实木床 1.5米1.8米双人床简约软包皮床卧室家具 床 框架床</a></p>
       <p class="pic_price">￥2310.00</p>
       </li>
        <li class="product">
       <div class="pic_img textalign"><a href="#"><img src="images/product/p-7.jpg"></a>
        <div class="operating" style="bottom: -30px;"><a href="#" class="pic_cart">加入购物车</a><a href="#" class="Collection">收藏</a></div>
       </div>
       <p class="pic_nme"><a href="#">A家家具 床 实木床 1.5米1.8米双人床简约软包皮床卧室家具 床 框架床</a></p>
       <p class="pic_price">￥2310.00</p>
       </li>
        <li class="product">
       <div class="pic_img textalign"><a href="#"><img src="images/product/p-4.jpg"></a>
        <div class="operating" style="bottom: -30px;"><a href="#" class="pic_cart">加入购物车</a><a href="#" class="Collection">收藏</a></div>
       </div>
       <p class="pic_nme"><a href="#">A家家具 床 实木床 1.5米1.8米双人床简约软包皮床卧室家具 床 框架床</a></p>
       <p class="pic_price">￥2310.00</p>
       </li>  
     </ul>
     <div class="pic_page_style clearfix">
      <ul class="page_example pagination" style="margin-left: 294px;">
       <li></li><li class="first disabled" data-page="1"><a href="javascript:void(0);"> 〈 上一页 </a></li>
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
@endsection

