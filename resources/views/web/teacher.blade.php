@extends('web.layout.master')

@section('title','设计师介绍')

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
<!--设计师介绍-->
<div class="content_style clearfix">
 <div class="page_Style">
  <div class="header_Page">
  <img  src="images/home_bananer_03.jpg"  />
  <div class="header_name">
   <span class="title_name">深圳太合南方建筑室内设计事务所</span>
   <span class="r_f margintop" >
    <a href="#" class="Store_data"><em class="icon_like"></em>234567</a>
    <a href="" class="Store_data"><em class="icon_user"></em>234567</a>
   </span>
  </div>
  </div>
  <!--内容-->
  <div class="Store_info clearfix">
    <div class="left_style">
     <div class="Designers clearfix">
   <div class="Avatar_style">
     <div class="Avatar">  
     </div>
    <img src="images/touxiang.jpg"  width="110" height="110" class="user_img"/>
   </div>
   <div class="name_star">
   <p class="name">杰克逊</p>
   <p class="Star_rating"><img src="images/peifen_03.png" /> <img src="images/peifen_03.png" /> <img src="images/peifen_03.png" /></p>
   </div>
  <div class="Shop_info">
   <div class="name">深圳太合南方建筑室内设计事务所</div>
   <ul class="contact_details">
    <li><label>坐标：</label>   广东  深圳</li>
    <li><label>电话：</label>   025-666666</li>
    <li><label>座机：</label>   025-666666</li>
    <li><label>Email：</label> wwp@mail.com</li>
    <li><label>微信：</label>   thnf666666</li>
    
   </ul>
  </div>
  
   </div>
    </div>
    <div class="right_style">
    <div class="Section_title">营业信息</div>
    <div class="Store_details">
     <div class="Shop_avatar">
      <img src="images/touxiang.jpg"  width="550px" height="550px"/>
     </div>
     <div class="details_content">
     <p style=" margin:20px 0px;">擅长空间：售楼处,家居住宅,别墅豪宅,办公室,样板房,会所,餐厅</p>
     <p style=" margin:20px 0px;">所在地：广东 深圳</p> 
     <p style=" margin:20px 0px;">个人简介<br />
深圳室内设计师协会(SZAID)理事，从事室内设计15年，现任深圳太合南方建筑室内设计事务所总设计师。
作品多次刊登TOP《装潢世界》、《时代空间》、《现代装饰》等杂志中，现长期受邀担任 “深圳电台”栏目客座设计嘉宾，作品且多次整版刊登于《南方都市报》家居版,曾应意邀去意大利设计考察交流，担任中国建筑景观“美居奖”华南赛区总决赛评委。作品荣登CCTV财经频道《交换空间》节目中的“空间榜样”栏目。</p>
      <p style=" margin:20px 0px;">证书与奖励<br />
2008“鹏城杯” 会所空间设计大赛荣获金奖<br />
2008年度中国（深圳）国际第四届室内设计文化节获佳作奖<br />
009年度获广东装饰设计行业“岭南杯” 铜奖<br />
2010年获广州设计周 金羊奖.新锐杯 季军<br />
2011年获APDC亚太室内设计精英邀请赛优胜奖<br />
2013年获APDC亚太室内设计精英邀请银奖</p>
     </div>
    </div>
    </div>
  </div>
 </div>
</div>
@endsection

