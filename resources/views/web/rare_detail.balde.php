@extends('web.layout.master')

@section('title','Hochwertige')

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
   "margin-left":($(".page_Style").width() - $('.pagination').outerWidth())/2, 
   });
	$(window).resize(function(){ 
  $('.pagination').css({ 
   "margin-left":($(".page_Style").width() - $('.pagination').outerWidth())/2, 
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
 <div class="qihuo_Details">
  <div class="Details_img">
   <div class="img"><img src="images/product/zs_2.jpg"  width="420" height="420"/></div>
   <div class="Other_operat clearfix">
    <a href="#" class="Collect"><i class="iconfont"></i>收藏</a>
      <a href="#" class="Share"><i class="iconfont"></i>分享</a>
   </div>
  </div>
  <div class="description">
    <a href="#" class="name">北欧实木化妆台</a>
    <div class="Store_Name">
    <div class="Store_Avatar"><span class="yuna_Avatar"></span><img src="images/touxiang.jpg"  width="30px" height="30px"/></div><a href="#">好物工艺坊</a>
    </div>
    <p class="price">￥<span>1234.0</span></p>
    <div class="Introduction">
     <span><img src="images/Double_quotes_left.png" /></span>
     特价明清榆木家具酒店饭店实木圆台 实木圆餐桌中式仿古大圆桌,我公司生产的实木家具属于大型贵重物品，尽管我公司与物流公司签署运费保险，万一在运输过程中出现了破损，请您千万千万在物流签收的时候，当面检查无误，一旦发现破损，当面拒签，若当面签收确认无误，后期退换货，需要买家客户自行负责运费，敬请谅解。（天然木材中的木疤以及工艺中的收缩缝属于家具正常的现象，不作为质量问题范畴）
     
     <span><img src="images/Double_quotes_right.png" /></span>
    </div>
    <div class="purchasing_btn clearfix">
      <div class="tb-btn-buy tb-btn-sku">
       <a id="J_LinkBuy" href="#" rel="nofollow" data-addfastbuy="true" title="点击此按钮，到下一步确认购买信息。" role="button" data-spm-anchor-id="">立即购买</a>
      </div>
       <div class="tb-btn-basket tb-btn-sku "><a href="#" rel="nofollow" id="J_LinkBasket" role="button"><i class="icon_shop"></i>加入购物车</a></div>
    </div>
   </div>
 </div>

</div>
@endsection
