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
<title>美居秀秀详情</title>
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
top: 25%;
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
<div class="main_header_wrap">
    <div class="main_header">
    	<div class="main_header_box1">
            <p class="main_header_pic"><img src="images/touxiang.jpg" /></p>
            <p>一家一世界</p>
        </div>
        <div class="main_header_box2">
            <p class="main_header_title">蓝色+黄色，成熟悦动，以挑剔者眼光打造完美空间</p>
            <p class="main_header_time">2015-12-12 12:45</p>
        </div>
        <div class="main_header_box3">
            <span>
            	<p>12545</p>
                <p class="n_tt">浏览数</p>
            </span>
            <span style="border-left:1px solid #eee;border-right:1px solid #eee;">
            	<p>12545</p>
                <p class="n_tt">点赞</p>
            </span>
            <span>
            	<p>12545</p>
                <p class="n_tt">评论</p>
            </span>
        </div>
        <div class="main_header_box4">
           <img src="images/ewm.jpg" />
        </div>
    </div>
</div>
<div class="main_box">
	<div class="main_box_left">
        <div class="main_box_left1">
                <img src="images/z_img02.jpg" />
          <p>珊瑚色，是海洋赠予我们的浪漫礼物。它是海底随波而摆的珊瑚群，是掩藏于城堡深处无人踏及的百花园，那一丝源自海洋的清凉惬意，驱赶了夏日的燥热。暖而不燥的它，是家居世界中一抹温柔含蓄却不乏耀眼的色彩，似一颗充满水分的蜜桃，水润的模样令你爱不释手。</p>
          <p>活泼的珊瑚色暖而不燥，搭档清爽的浅松石色，如同海底聚集的一簇簇珊瑚群，随着清凉海水的波动而摇摇摆摆，调皮的鱼儿穿梭其中，一切都显得如此惬意。徜徉在如斯空间，似和海水亲密相拥，驱赶着夏日的热意。</p>
         <p> 珊瑚色空间，搭配颜色缤纷的花卉布艺，或是床品，或是沙发包布，花团锦簇的样子仿佛是那掩藏于城堡深处的花园，无人踏及的意趣是如此令人欢愉。而那清新的珊瑚色，如同生长于枝桠间的蜜桃，充满水分的莹润模样让人爱不释手。</p>
          <p>冷峻灰相遇热情红，是《小夜曲》与《斗牛舞曲》的交响协奏，是芭蕾舞与弗拉明戈的同台演绎，整个空间散逸着饱满高昂，性感撩人的情绪。与此同时灰色调的冷艳调和了珊瑚色的热情，整个空间保持着舒适的色泽视感。印花窗帘的介入带入一份灵动与婉约。让置身于其中的观者流连沉醉。</p>
          <p>白棕交接的间隙被珊瑚色侵占，水润清新的色调让整个空间充满着暖暖的幸福情意。印花图案与纯色系的交融，使得空间的层次更为明显，精致的宫灯与藏品的填补，使空间的格调更加优雅端庄。</p>
        </div>
      <div class="main_box_left2">
        	<div class="main_box_left2_title">
            	用户评论（123）
            </div>
            
            <div class="main_box_left1_pl">
           	  <span class="z_pl_pic">
                	<img src="images/touxiang.jpg" />
              </span>
              <div class="z_pl_text">
                	<p class="z_pl_name"><span class="fl">亚历山大·王</span><span class="fl z_pl_name_time">2016-09-25</span><span href="#" class="fr z_pl_hf" onclick="ShowDiv('MyDiv','fade')">回复</span></p>
                    <p>优秀的设计师，优秀的作品。</p>
              </div>
              <div class="main_box_left1_hf clear">
                <div class="main_box_left1_pl">
                  <span class="z_pl_pic">
                        <img src="images/touxiang.jpg" />
                  </span>
                  <div class="z_pl_text2">
                        <p class="z_pl_name"><span class="fl">亚历山大·王</span><span style="padding:0 6px; float:left; color:#999;" onclick="ShowDiv('MyDiv','fade')">回复</span><span style="padding:0 6px; color:#be895f; float:left;">安装等</span><span href="#" class="fr z_pl_hf" onclick="ShowDiv('MyDiv','fade')">回复</span></p>
                        <p>优秀的设计师，优秀的作品。</p>
                  </div>
                </div>
               </div>
            </div>
             <div class="main_box_left1_pl">
           	  <span class="z_pl_pic">
                	<img src="images/touxiang.jpg" />
              </span>
              <div class="z_pl_text">
                	<p class="z_pl_name"><span class="fl">亚历山大·王</span><span class="fl z_pl_name_time">2016-09-25</span><span href="#" class="fr z_pl_hf">回复</span></p>
                    <p>优秀的设计师，优秀的作品。</p>
              </div>
            </div>
           
            <a href="#" class="readyMore">更多</a>
        </div>
    </div>
    <div class="main_box_right">
   	  <div class="main_box_righttitle">
        	最新发布
        </div>
      <div class="main_box_rightlist">
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
            
      </div>
        
    </div>
    
<div class="clear"></div>
</div>
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
    	<span style=" line-height:48px; margin-right:20px;padding-left:8px;">回复</span><span style="color:#be895f;">亚琳的人名</span>
    </div>
   
    <div class="divbox4">
    	<span class="divboxtip" style="vertical-align: top;">内容:</span><textarea class="divtextarea" cols="5"></textarea>
    </div>
    
    <div class="divbox5 clear">
    <a href="#" class="surebtn">确定</a><a href="#" class="canclebtn">取消</a>
    </div>
</div>
</div>
</body>
</html>
