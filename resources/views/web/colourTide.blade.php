<!DOCTYPE html>
<!-- saved from url=(0049)http://www.yjysj.com.cn/colourTide/colourTideList -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" type="image/x-icon" href="http://www.yjysj.com.cn/images/favicon.ico">
<!--<base href="http://www.yjysj.com.cn:80/">--><base href=".">

<link href="{{url('web')}}/colour/common.css" type="text/css" rel="stylesheet">
<link href="{{url('web')}}/colour/style.css" type="text/css" rel="stylesheet">
<link href="{{url('web')}}/colour/z_css.css" type="text/css" rel="stylesheet">
<script src="{{url('web')}}/colour/jquery-1.9.1.min.js.下载" type="text/javascript"></script>
<script type="text/javascript" src="{{url('web')}}/colour/layer.js.下载"></script><link rel="stylesheet" href="{{url('web')}}/colour/layer.css" id="layui_layer_skinlayercss">
<script type="text/javascript" src="{{url('web')}}/colour/jquery.SuperSlide.2.1.1.js.下载"></script>
<script type="text/javascript" src="{{url('web')}}/colour/prod.js.下载"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<link href="{{url('web')}}/colour/kkpager_blue.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="{{url('web')}}/colour/kkpager.min.js.下载"></script>
<title>找找感觉</title>
<style type="text/css">
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
<script type="text/javascript">
	var basePath="http://www.yjysj.com.cn:80/";
	var alert=function(){
		layer.msg(arguments[0], {});
	};
</script>

<script type="text/javascript">
	$(document).ready(function(){
		 setBoxCartCount();
 		$(".q_code ").hover(function(){
			$(this).find(".q_code_layer").addClass("hover").css("display","block");
		},function(){
			$(this).find(".q_code_layer").removeClass("hover").css("display","none");  

		}); 
	 $(".diagram ").hover(function(){
			$(this).addClass("hover");
		},function(){
			$(this).removeClass("hover");  

		}); 
	
    
    var orderFlag = $("#orderFlag").val();
	$(".phboxtip").removeAttr("style");
	if(orderFlag == "2") {
		$("#orderFlag_count").attr("style","color:#88c522;");
	} else {
		$("#orderFlag_time").attr("style","color:#88c522;");
	}
	$("#searchForm").find(":text[name=name]").val("").parent().find("select[name=type] > [value=4]").prop("selected",true);//如果搜索
})
</script>

<script src="{{url('web')}}/colour/share.js.下载"></script><link rel="stylesheet" href="{{url('web')}}/colour/share_style0_32.css"></head>

<body>
	






<script type="text/javascript" src="{{url('web')}}/colour/layer.js.下载"></script>


	
		
	
	

<div class="header" id="gotop">
     <div class="header_top">
       <div class="logo_style l_f">
            <a href="http://www.yjysj.com.cn/"><img src="{{url('web')}}/colour/logo.png"></a>
       </div>
       <div class="header_menu">
         <!--菜单导航栏-->
         <!--<a href="" class="">网站首页</a>-->
         <a href="http://www.yjysj.com.cn/case/listPage" class="">设计精粹</a>
         <a href="http://www.yjysj.com.cn/scene/listPage" class="">场景方案</a>
         <a href="http://www.yjysj.com.cn/prod/rooListPage" class="">单品大库</a>
         <a href="http://www.yjysj.com.cn/prod/greateListPage" class="">奇货可享</a>
         <a href="http://www.yjysj.com.cn/colourTide/colourTideList" class=" menu_cur">找找感觉</a>
       </div>
       <div class="Search_style l_f">
        <form id="searchForm" onsubmit="return false;">
        	 <select name="type" size="1" style="padding:0; float:left;">
		      <option value="0" selected="selected">设计精粹</option>
		      <option value="1">场景方案</option>
		      <option value="2">单品大库</option>
		      <option value="3">奇货可享</option>
		      <option value="4">色彩潮流</option>
		      <option value="5">美居秀秀</option>
		      <option value="6">有请专家</option>
		    </select>
	        <input name="name" type="text" class="add_Search">
	        <input name="" type="button" onclick="frmSearchSubmit(this);" value="" class="submit_Search">
        </form>
       </div>
       <div class="Cart_user r_f">
           <div class="Cart_Quantity" onclick="location.href=basePath+&#39;cart/listPage&#39;;" style="cursor: pointer;"><span class="number"><span style="position: relative;"><em class="cCartCount_bg" style=""><!--<img src="images/icon_dot.png"/>--></em><b class="cCartCount">0</b></span></span></div>
           <div class="header_operating l_f">
                <span class="header_touxiang"><img src="{{url('web')}}/colour/touxiang_03.png"></span>
                <a href="javascript:" onclick="location.href=basePath+&#39;user/member&#39;;">
	                
				    	
							   登录
				    	
				    	
				    
                </a>
                
			    	
						<a href="javascript:location.href=basePath+&#39;user/regPage&#39;;">注册</a>
			    	
			    	
			    
           </div>
       </div>
     </div>
</div>
<script>
	$(function(){
		//阻止事件传递
		function stopEvent(e){
			if ( e && e.preventDefault ) 
				   e.preventDefault(); 
				    else 
				   window.event.returnValue = false; 
			 if (window.event) {
				  e.cancelBubble=true;// ie下阻止冒泡
				 } else {
				  //e.preventDefault();
				  e.stopPropagation();// 其它浏览器下阻止冒泡
				 }
		}
		function postWithForm(url,data,bSafe,bNewWindow){
			if(!bSafe)bSafe=false;
			//if(!!url&&typeof url == "string"&&url.length>0)
			{
				var action=(typeof basePath=="string"&&!url.startsWith("http")?basePath+"":"")+url;
				var $form=$("<form method=\"post\" style=\"display:none;\" action=\""+action+"\" "+(bNewWindow?"target=\"_blank\"":"")+"></form>");
				$.each(data,function(k,v){
					var v=new String(v);
					$form.append("<input name=\""+(new String(k))+"\" value=\""+(bSafe?encodeURIComponent(v):v)+"\" />");
				});
				$("body").append($form);
				$form.submit();
				//$form.remove();
			}
		}
		//$("#searchForm").submit(
				
				$("#searchForm").find(":text[name=name]").keypress(function(e){
					if(e.keyCode==13){//回车搜索
						frmSearchSubmit();
					}
				});
		//);
	});
	window.frmSearchSubmit=function(e){//顶部搜索
		var param=$($("#searchForm")[0]).serializeArray();
		var 
			searchType=param[0].value,
		    searchName=param[1].value
		;
		if(0==searchType){//设计
			postWithForm("case/listPage",{
				searchName:searchName
			},true,false);
		}else if(1==searchType){//场景
			location.href='scene/mtPage?'+$.param({
				searchName :encodeURIComponent((searchName)),
				bNoDefault :1,
			});
		}else if(2==searchType){//单品
			postWithForm("prod/rooListPage",{
				searchName:searchName
			},false,false);
		}else if(3==searchType){//好物
			postWithForm("prod/greateListPage",{
				searchName:searchName
			},true,false);
		}else if(4==searchType){//色彩潮流
			postWithForm("colourTide/colourTideList",{
				searchName:searchName,
				pageIndex:1
			},true,false);
		}else if(5==searchType){//美居秀秀
			postWithForm("decorationShow/toDecorationShow",{
				searchName:searchName,
				pageIndex:1
			},true,false);
		}else if(6==searchType){//有请专家
			postWithForm("welcomeExperts/askQuestionsList",{
				searchName:searchName,
				pageIndex:1
			},true,false);
		}
		stopEvent(e);
		return false;
	}
	$(function(){
		$("#btn_exit").click(function(){
				layer.confirm('是否要注销?', {icon: 3, title:'提示'}, function(index){
					  //do something
					  function exit(){
						  layer.close(index);
						  location.reload();
						 // location.href=basePath+'';
					  }
					  $.ajax({
							url:"user/logout",
							data:{
							},
							type:"POST",
							dataType:"json",async:false,
							success:function(result){
								exit();
							},error:function(){
								exit();
							}
						});
					});
		});
	});
</script>
	
	<!--主体  s-->
	<div class="item">
		<div class="item_list">
	    	一家一世界<em class="m_jt"><img src="{{url('web')}}/colour/m_jt.jpg"></em>
	    	<a href="http://www.yjysj.com.cn//colourTide/colourTideList" style="color:#88c522;" class="item_list_a">找找感觉</a>
	    </div>
	    <div class="item_tztip">
	    	帖子：<span class="color_green">7</span>
	    	<a href="javascript:void(0)" onclick="share();" class="z_share"><em><img src="{{url('web')}}/colour/icon_share.jpg"></em>分享</a>
	    </div>
	</div>
	
	<div class="phbox">
	    <span class="fl">欢迎咨询设计方案,挑选家具
	    	<input type="hidden" id="orderFlag" value="1">
	    <span class="fr">
	    </span>
	</div>
	
	<div class="z_main">

							@foreach($Article as $k=>$v)
							<div class="z_mainbox2">
						    	<a href="{{url('colourTide')}}/detail?colourId={{$v->id}}" class="z_mainbox2pic"><img src="{{$v->coverpath}}/{{$v->cover}}"></a>
						        <a href="{{url('colourTide')}}/detail?colourId={{$v->id}}" class="z_mainbox2title">{{$v->title}}</a>
						        <a href="{{url('colourTide')}}/detail?colourId={{$v->id}}"><span class="z_mainbox2text">
					            {{$v->description}}
						        </span></a>
					    	</div>
							@endforeach
			
		
	    <div class="clear"></div>
	    
	    <div class="pic_page_style clearfix" style="display: none;">
	      <ul class="page_example pagination">
	      		
	      		
	      		
	      		
		       
	      </ul>
      </div>
      <div style="padding:0 10px;"><div id="kkpager"><div><span class="pageBtnWrap"><span class="disabled">首页</span><span class="disabled">上一页</span><span class="curr">1</span><span class="disabled">下一页</span><span class="disabled">尾页</span></span><span class="infoTextAndGoPageBtnWrap"><span class="totalText">当前第<span class="currPageNum">1</span>页<span class="totalInfoSplitStr">/</span>共<span class="totalPageNum">1</span>页</span><span class="goPageBox">&nbsp;转到<span id="kkpager_gopage_wrap"><input type="button" id="kkpager_btn_go" onclick="kkpager.gopage()" value="确定"><input type="text" id="kkpager_btn_go_input" onfocus="kkpager.focus_gopage()" onkeypress="return kkpager.keypress_gopage(event);" onblur="kkpager.blur_gopage()" value="1"></span>页</span></span></div><div style="clear:both;"></div></div></div>
  <script type="text/javascript">
	//生成分页控件  
	kkpager.generPageHtml({
	    pno : '1',
	    mode : 'click', //设置为click模式
	    //总页码  
	    total : '1',  
	    //总数据条数  
	    totalRecords : '7',
	    //点击页码、页码输入框跳转、以及首页、下一页等按钮都会调用click
	    //适用于不刷新页面，比如ajax
	    click : function(n){
	        //这里可以做自已的处理
	        //...
	        //处理完后可以手动条用selectPage进行页码选中切换
	        
	        goPage(n);
	        return false;
	    },
	    //getHref是在click模式下链接算法，一般不需要配置，默认代码如下
	    getHref : function(n){
	        return '#';
	    }
	
	});
  </script>
	</div>
	
	<div class="clear"></div>
	<!--主体  e-->
	




	
	
		
	

<div id="bdsharebuttonbox" style="width: 100%; height: 1356px; background: rgba(0, 0, 0, 0.5); z-index: 99999; position: absolute; top: 0px; left: 0px; display: none;">
	<div class="bdsharebuttonbox bdshare-button-style0-32" style="width: 368px; position: fixed;left:0; right:0; margin:auto; padding-top: 20px; top: 0; bottom:0; height:140px;  background-color: #e9e9ea; z-index: 999999;    border-radius: 5px;" data-bd-bind="1499419078081">
		
		<a href="http://www.yjysj.com.cn/#" class="bds_more" data-cmd="more" style="display: none"></a>
		<a href="http://www.yjysj.com.cn/#" class="bds_qzone" style="float: left; width: 50px; height: 50px; text-indent: inherit; background: url(images/share_qq2.png); background-repeat: no-repeat; background-size: 100%; cursor: pointer; margin: 20px 0px 20px 33px; overflow: hidden; display: inline-block;" data-cmd="qzone" title="分享到QQ空间"></a> <a href="http://www.yjysj.com.cn/#" class="bds_tsina" style="float: left; width: 50px; height: 50px; text-indent: inherit; background: url(images/share_tx.png); background-size: 100%; background-repeat: no-repeat; cursor: pointer; margin: 20px 0px 20px 33px; overflow: hidden; display: inline-block;" data-cmd="tsina" title="分享到新浪微博"></a> <a href="http://www.yjysj.com.cn/#" class="bds_weixin" style="float: left; width: 50px; height: 50px; text-indent: inherit; background: url(images/share_weixin.png); background-size: 100%; background-repeat: no-repeat; cursor: pointer; margin: 20px 0px 20px 33px; overflow: hidden; display: inline-block;" data-cmd="weixin" title="分享到微信"></a> <a href="http://www.yjysj.com.cn/#" class="bds_sqq" style="float: left; width: 50px; height: 50px; text-indent: inherit; background: url(images/share_qq.png); background-size: 100%; background-repeat: no-repeat; cursor: pointer; margin: 20px 0px 20px 33px; overflow: hidden; display: inline-block;" data-cmd="sqq" title="分享到QQ好友"></a>
		<div style="position: absolute;right:-10px; top:-10px; cursor:pointer;" onclick="share();"><img src="{{url('web')}}/colour/icon_close.png"></div>
	</div>
</div>
<script>
	function share() {
		if ($("#bdsharebuttonbox").css("display") == "none") {
			$("body").eq(0).css("overflow", "hidden");
			$("#bdsharebuttonbox").fadeIn("slow", function() {
				bc = true;
			});
		} else {
			$("body").eq(0).css("overflow", "");
			$("#bdsharebuttonbox").fadeOut("slow", function() {
				bc = false;
			});
		}
	}
	var sharePoint = function(cmd) {
		
			$.ajax({
				url : 'user/sharePoint',
				dataType : 'text',
				data : {},
				type : 'post',
				success : function() {
				}
			});
		
	};
	window._bd_share_config = {
		"common" : {
			"onAfterClick" : sharePoint,
			"bdSnsKey" : {},
			"bdText" : "来自一家一世界的分享",
			"bdDesc" : "来自一家一世界的分享",
			"bdMini" : "2",
			"bdMiniList" : false,
			"bdPic" : "",
			"bdStyle" : "0",
			"bdSize" : "32"
		},
		"share" : {}
	};
	with (document)
		0[(getElementsByTagName('head')[0] || body)
				.appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='
				+ ~(-new Date() / 36e5)];
</script>
<script type="text/javascript">
	$(function() {
		$("#bdsharebuttonbox").height($(document).height());
	});
	var bc = false;
	$(document).bind("click", function(e) {
		$('div').closest('.bdsharebuttonbox').each(function() {
			if (e.target != this) {
				if (bc) {
					share();
				}
			}
		});
	})
	window.onscroll = function() {
		if (!$("#bdsharebuttonbox").css("display") == "none") {
			share();
		}
	}
</script>

	




<link href="{{url('web')}}/colour/z_css.css" type="text/css" rel="stylesheet">


<span style="
	float:right; 
	margin-right:4%; 
	text-align: center;
	display: inline-block;
    padding: 10px;
    line-height: 30px;
    margin: 0 15px;
	position: fixed;
    right: 0;
    bottom: 5%;z-index: 999;">
        <p><a href="javascript:" id="btn_goTop" style="display: none;"><img src="{{url('web')}}/colour/gotop.png" width="80%" style="margin-top:-20px; margin-bottom:-5px;"></a></p>
</span>
<!--二维码  s-->
<div class="ewm bgcolor_efeeed" style="min-width:1280px;  position: relative;">
    <div style="width:1200px; margin:0 auto;">
	<span>
        <p>手机端访问</p>
        <p><img src="{{url('web')}}/colour/149341711189183.png" width="120" height="120"></p>
    </span>
    <span style="display: none;">
        <p>手机app端访问</p>
        <p><img src="http://www.yjysj.com.cn/" width="120" height="120"></p>
    </span>
    <span>
        <p>微信端访问</p>
        <p><img src="{{url('web')}}/colour/148756908772836.png" width="120" height="120"></p>
    </span>
	</div>
    <span style=" margin-right:4%; margin-top:30px;position: absolute;right: 0;top: 0;">
        <p><img src="{{url('web')}}/colour/149341711189183.png" width="120" height="120"></p>
	</span>	

    <p class="ewm_icon" style="display: none;"><img src="{{url('web')}}/colour/index_14.jpg" width="42" height="42"><img src="{{url('web')}}/colour/index_16.jpg" width="42" height="42"><img src="{{url('web')}}/colour/index_18.jpg" width="42" height="42"><img src="{{url('web')}}/colour/index_20.jpg" width="42" height="42"><img src="{{url('web')}}/colour/index_22.jpg" width="42" height="42"></p>
</div>
<!--二维码  e-->
<div class="footer clearfix" style="margin-top:0; background:#f5f5f5; border-top:1px solid #e6e6e6;">
 <div class="footer_spacing clearfix" style="text-align:center;">
  
  <span class="copyright">copyright©南京一家一世界网络科技有限公司 版权所有 苏ICP备16043372号-1 
  &nbsp;增值电信业务经营许可证：<a href="https://tsm.miit.gov.cn/pages">苏B2-20170147</a></span>
  </div>
</div>
<script type="text/javascript">
	$(function(){
		var $btnGoTop=$("#btn_goTop");
		 $(window).scroll(function() {
		        if ($(window).scrollTop() > 100) {
		        	$btnGoTop.fadeIn(666);
		        } else {
		        	$btnGoTop.fadeOut(999);
		        }
		      });
		 $btnGoTop.click(function(){
			$('body,html').animate({
	            scrollTop: 0
	            },
	            666);
		});
		
	});
</script>




	<script type="text/javascript" src="{{url('web')}}/colour/common2.js.下载"></script>
	<script type="text/javascript">
		var searchParam={"orderFlag":"1","pageIndex":1,"pageSize":11,"searchName":"","start":1,"end":11}
		//翻页
		function goPage(pageIndex){
			var searchName = $("#searchName").val();
			$.postWithForm(location.href,$.extend(searchParam,{
				searchName:searchName,
				pageIndex:pageIndex==-1?searchParam.pageIndex-1:pageIndex==-2?pageIndex=searchParam.pageIndex+1:pageIndex
			}),true,false);
		}
		//搜索
		function searchResult(){
			var searchName = $("#searchName").val();
			$.postWithForm(location.href,$.extend(searchParam,{
				searchName:searchName,
				pageIndex:1
			}),true,false);
		}
		
		//按点击量
		function changeOrder(orderFlag){
			$.postWithForm(location.href,$.extend(searchParam,{
				orderFlag:orderFlag,
				pageIndex:1
			}),true,false);
		}
	</script>


</body></html>
