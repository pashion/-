@extends('web.layout.master')

@section('title','奇货可享')

@section('content')
<script type="text/javascript">
$(document).ready(function(){
 $(".q_code ").hover(function(){
			$(this).find(".q_code_layer").addClass("hover").css("display","block");
		},function(){
			$(this).find(".q_code_layer").removeClass("hover").css("display","none");  

		}
	); 
	 $(".diagram").hover(function(){
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
	
$('.pagination').css({
   "margin-left":($(".content_style").width() - $('.pagination').outerWidth())/2, 
   });
	$(window).resize(function(){ 
  $('.pagination').css({ 
   "margin-left":($(".content_style").width() - $('.pagination').outerWidth())/2, 
   }); 
}); 
/****/
$('.autoPage').css({
   "margin-left":($(".content_style ").width() - $('.autoPage').outerWidth())/2, 
   });
	$(window).resize(function(){ 
  $('.autoPage').css({ 
   "margin-left":($(".content_style ").width() - $('.autoPage').outerWidth())/2, 
   }); 
}); 
});

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
<div class="content_style clearfix">
 <div class="qihuo_list">
  <div class="Product_slides">
   <div class="hd"><ul class="autoPage"></ul></div>
   <div class="bd">
    <ul>
     <li><img src="images/qihuo_bamber_03.jpg" /></li>
     <li><img src="images/qihuo_bamber_03.jpg" /></li>
    </ul>
   </div>  
  </div>
 <script>jQuery(".Product_slides").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,interTime:5000});</script>
 <!--列表展示-->
  <div class="list">
    <div class="filter  clearfix">
     <span class="name">奇货可享</span><em>></em>
     <span class="filter_name"><a href="#" class="hover">茶具</a><a href="#">炊具</a><a href="#"> 灯具</a><a href="#">饰物</a><a href="#">杂件</a><a href="#">用品</a></span>
    </div>
    <div class="qihuo_product_list clearfix">
     <div class="qihuo_pro">
      <a href="#" class="p_img"><img src="images/product/p-2.jpg"  width="280px" height="280px"/><span class="bg_Price">￥456.00</span></a>
      <h5><a href="#">新中式实木老榆木茶桌</a></h5>
      <p class="content"><span>&#147;</span><em class="summary">所有商品，美乐乐将严格按照国家三包法等有关法律、法规为您提供质保服务。家具类产品、木地板产品、定制门产品、灯饰 照明类、厨卫装修类、五金工具类和五金电器类产品</em><span >&#148;</span></p>
       <div class="Store_Name">
        <div class="Store_Avatar"><span class="yuna_Avatar"></span><img src="images/touxiang.jpg"  width="30px" height="30px"/></div>
        <a href="#" title="好物工好物工艺坊艺坊" class="text_color">好物工好物工艺坊艺坊</a>
      </div>
     </div>
          <div class="qihuo_pro">
      <a href="#" class="p_img"><img src="images/product/p-2.jpg"  width="280px" height="280px"/><span class="bg_Price">￥456.00</span></a>
      <h5><a href="#">新中式实木老榆木茶桌</a></h5>
      <p class="content"><span>&#147;</span><em class="summary">所有商品，美乐乐将严格按照国家三包法等有关法律、法规为您提供质保服务。家具类产品、木地板产品、定制门产品、灯饰 照明类、厨卫装修类、五金工具类和五金电器类产品</em><span >&#148;</span></p>
       <div class="Store_Name">
        <div class="Store_Avatar"><span class="yuna_Avatar"></span><img src="images/touxiang.jpg"  width="30px" height="30px"/></div>
        <a href="#" title="好物工好物工艺坊艺坊" class="text_color">好物工好物工艺坊艺坊</a>
      </div>
     </div>
          <div class="qihuo_pro">
      <a href="#" class="p_img"><img src="images/product/p-2.jpg"  width="280px" height="280px"/><span class="bg_Price">￥456.00</span></a>
      <h5><a href="#">新中式实木老榆木茶桌</a></h5>
      <p class="content"><span>&#147;</span><em class="summary">所有商品，美乐乐将严格按照国家三包法等有关法律、法规为您提供质保服务。家具类产品、木地板产品、定制门产品、灯饰 照明类、厨卫装修类、五金工具类和五金电器类产品</em><span >&#148;</span></p>
       <div class="Store_Name">
        <div class="Store_Avatar"><span class="yuna_Avatar"></span><img src="images/touxiang.jpg"  width="30px" height="30px"/></div>
        <a href="#" title="好物工好物工艺坊艺坊" class="text_color">好物工好物工艺坊艺坊</a>
      </div>
     </div>
          <div class="qihuo_pro">
      <a href="#" class="p_img"><img src="images/product/p-2.jpg"  width="280px" height="280px"/><span class="bg_Price">￥456.00</span></a>
      <h5><a href="#">新中式实木老榆木茶桌</a></h5>
      <p class="content"><span>&#147;</span><em class="summary">所有商品，美乐乐将严格按照国家三包法等有关法律、法规为您提供质保服务。家具类产品、木地板产品、定制门产品、灯饰 照明类、厨卫装修类、五金工具类和五金电器类产品</em><span >&#148;</span></p>
       <div class="Store_Name">
        <div class="Store_Avatar"><span class="yuna_Avatar"></span><img src="images/touxiang.jpg"  width="30px" height="30px"/></div>
        <a href="#" title="好物工好物工艺坊艺坊" class="text_color">好物工好物工艺坊艺坊</a>
      </div>
     </div>
            <div class="qihuo_pro">
      <a href="#" class="p_img"><img src="images/product/p-2.jpg"  width="280px" height="280px"/><span class="bg_Price">￥456.00</span></a>
      <h5><a href="#">新中式实木老榆木茶桌</a></h5>
      <p class="content"><span>&#147;</span><em class="summary">所有商品，美乐乐将严格按照国家三包法等有关法律、法规为您提供质保服务。家具类产品、木地板产品、定制门产品、灯饰 照明类、厨卫装修类、五金工具类和五金电器类产品</em><span >&#148;</span></p>
       <div class="Store_Name">
        <div class="Store_Avatar"><span class="yuna_Avatar"></span><img src="images/touxiang.jpg"  width="30px" height="30px"/></div>
        <a href="#" title="好物工好物工艺坊艺坊" class="text_color">好物工好物工艺坊艺坊</a>
      </div>
     </div>
            <div class="qihuo_pro">
      <a href="#" class="p_img"><img src="images/product/p-2.jpg"  width="280px" height="280px"/><span class="bg_Price">￥456.00</span></a>
      <h5><a href="#">新中式实木老榆木茶桌</a></h5>
      <p class="content"><span>&#147;</span><em class="summary">所有商品，美乐乐将严格按照国家三包法等有关法律、法规为您提供质保服务。家具类产品、木地板产品、定制门产品、灯饰 照明类、厨卫装修类、五金工具类和五金电器类产品</em><span >&#148;</span></p>
       <div class="Store_Name">
        <div class="Store_Avatar"><span class="yuna_Avatar"></span><img src="images/touxiang.jpg"  width="30px" height="30px"/></div>
        <a href="#" title="好物工好物工艺坊艺坊" class="text_color">好物工好物工艺坊艺坊</a>
      </div>
     </div>
            <div class="qihuo_pro">
      <a href="#" class="p_img"><img src="images/product/p-2.jpg"  width="280px" height="280px"/><span class="bg_Price">￥456.00</span></a>
      <h5><a href="#">新中式实木老榆木茶桌</a></h5>
      <p class="content"><span>&#147;</span><em class="summary">所有商品，美乐乐将严格按照国家三包法等有关法律、法规为您提供质保服务。家具类产品、木地板产品、定制门产品、灯饰 照明类、厨卫装修类、五金工具类和五金电器类产品</em><span >&#148;</span></p>
       <div class="Store_Name">
        <div class="Store_Avatar"><span class="yuna_Avatar"></span><img src="images/touxiang.jpg"  width="30px" height="30px"/></div>
        <a href="#" title="好物工好物工艺坊艺坊" class="text_color">好物工好物工艺坊艺坊</a>
      </div>
     </div>       <div class="qihuo_pro">
      <a href="#" class="p_img"><img src="images/product/p-2.jpg"  width="280px" height="280px"/><span class="bg_Price">￥456.00</span></a>
      <h5><a href="#">新中式实木老榆木茶桌</a></h5>
      <p class="content"><span>&#147;</span><em class="summary">所有商品，美乐乐将严格按照国家三包法等有关法律、法规为您提供质保服务。家具类产品、木地板产品、定制门产品、灯饰 照明类、厨卫装修类、五金工具类和五金电器类产品</em><span >&#148;</span></p>
       <div class="Store_Name">
        <div class="Store_Avatar"><span class="yuna_Avatar"></span><img src="images/touxiang.jpg"  width="30px" height="30px"/></div>
        <a href="#" title="好物工好物工艺坊艺坊" class="text_color">好物工好物工艺坊艺坊</a>
      </div>
     </div>
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
@endsection
<script>
$(function () {
$(".qihuo_pro .summary").each(function () {
var maxwidth = 40;
if ($(this).text().length > maxwidth) {
var b = $(this).children().is("a");
if (b) {
$(this).children().text($(this).children().text().substring(0, maxwidth) + "...");
} else {
$(this).text($(this).text().substring(0, maxwidth));
$(this).text($(this).text() + "...");
}
}
});
});
</script>
