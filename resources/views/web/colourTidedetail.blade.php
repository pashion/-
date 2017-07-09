<!DOCTYPE html>
<!-- saved from url=(0063)http://www.yjysj.com.cn/colourTide/colourTideDetail?colourId=81 -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="shortcut icon" type="image/x-icon" href="http://www.yjysj.com.cn/images/favicon.ico">
<!--<base href="http://www.yjysj.com.cn:80/">--><base href=".">

<link href="{{url('web')}}/colour/common.css" type="text/css" rel="stylesheet">
<link href="{{url('web')}}/colour/style.css" type="text/css" rel="stylesheet">
<link href="{{url('web')}}/colour/z_css.css" type="text/css" rel="stylesheet">
<script src="{{url('web')}}/colour/jquery-1.9.1.min.js.下载" type="text/javascript"></script>
<script type="text/javascript" src="{{url('web')}}/colour/jquery.SuperSlide.2.1.1.js.下载"></script>
<script type="text/javascript" src="{{url('web')}}/colour/common2.js.下载"></script>
<script type="text/javascript" src="{{url('web')}}/colour/user.js.下载"></script>
<script type="text/javascript" src="{{url('web')}}/colour/prod.js.下载"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<title>请站住！冷色君</title>

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
	.white_content{
		position: fixed;
	}
</style>
<script type="text/javascript">
  $(function (){
	  setBoxCartCount();
    //两秒钟之后新增访问量
    	setTimeout('accessAdd($("#colourId").val(),"4")',5000);
    })
     
   //点赞
    function thumpUp(){
	  var id = $("#colourId").val();
	  var result = caseThumbup(id,"7");
	  if(result.reCode=="-2"){
			alert("已点赞，不能重复点赞");
		}else if(result.reCode=="1"){
			alert("点赞成功");
			$("#dzHead").html(parseInt($("#dzHead").html())+1);
		}else if(result.reCode=="0"){
			alert("点赞失败");
		}else{
			alert("数据库连接失败，请联系管理员");
		}
    }
  
  var tglImsgs=null,
  tglSrcs=[["images/zan.png","images/dz_on.png"],
           ["images/star.png","images/star_on.png"],];
   	
  
    //收藏
    function collectCase(){
    	var id = $("#colourId").val();
		 $("#colourId").css("color" ,"#88c523");
    	var msg = "";
    	var result = caseCollection(id,"6");
    	if(result.reCode=="-2"){
    		alert("请先登录！");
    		window.setTimeout(function(){
				location.href=basePath+"user/loginPage?html=/colourTide/colourTideDetail?colourId=81";
			},600);
		}else if(result.reCode=="1"){
			msg = "已收藏";
			alert("收藏成功");
		}else if(result.reCode=="0"){
			msg = "";
			alert("收藏失败");
		}else if(result.reCode=="2"){
			msg = "";
			alert("取消收藏成功");
		}else if(result.reCode=="3"){
			msg = "已收藏";
			alert("取消收藏失败");
		}else{
			msg = "";
			alert("数据库连接失败，请联系管理员");
		}
		toggleIconState(msg);
    }
    
    var type = "0";
    var pagecount=1;
	var pagesize=10;
	//加载更多
	function loadMore(){
	++pagecount;
	
	
</script>

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
	 $("#searchForm").find("select[name=type] > [value=4]").prop("selected",true);//如果搜索
})
</script>
<script type="text/javascript">
	//弹出隐藏层
	function ShowDiv(show_div,bg_div,userName,userId,replyFlag,replyMsgId,replyRemsgIdUser){
		
			alert("请先登录！");
			location.href=basePath+"user/loginPage?html=/colourTide/colourTideDetail?colourId=81";
		
		if(replyFlag==0){
			$("#box_replay").hide();
		}else if(replyFlag==1){//回复已评论
			$("#box_replay").show();
		}
		document.getElementById(show_div).style.display='block';
		document.getElementById(bg_div).style.display='block' ;
		$("#replyUserId").val(userId);
		$("#replyUserName").text(userName);
		$("#replyFlag").val(replyFlag);
		$("#replyMsgId").val(replyMsgId);
		$("#replyRemsgIdUser").val(replyRemsgIdUser);
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
	
	var msgCode="";
	//评论
	function appraise(){
		var changeCom=$("#replyContent").val();
		if(!changeCom||$.trim(changeCom).length<1) {
			alert("请输入评论内容！");
			return false;
		}
		if(changeCom.length>1000){
			//$("#replyContent").val(changeCom.substr(0,999));
			return alert("评论内容长度不能大于1000!");
		}
		var userId = $("#replyUserId").val();
		msgCode = $("#replyUserName").text();
		var flag = $("#replyFlag").val();
		var msgId=$("#replyMsgId").val();
		var reMsgId=$("#replyRemsgIdUser").val();
		
  		
	}
</script>
</head>

<body>

	






<script type="text/javascript" src="{{url('web')}}/colour/layer.js.下载"></script>


	
		
<div class="header" id="gotop">
     <div class="header_top">
       <div class="logo_style l_f">
            <a href="{{url('/')}}"><img src="{{url('web')}}/colour/logo.png"></a>
       </div>
       <div class="header_menu">
         <!--菜单导航栏-->
         <!--<a href="" class="">网站首页</a>-->
         <a href="{{url('/')}}">网站首页</a>
         <a href="{{url('scene')}}/create">设计精粹</a>
         <a href="{{url('scene')}}">场景方案</a>
         <a href="{{url('goods_list')}}">单品大库</a>
         <a href="{{url('colourTide')}}">找找感觉</a>
       </div>
       <div class="Search_style l_f">
        <form id="searchForm" action="{{url('colourTide')}}" method="get">
        	 <select name="type" size="1" style="padding:0; float:left;">
		      <option value="0" selected="selected">设计精粹</option>
		      <option value="1">场景方案</option>
		      <option value="2">单品大库</option>
		      <option value="3">奇货可享</option>
		      <option value="4">色彩潮流</option>
		      <option value="5">美居秀秀</option>
		      <option value="6">找找感觉</option>
		    </select>
	        <input name="search" type="text" class="add_Search" value="{{$search or ''}}">
	        <input name="" type="submit" class="submit_Search" value="">
        </form>
       </div>
       <div class="Cart_user r_f"> 
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




	<div class="main_header_wrap">
	    <div class="main_header">
	    	<input type="hidden" id="colourId" value="81" style="color: rgb(136, 197, 35);">
	    	<div class="main_header_box1" style="display: none;">
	            <p class="main_header_pic"><img src="#"></p>
	            <p>15256874567</p>
	        </div>
	        <div class="main_header_box2">
	            <p class="main_header_title">{{$list->title}}</p>
	            <p class="main_header_time">2017-07-06 09:38:05</p>
	            <p class="main_header_time" id="scHead" onclick="collectCase()" style="cursor: pointer;">
	            	<i class="iconfont " style="background: none;"><img src="{{url('web')}}/colour/icon_sc2.png" style=" vertical-align: middle;margin-top: -6px;width: 22px;">
	            	</i>{{$list->description}}
	            </p>
	        </div>
	        <div class="main_header_box3">
	            <span>
	            	<p>15</p>
	                <p class="n_tt">浏览数</p>
	            </span>
	            <span style="border-left:1px solid #eee;border-right:1px solid #eee;">
	            	<p id="dzHead">0</p>
	                <p class="n_tt" onclick="thumpUp()" style="cursor: pointer;"><i class="iconfont " style="background: none;"><img src="{{url('web')}}/colour/icon_dz.png" style=" vertical-align: middle;margin-top: -6px;width: 25px;"></i>点赞</p>
	                    <!--    <a href="javascript:thumpUp();" class="like" style="font-size: 13px;"><i class="iconfont " style="background: none;"><img src="images/icon_dz.png" style=" vertical-align: middle;margin-top: -6px;  "></i>点赞</a>
	          -->
	            </span>
	            <span>
	            	<p id="countHead">0</p>
	                <p class="n_tt">评论</p>
	            </span>
	        </div>
	        <div class="main_header_box4">
	           <img src="{{url('web')}}/colour/148756908772836.png">
	        </div>
	    </div>
	</div>
	<div class="main_box">
		<div class="main_box_left">
	        <div class="main_box_left1">
	          
	          {!!$list->content!!}
	          <p></p><p><br></p><p style="text-align: center;">
	        </div>
	      <div class="main_box_left2">
	        	<div class="main_box_left2_title">

	            	用户评论（<span id="countBody">0</span>）
	            	<span href="#" class="fr z_pl_btn" onclick="" style="cursor: pointer;">评论</span>
	            </div>
	            <div class="msgDiv">
	              
	           </div>
	           
		        <a href="javascript:void(0);" style="" onclick="loadMore()" class="readyMore">
			        
			        	
			        		没有更多了...
			        	
			        	
			        
		        </a>
	        </div>
	    </div>
	       <div class="main_box_right" style="">
		   	  <div class="main_box_righttitle">
		        	最新发布
		        </div>
		      <div class="main_box_rightlist">
		      		

		      			@foreach($newList as $k=>$v)
			      			<div class="z_mainbox2">
				                <a href="{{url('colourTide')}}/detail?colourId={{$v->id}}" class="z_mainbox2pic">
			                	<img src="/{{$v->coverpath}}/{{$v->cover}}">
				                </a>
				                <a href="javascript:" onclick="window.open(basePath+&quot;colourTide/colourTideDetail?colourId=63&quot;);" class="z_mainbox2title">{{$v->title}}</a>
				                <span class="z_mainbox2text">
				                {{$v->description}}
								</span>
				            </div>
		      			@endforeach
		      </div>
		   </div>
		<div class="clear"></div>
	</div>
	<!--主体  e-->
	
	




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
        <p><img src="#" width="120" height="120"></p>
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



	
	<!--弹出层时背景层DIV-->
	
	<div id="fade" class="black_overlay">
	</div>
	<div id="MyDiv" class="white_content">
		
	</div>
	
<script type="text/javascript">
	function closeDlgApp(){//关闭回复窗口
		CloseDiv('MyDiv','fade');
		$("#MyDiv").find("form")[0].reset();
	}
</script>

</body></html>
