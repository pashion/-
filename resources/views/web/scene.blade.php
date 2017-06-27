<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link  href="css/common.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="js/jquery.imagezoom.min.js"></script>
<script type="text/javascript" src="js/layer/layer.js"></script>
<script src="js/accordion.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<title>场景方案</title>
</head>
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
   "margin-left":($(".content_style ").width() - $('.pagination').outerWidth())/2, 
   });
	$(window).resize(function(){ 
  $('.pagination').css({ 
   "margin-left":($(".content_style ").width() - $('.pagination').outerWidth())/2, 
   }); 
});  
<!--实现手风琴下拉效果-->
$(function(){
   $(".sideMenu_list").accordion({
        accordion: false,
        speed: 500,
	    closedSign: '<i class="icon_closedSign"></i>',
		openedSign: '<i class="icon_openedSign"></i>',
		addclass:'checked_menu'
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
<!--场景方案-->
<div class="content_style clearfix">
  <div class="Program_style">
    <div class="Scene_sort clearfix" id="Scene_sort">
     <ul class="sort_list">
      <li class="sort_style">
       <div class="sort_img"><span class="sort_yuan_bg"></span><img src="images/product/p-4.jpg"  width="80px" height="80"/></div>
       <div class="sort_name">
        <h2>区域分类</h2>
        <h4>多种场景方案供你选择</h4>
       </div>
       <div class="sub">
        <div class="Filter_section sideMenu">
          <ul class="sideMenu_list">
            <li class="Menu_Bar"><a href="#" class="one_menu">客厅</a>
            <ul class="Secondary_menu">
             <li><a href="#">20㎡</a></li>
             <li><a href="#">25㎡</a></li>
             <li><a href="#">30㎡</a></li>
             <li><a href="#">40㎡</a></li>
            </ul>
            </li>
            <li class="Menu_Bar"><a href="#" class="one_menu">餐厅</a></li>
            <li class="Menu_Bar"><a href="#" class="one_menu">主卧</a></li>
            <li class="Menu_Bar"><a href="#" class="one_menu">次卧</a></li>	
            <li class="Menu_Bar"><a href="#" class="one_menu">书房</a></li>	
            <li class="Menu_Bar"><a href="#" class="one_menu">棋牌室</a></li>	
            <li class="Menu_Bar"><a href="#" class="one_menu">门厅</a></li>	
            <li class="Menu_Bar"><a href="#" class="one_menu">阳台</a></li>	
            <li class="Menu_Bar"><a href="#" class="one_menu">厨房</a>
             <ul class="Secondary_menu">
             <li><a href="#">20㎡</a></li>
             <li><a href="#">25㎡</a></li>
             <li><a href="#">30㎡</a></li>
             <li><a href="#">40㎡</a></li>
            </ul>
            </li>
            <li class="Menu_Bar"><a href="#" class="one_menu">卫生间</a>
             <ul class="Secondary_menu">
             <li><a href="#">20㎡</a></li>
             <li><a href="#">25㎡</a></li>
             <li><a href="#">30㎡</a></li>
             <li><a href="#">40㎡</a></li>
            </ul>
            </li>						
          </ul>
        </div>
       </div>
      </li>
       <li class="sort_style">
       <div class="sort_img"><span class="sort_yuan_bg"></span><img src="images/product/p-4.jpg"  width="80px" height="80"/></div>
       <div class="sort_name">
        <h2>风格分类</h2>
        <h4>看不同风格  装喜爱之家</h4>
       </div>
      </li>
       <li class="sort_style">
       <div class="sort_img"><span class="sort_yuan_bg"></span><img src="images/product/p-4.jpg"  width="80px" height="80"/></div>
       <div class="sort_name">
        <h2>色彩分类</h2>
        <h4>多种色咖 专治审美疲劳</h4>
       </div>
      </li>
       <li class="sort_style">
       <div class="sort_img"><span class="sort_yuan_bg"></span><img src="images/product/p-4.jpg"  width="80px" height="80"/></div>
       <div class="sort_name">
        <h2>我的小区</h2>
        <h4>看看同个小区的选择吧</h4>
       </div>
      </li>
     </ul>
    </div>
    <script>
	jQuery("#Scene_sort").slide({ type:"Scene_sort", titCell:".sort_style", targetCell:".sub",effect:"slideDown",delayTime:100,triggerTime:0,returnDefault:false});
    </script>
  </div>
  <!--方案列表-->
  <div class="Program_list clearfix">
  <div class="clearfix">
     <div class="Program_single_style">
      <a href="#" class="Program_single_img">
      <p><img src="images/product/zs_4.jpg"  width="280px" height="400"/></p>
      <h3>现代简约设计效果图</h3>
      </a>
     <div class="Program_operating">
    <span class="Evaluation"><a href="#"><em class="iconfont icon_Evaluation"></em>567</a></span>
    <span class="Collection"><a href="#"><em class="iconfont icon_Collection"></em>567</a></span>
    <span class="share"><a href="#"><em class="iconfont icon_share"></em></a></span></p>
     </div>
  </div>
  <div class="Program_single_style">
      <a href="#" class="Program_single_img">
      <p><img src="images/product/zs_4.jpg"  width="280px" height="400"/></p>
      <h3>现代简约设计效果图</h3>
      </a>
     <div class="Program_operating">
    <span class="Evaluation"><a href="#"><em class="iconfont icon_Evaluation"></em>567</a></span>
    <span class="Collection"><a href="#"><em class="iconfont icon_Collection"></em>567</a></span>
    <span class="share"><a href="#"><em class="iconfont icon_share"></em></a></span></p>
     </div>
  </div>
  <div class="Program_single_style">
      <a href="#" class="Program_single_img">
      <p><img src="images/product/zs_4.jpg"  width="280px" height="400"/></p>
      <h3>现代简约设计效果图</h3>
      </a>
     <div class="Program_operating">
    <span class="Evaluation"><a href="#"><em class="iconfont icon_Evaluation"></em>567</a></span>
    <span class="Collection"><a href="#"><em class="iconfont icon_Collection"></em>567</a></span>
    <span class="share"><a href="#"><em class="iconfont icon_share"></em></a></span></p>
     </div>
  </div>
  <div class="Program_single_style">
      <a href="#" class="Program_single_img">
      <p><img src="images/product/zs_4.jpg"  width="280px" height="400"/></p>
      <h3>现代简约设计效果图</h3>
      </a>
     <div class="Program_operating">
    <span class="Evaluation"><a href="#"><em class="iconfont icon_Evaluation"></em>567</a></span>
    <span class="Collection"><a href="#"><em class="iconfont icon_Collection"></em>567</a></span>
    <span class="share"><a href="#"><em class="iconfont icon_share"></em></a></span></p>
     </div>
  </div>
  <div class="Program_single_style">
      <a href="#" class="Program_single_img">
      <p><img src="images/product/zs_4.jpg"  width="280px" height="400"/></p>
      <h3>现代简约设计效果图</h3>
      </a>
     <div class="Program_operating">
    <span class="Evaluation"><a href="#"><em class="iconfont icon_Evaluation"></em>567</a></span>
    <span class="Collection"><a href="#"><em class="iconfont icon_Collection"></em>567</a></span>
    <span class="share"><a href="#"><em class="iconfont icon_share"></em></a></span></p>
     </div>
  </div>
  <div class="Program_single_style">
      <a href="#" class="Program_single_img">
      <p><img src="images/product/zs_4.jpg"  width="280px" height="400"/></p>
      <h3>现代简约设计效果图</h3>
      </a>
     <div class="Program_operating">
    <span class="Evaluation"><a href="#"><em class="iconfont icon_Evaluation"></em>567</a></span>
    <span class="Collection"><a href="#"><em class="iconfont icon_Collection"></em>567</a></span>
    <span class="share"><a href="#"><em class="iconfont icon_share"></em></a></span></p>
     </div>
  </div>
  </div>
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
<div class="footer clearfix">
<div class="footer_spacing clearfix">
  <span class="left_link l_f"><a href="#">首页</a>|<a href="#">设计精粹</a>|<a href="#">场景方案</a>|<a href="#">单品大库</a>|<a href="#">奇货可享</a>|<a href="#">找找感觉</a></span>
  <span class="copyright r_f">copyright©南京一家一世界网络科技有限公司 版权所有   苏ICP备16043372号-1</span>
  </div>
</div>
</body>
</html>
