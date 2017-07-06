@extends('web.layout.master')

@section('title','案例详细')
@section('head')

    <link href="{{url('web')}}/css/designDetail.css" type="text/css" rel="stylesheet" />

@endsection

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

{{--导入导航条--}}
@include('web.layout.nav')

<div class="content_style clearfix">

 <!--案例详细-->
<div class="page_Style">
 <div class="left_style">
   <div class="Designers clearfix">
   <div class="Avatar_style">
     <div class="Avatar">  
     </div>
    <img src="{{url('web')}}/images/touxiang.jpg"  width="110" height="110" class="user_img"/>
   </div>
   <div class="name_star">
   <p class="name">杰克逊</p>
   <p class="Star_rating"><img src="{{url('web')}}/images/peifen_03.png" /> <img src="{{url('web')}}/images/peifen_03.png" /> <img src="{{url('web')}}/images/peifen_03.png" /></p>
   </div>
   <div class="Views">浏览次数：3435454</div>
   <a href="#" class="Office_link">设计师所在事务所</a>
   </div>
 </div>

 <div class="right_style">
  <div class="AD_img">
  <img src="{{url('web')}}/images/anli_03.jpg" />
  </div>
  <div class="Design_display" >
  <div class="Design_Into clearfix">
    <div class="title_name">{{$caseData[0]->dtitle}}</div>
    <div class="operating">
    <a href="#" class=""><em class="icon_Point_praise"></em>12345</a> 
    <a href="#" class=""><em class="icon_Collection"></em>收藏</a> 
    <a href="#" class=""><em class="icon_share"></em>分享</a>
    </div>
  </div>
    <div class="Picture_list">
    <div class="Show_style">
	 <div id="play">
	  <ul class="img_ul">

          {{--遍历方案图片--}}
          @foreach($picArr as $v)
              <li><a class="img_a"><img src="designPic/{{$v['picname']}}" style="height: 500px;"></a></li>
          @endforeach

	  </ul>
	    <a href="javascript:void(0)" class="prev_a change_a" title="上一张"><span style="display: none;"></span></a>
	    <a href="javascript:void(0)" class="next_a change_a" title="下一张"><span style="display: none;"></span></a>
    </div>
    <div class="Number_img">此案例共有图片张</div>
    <div  class="Rotation_img">
      <div class="img_hd">
	 <ul class="clearfix">
         @foreach($picArr as $v)
             <li class=""><a class="img_a"><img src="{{url('designPic')}}/{{$v['picname']}}" onload="imgs_load(this)"></a></li>
         @endforeach
	 </ul>
     </div>
	   <a class="bottom_a prev_a" style="opacity: 0.7;"><em class="arrow_prev"></em></a>
	   <a class="bottom_a next_a" style="opacity: 0.7;"><em class="arrow_next"></em></a>
     </div>  
	</div>
    <!--案例介绍-->
    <div class="Case_Into">
     <div class="title_name">案例介绍</div>
     <div class="Case_content">
       <p>
           {{$caseData[0]->text}}

       </p>
     </div>
    </div>

    <!--猜你喜欢-->
    <div class="recommend_style clearfix">
      <div class="title_name">猜你喜欢</div>
      <div class="recommend_list">
       <div class="hd">
         <a href="javascript:ovid()" class="prev"><em class="arrow_prev"></em></a>
         <a href="javascript:ovid()" class="next"><em class="arrow_next"></em></a>
       </div>
       <div class="bd">
        <ul >

            @foreach($caseDataStyle as $v)
                <li class="recommend_img"><a href="{{$v['id']}}"><img src="{{url('designPic')}}/{{$v['pic']}}"  width="150" height="105"/></a></li>
            @endforeach

        </ul>
       </div>     
      </div>
      <script type="text/javascript">
		jQuery(".recommend_list").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:5,interTime:50,trigger:"click"});
		</script>
     </div>
     <!--案例评论-->
     <div class="comment_style">
       <div id="commentNum" class="commentNum title_name">评论方案</div>
       <div class="comment_content">
        <div class="Post_comment clearfix">
         <div class="left_Avatar">
          <div class="Avatar_bg"></div>

          <img src="{{url('web')}}/images/tempuser1897df321023210412.png" width="60" height="60" />
         </div>
         <div class="right_text">
             <div id="username">用户名:</div>
          <input id="cmContent" name="" type="text"  class="add_text"/><input type="submit" id="sendCmBtn" value="发送评论"  class="submit_btn" />
         </div>
        </div>
       </div>

         <input  id="token" type="hidden" value="{{csrf_token()}}">
         <input  id="designID" type="hidden" value="{{$caseData[0]->id}}">

       <!--列表-->
       <div class="comment_list">
        <ul id="commentContent">


        </ul>
       <div id="loadMore" class="load" style=" text-align:center"><a href="javascript:\\" class="More">加载更多</a> </div>
       </div>
     </div>
    </div>
  </div>
 </div>
</div>
</div>
@endsection

@section('footJs')

    <script src="{{url('js')}}/design/designDetail.js"></script>2

<script type="text/javascript">

var i=0; //图片标识
var img_num=$(".img_ul").children("li").length; //图片个数
$(".img_ul li").hide(); //初始化图片	
play();
$(function(){
	$(".img_hd ul").css("width",($(".img_hd ul li").outerWidth(true))*img_num); //设置ul的长度

	$(".bottom_a").css("opacity",0.7);	//初始化底部a透明度
	//$("#play").css("height",$("#play .img_ul").height());
	if (!window.XMLHttpRequest) {//对ie6设置a的位置
		$(".change_a").css("height",$(".change_a").parent().height());
	}
	
	$(".change_a").focus(function(){
		this.blur();
	});
	$(".bottom_a").hover(function(){//底部a经过事件
		$(this).css("opacity",1);	
	},function(){
		$(this).css("opacity",0.7);	 
	});

	$(".change_a").hover(function(){//箭头显示事件
		$(this).children("span").show();
	},function(){
		$(this).children("span").hide();
	});
	
	$(".img_hd ul li").click(function(){
		i=$(this).index();
		play();
	});

	$(".prev_a").click(function(){
		//i+=img_num;
		i--;
		//i=i%img_num;
		i=(i<0?0:i);
		play();
	}); 
	$(".next_a").click(function(){
		i++;
		//i=i%img_num;
		i=(i>(img_num-1)?(img_num-1):i);
		play();
	}); 
}); 

function play(){//动画移动	
	var img=new Image(); //图片预加载
	img.onload=function(){
		img_load(img,$(".img_ul").children("li").eq(i).find("img"))
	};
	img.src=$(".img_ul").children("li").eq(i).find("img").attr("src");
	//$(".img_ul").children("li").eq(i).find("img").(img_load($(".img_ul").children("li").eq(i).find("img")));
	$(".img_hd ul").children("li").eq(i).addClass("on").siblings().removeClass("on");
	if(img_num>5){//大于7个的时候进行移动
		if(i<img_num-3){ //前3个
			$(".img_hd ul").animate({"marginLeft":(-($(".img_hd ul li").outerWidth()+5)*(i-3<0?0:(i-3)))});
		}else if(i>=img_num-3){//后3个
			$(".img_hd ul").animate({"marginLeft":(-($(".img_hd ul li").outerWidth()+5)*(img_num-5))});
		}
	}
	if(!window.XMLHttpRequest){//对ie6设置a的位置
		$(".change_a").css("height",$(".change_a").parent().height());
	}
}

function img_load(img_id,now_imgid){//大图片加载设置 （img_id 新建的img,now_imgid当前图片）
	if(img_id.width/img_id.height>1){
		if(img_id.width >=$("#play").width())
		$(now_imgid).width($("#play").width());
	}else{
		if(img_id.height>=500) $(now_imgid).height(500);
	}
	$(".img_ul").children("li").eq(i).show().siblings("li").hide(); //大小确定后进行显示
}

function imgs_load(img_id){//小图片加载设置
	if(img_id.width >=$(".img_hd ul li").width()){img_id.width = 150};
	if(img_id.height>=$(".img_hd ul li").height()) {img_id.height=$(".img_hd ul li").height();}
}
</script>

@endsection