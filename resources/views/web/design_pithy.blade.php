@extends('web.layout.master')

@section('title','场景方案')

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
});
</script>




<body>
<div class="backgroundcolors">
<div class="header">
 <div class="header_top">
   <div class="top_info clearfix">
   <div class="logo_style l_f"><a href="#"><img src="{{url('web')}}/images/logo.jpg" /></a></div>
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
    <span class="header_touxiang"><img src="{{url('web')}}/images/touxiang_03.png" /></span>
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
 <div class="Scenario_Type">

    @foreach()

       <div class="Typename">
        <div class="title_name">
         <span class="sort_name">中式</span>
         <span class="sort_Introduction">这里加一段小描述修饰这里加一段小描述这里加一段小描述这里加一段小描述这里加一段小描述</span>
        </div>
        <div class="Scenario_Type_list">
        <a href="javascript:ovid()" class="next"><i class="icon iocn_next"></i></a>
          <div class="bd">
           <ul>
            <li><a href="#"><img src="{{url('web')}}/images/product/p-3.jpg"  height="400" width="280px"/></a></li>
            <li><a href="#"><img src="images/product/p-4.jpg"  height="400" width="280px"/></a></li>
            <li><a href="#"><img src="images/product/p-5.jpg"  height="400" width="280px"/></a></li>
            <li><a href="#"><img src="images/product/p-6.jpg"  height="400" width="280px"/></a></li>
           </ul>
          </div>
          <a href="javascript:ovid()" class="prev"><i class="icon iocn_prev"></i></a>
        </div>
       </div>

     @endforeach()


 </div>
</div>
</div>
</body>
</html>
@endsection

@section('footJs')
    {{--<script src="{{url('js')}}/design/designList.js"></script>--}}
    <script type="text/javascript">
        jQuery(".Scenario_Type_list").slide({mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:3,trigger:"click"});
    </script>
    @endsection