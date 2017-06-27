<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<link  href="css/common.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/z_css.css" type="text/css" rel="stylesheet" />
<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<title>美居秀秀</title>
<style>
.black_overlay{
display: none;
position: absolute;
top: 0%;
left: 0%;
width: 100%;
height: 1200px;
background-color: black;
z-index:9999;
-moz-opacity: 0.8;
opacity:0.80;
filter: alpha(opacity=80);
}
.white_content {
display: none;
position: absolute;
top: 10%;
left:0;right:0;
width: 620px;
padding-bottom:30px;
z-index:100200;
overflow: auto;margin:auto; background:#fff; border-radius:8px;
}
.icon_close{ float:right; cursor:pointer;}
.divbox1{padding:0 20px; height:50px; display:inline-block;}
.divboxtip{ width:58px; display:inline-block; text-align:right; padding-right:20px;}
.divinput{ width:502px; height:34px; border:1px solid #ddd !important;}
.divbox2{ width:100%; display:inline-block;}
.divfile{ width:69px; height:35px; overflow:hidden;}
.divbox3{ width:100%; height:73px;}
.divbox3 ul,.divbox6 ul{ margin-left:69px;}
.divbox3 ul li,.divbox6 ul li{ width:60px; overflow:hidden; background:#f9f9f9; height:60px; position:relative; margin-left:12px; float:left; cursor:pointer; margin-bottom:15px;}
.divbox3 ul li img,.divbox6 ul li img{ width:100%; position:absolute; margin:auto; overflow:auto; left:0;right:0; top:0; bottom:0;}
.divbox3 ul li span,.divbox6 ul li span{ width:60px; height:60px; line-height:60px; color:#fff; text-align:center; display:none; position: absolute;left:0; top:0; -khtml-opacity:0.5;-moz-opacity:0.5;filter:alpha(opacity=50);filter:"alpha(opacity=50)";opacity:0.5; filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50); background:#000;}
.divbox4{ padding:0 20px; display:inline-block; height:255px;}
.divtextarea{ width:502px; height:230px; border:1px solid #ddd !important;}
.divbox5{ text-align:center; width:100%;}
.surebtn{ width:98px; height:36px; line-height:36px; border-radius:3px; background:#7ebc12; border:1px solid #7ebc12; color:#fff; margin-right:20px; text-align:center; display:inline-block;}
.canclebtn{ width:98px; height:36px; line-height:36px; border-radius:3px; background:#fff; border:1px solid #7ebc12; color:#7ebc12; text-align:center; display:inline-block;}
.divbox6{ width:100%;min-height:73px;}
</style>

</head>
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
	$(".divbox3 ul li").mouseover(function(){
	  $(".divbox3 ul li span").show();
	});
    $(".divbox3 ul li").mouseout(function(){
	  $(".divbox3 ul li span").hide();
	});
	  
	$(".divbox6 ul li").mouseover(function(){
	  $(".divbox6 ul li span").show();
	});
    $(".divbox6 ul li").mouseout(function(){
	  $(".divbox6 ul li span").hide();
	});
})
</script>
<script type="text/javascript">
//弹出隐藏层
function ShowDiv(show_div,bg_div){
document.getElementById(show_div).style.display='block';
document.getElementById(bg_div).style.display='block' ;
var bgdiv = document.getElementById(bg_div);
bgdiv.style.width = document.body.scrollWidth;
// bgdiv.style.height = $(document).height();
$("#"+bg_div).height($(document).height());
};
//关闭弹出层
function CloseDiv(show_div,bg_div)
{
document.getElementById(show_div).style.display='none';
document.getElementById(bg_div).style.display='none';
};
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
      <option value="1">设计精粹</option>
      <option value="2">场景方案</option>
	  <option value="1">单品大库</option>
      <option value="2">找找感觉</option>
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
<!--主体  s-->
<div class="item">
	<div class="item_list">
    	找找感觉<em class="m_jt"><img src="images/m_jt.jpg" /></em><a href="#" class="item_list_a">色彩潮流</a><a href="#" style="color:#88c522;" class="item_list_a">美居秀秀</a><a href="#" class="item_list_a">有请专家</a>
    </div>
    <div class="item_tztip">
    	帖子：<span class="color_green">123244</span><a href="#" class="z_share"><em><img src="images/icon_share.jpg" /></em>分享</a><span onclick="ShowDiv('MyDiv','fade')" class="wyft_btn">我要发帖</span>
    </div>
</div>

<div class="phbox">
    <span class="fl">排序方式：<a href="#" class="phboxtip" style="color:#88c522;">按时间</a><a href="#" class="phboxtip">按点击量</a></span>
    <span class="fr">
        <div class="z_searchbox">
        <input type="text"  class="search_text fl"/><input type="button" class="search_button fr" />
        </div>
    </span>
</div>

<div class="z_main">
	<div class="z_mainbox1">
    	<a href="#" class="z_mainbox1pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox1title">家居装修色彩搭配潮流</a>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="z_mainbox2">
    	<a href="#" class="z_mainbox2pic"><img src="images/z_11.jpg" /></a>
        <a href="#" class="z_mainbox2title">蓝色+黄色，成熟悦动，以挑剔者眼眼光打造完美空间</a>
        <span class="z_mainbox2text">就像白与黑，蓝色与黄色这一对时尚对比色组合，令人百看不厌。沉静的蓝色散发着优雅且神秘的气息，黄色带给人的是活跃的生命力，犹如宁静的天空下跃动着的金色麦浪，成熟中收获着惊人的感动。但黄色作为挑剔的颜色，只有搭配合适的颜。</span>
    </div>
    <div class="clear"></div>
</div>
<div class="pic_page_style clearfix" style="width:1200px; margin:0 auto 30px auto; text-align:center;">
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
<div class="clear"></div>
<!--主体  e-->

<div class="footer clearfix" style="margin-top:0; background:#f5f5f5; border-top:1px solid #e6e6e6;">
<div class="footer_spacing clearfix">
  <span class="left_link l_f"><a href="#">首页</a>|<a href="#">设计精粹</a>|<a href="#">场景方案</a>|<a href="#">单品大库</a>|<a href="#">奇货可享</a>|<a href="#">找找感觉</a></span>
  <span class="copyright r_f">copyright©南京一家一世界网络科技有限公司 版权所有   苏ICP备16043372号-1</span>
  </div>
</div>

<!--弹出层时背景层DIV-->

<div id="fade" class="black_overlay">
</div>
<div id="MyDiv" class="white_content">
	<span onclick="CloseDiv('MyDiv','fade')"><img src="images/icon_close.png"  class="icon_close"/></span>
    <div class="divbox1">
    	<span class="divboxtip">标题:</span><input type="text" class="divinput" />
    </div>
    <div class="divbox2">
    	<span class="divboxtip fl" style="width:79px;">封面:</span><input type="file" class="divfile fl" /><span style="color:#999; padding-left:10px;">仅支持JPG,PNG GIF,JPEG,BMP格式，文件小于4M</span>
    </div>
    <div class="divbox3">
    	<ul>
        	<li><img src="images/zj_img01.jpg" /><span>删除</span></li>
        </ul>
    </div>
    <div class="divbox4">
    	<span class="divboxtip" style="vertical-align: top;">描述:</span><textarea class="divtextarea" cols="5"></textarea>
    </div>
    <div class="divbox2">
    	<span class="divboxtip fl" style="width:79px;">图片:</span><input type="file" class="divfile fl" /><span style="color:#999; padding-left:10px;">仅支持JPG,PNG GIF,JPEG,BMP格式，文件小于4M</span>
    </div>
    <div class="divbox6">
    	<ul>
        	<li><img src="images/zj_img01.jpg" /><span>删除</span></li>
        </ul>
    </div>
    <div class="divbox5 clear">
    <a href="#" class="surebtn">确定</a><a href="#" class="canclebtn">取消</a>
    </div>
</div>
</div>
</body>
</html>
