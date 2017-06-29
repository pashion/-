@extends('web.layout.master')

@section('title','场景方案详细')

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
</head>

<body>
<div class="backgroundcolors">
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
 <div class="Program_details clearfix">
  <div class="Program_img_Display">
      <div class="Scenes_name">简约田园风书房套系</div>
          <div class="Show_style">
	 <div id="play">
	  <ul class="img_ul">
		<li>
        <a class="img_a"><img src="images/product/anl_02.png" /></a>
        <div id="Price_tag">
        <a href="#" target="_blank" class="Price_tags pro_Price"></a>
        <a href="#" class="Price_tags pro_Price1"></a>
        <a href="#" class="Price_tags pro_Price2"></a>
        <a href="#" class="Price_tags pro_Price3"></a>
        
        </div>
        </li>
		<li><a class="img_a"><img src="images/product/zs_2.jpg" /></a></li>
		<li><a class="img_a"><img src="images/product/zs_3.jpg" /></a></li>
		<li><a class="img_a"><img src="images/product/zs_4.jpg" /></a></li>
		<li><a class="img_a"><img src="images/product/zs_5.jpg" /></a></li>
		<li><a class="img_a"><img src="images/product/zs_6.jpg" /></a></li>
        <li><a class="img_a"><img src="images/product/zs_7.jpg" /></a></li>	
        <li><a class="img_a"><img src="images/product/zs_8.jpg" /></a></li>	
        <li><a class="img_a"><img src="images/product/p-3.jpg" /></a></li>	
        <li><a class="img_a"><img src="images/product/p-8.jpg" /></a></li>	
        <li><a class="img_a"><img src="images/product/anl_02.png" /></a></li>		
	  </ul>
	    <a href="javascript:void(0)" class="prev_a change_a" title="上一张"><span style="display: none;"></span></a>
	    <a href="javascript:void(0)" class="next_a change_a" title="下一张"><span style="display: none;"></span></a>
    </div>
    <div  class="Rotation_img">
      <div class="img_hd">
	 <ul class="clearfix">
		<li class=""><a class="img_a"><img src="images/product/anl_02.png" onload="imgs_load(this)"></a></li>
		<li class=""><a class="img_a"><img src="images/product/zs_2.jpg" onload="imgs_load(this)"></a></li>
		<li class=""><a class="img_a"><img src="images/product/zs_3.jpg" onload="imgs_load(this)"></a></li>
		<li class=""><a class="img_a"><img src="images/product/zs_4.jpg" onload="imgs_load(this)"></a></li>
		<li class=""><a class="img_a"><img src="images/product/zs_5.jpg" onload="imgs_load(this)"></a></li>
		<li class=""><a class="img_a"><img src="images/product/zs_6.jpg" onload="imgs_load(this)"></a></li>	
        <li class=""><a class="img_a"><img src="images/product/zs_7.jpg" onload="imgs_load(this)"></a></li>	
        <li class=""><a class="img_a"><img src="images/product/p-3.jpg" onload="imgs_load(this)"></a></li>	
        <li class=""><a class="img_a"><img src="images/product/p-8.jpg" onload="imgs_load(this)"></a></li>	
        <li class=""><a class="img_a"><img src="images/product/anl_02.png" onload="imgs_load(this)"></a></li>	
	 </ul>
     </div>
	   <a class="bottom_a prev_a" style="opacity: 0.7;"><em class=" arrow_prev"></em></a>
	   <a class="bottom_a next_a" style="opacity: 0.7;"><em class=" arrow_next"></em></a>
     </div>  
     <div class="Other_operat clearfix">
      <a href="#" class="like"><i class="iconfont "></i>点赞</a>
      <a href="#" class="Collect"><i class="iconfont"></i>收藏</a>
      <a href="#" class="Share"><i class="iconfont"></i>分享</a>
     </div>
	</div>
  </div>
  <div class="other_Program_list">
   <div class="Program_name"><span>相关场景</span></div>
   <div class="Sceneslist">
    <div class="hd">
     <a href="javascript:ovid()" class="next"></a>
     <a href="javascript:ovid()" class="prev"></a>
    </div>
    <div class="bd">
     <ul>
      <li><a href="#"><img src="images/product/p-4.jpg"  width="148px;"/><h3>简约田园风书房套系</h3></a></li>
      <li><a href="#"><img src="images/product/p-4.jpg"  width="148px;" /><h3>简约田园风书房套系</h3></a></li>
      <li><a href="#"><img src="images/product/p-4.jpg"  width="148px;" /><h3>简约田园风书房套系</h3></a></li>
      <li><a href="#"><img src="images/product/p-4.jpg"  width="148px;" /><h3>简约田园风书房套系</h3></a></li>
     </ul>
    </div>
   </div>
   <script> jQuery(".Sceneslist").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,vis:3,trigger:"click"});</script>
  </div>
 </div>
 <!--套餐方案-->
 <div class="Package_style">
  <div class="Scenes_Package clearfix">
    <div class="title_name">套餐一</div>
    <div class="Package_content clearfix">
      <div class="Package_product">
         <a href="#">
        <img src="images/product/p-4.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_jia">
        <img src="images/icon_jia.png" />
       </div>
           <div class="Package_product">
         <a href="#">
        <img src="images/product/p-4.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_jia">
        <img src="images/icon_jia.png" />
       </div>
           <div class="Package_product">
         <a href="#">
        <img src="images/product/p-4.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_jia">
        <img src="images/icon_jia.png" />
       </div>
           <div class="Package_product">
         <a href="#">
        <img src="images/product/p-4.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_jia">
        <img src="images/icon_jia.png" />
       </div>
           <div class="Package_product">
         <a href="#">
        <img src="images/product/p-4.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_degnyu">
        <img src="images/icon_dengyu.png" />
       </div>
       <div class="Package_total">
        <p>已选择0个配件</p>
        <p class="Original_price">原价：<span>￥34566</span></p>
        <p class="Package_price">套餐价：<span class="price"><em>￥</em>56540.00</span></p>
        <p class="operbtn"><a href="javascript:void()" class="buy_btn">立即购买</a><a href="javascript:void()" class="add_cart">加入购物车</a></p>
       </div>
    </div>
  </div>
   <div class="Scenes_Package clearfix">
    <div class="title_name">套餐二</div>
    <div class="Package_content clearfix">
      <div class="Package_product">
         <a href="#">
        <img src="images/product/p-4.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_jia">
        <img src="images/icon_jia.png" />
       </div>
           <div class="Package_product">
         <a href="#">
        <img src="images/product/p-4.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_jia">
        <img src="images/icon_jia.png" />
       </div>
           <div class="Package_product">
         <a href="#">
        <img src="images/product/p-4.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_jia">
        <img src="images/icon_jia.png" />
       </div>
           <div class="Package_product">
         <a href="#">
        <img src="images/product/p-4.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_jia">
        <img src="images/icon_jia.png" />
       </div>
           <div class="Package_product">
         <a href="#">
        <img src="images/product/p-4.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_degnyu">
        <img src="images/icon_dengyu.png" />
       </div>
       <div class="Package_total">
        <p>已选择0个配件</p>
        <p class="Original_price">原价：<span>￥34566</span></p>
        <p class="Package_price">套餐价：<span class="price"><em>￥</em>56540.00</span></p>
        <p class="operbtn"><a href="javascript:void()" class="buy_btn">立即购买</a><a href="javascript:void()" class="add_cart">加入购物车</a></p>
       </div>
    </div>
  </div>
    <div class="Scenes_Package clearfix">
    <div class="title_name">套餐三</div>
    <div class="Package_content clearfix">
      <div class="Package_product">
         <a href="#">
        <img src="images/product/p-5.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_jia">
        <img src="images/icon_jia.png" />
       </div>
           <div class="Package_product">
         <a href="#">
        <img src="images/product/p-2.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_jia">
        <img src="images/icon_jia.png" />
       </div>
           <div class="Package_product">
         <a href="#">
        <img src="images/product/p-4.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_jia">
        <img src="images/icon_jia.png" />
       </div>
           <div class="Package_product">
         <a href="#">
        <img src="images/product/p-4.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_jia">
        <img src="images/icon_jia.png" />
       </div>
           <div class="Package_product">
         <a href="#">
        <img src="images/product/p-4.jpg"  width="130px" height="130px;"/>
         <h5>欧式白色椅书椅</h5>
        </a>
        <p class="price_checkbox"><label><input name="" type="checkbox" value=""  class="checkbox"/>￥2436.00</label></p>
        <a href="#" class="More">更多选择</a>
      </div>
       <div class="icon_degnyu">
        <img src="images/icon_dengyu.png" />
       </div>
       <div class="Package_total">
        <p>已选择0个配件</p>
        <p class="Original_price">原价：<span>￥34566</span></p>
        <p class="Package_price">套餐价：<span class="price"><em>￥</em>56540.00</span></p>
        <p class="operbtn"><a href="javascript:void()" class="buy_btn">立即购买</a><a href="javascript:void()" class="add_cart">加入购物车</a></p>
       </div>
    </div>
  </div>
  
 </div>
</div>
</div>
@endsection

