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

{{--导入导航条--}}
@include('web.layout.nav')

<!--场景方案-->
<div class="content_style clearfix">
  <div class="Program_style">
    <div class="Scene_sort clearfix" id="Scene_sort">
     <ul class="sort_list">
      <li class="sort_style">
       <div class="sort_img"><span class="sort_yuan_bg"></span><img src="{{url('web')}}/images/product/p-4.jpg"  width="80px" height="80"/></div>
       <div class="sort_name">
        <h2>区域分类</h2>
        <h4>多种场景方案供你选择</h4>
       </div>

       <div class="sub">
        <div id="dropBox" class="">
          <ul class="sideMenu_list">

              {{--遍历方案图片--}}
              @foreach($areaData as $v)
                  <li class="Menu_Bar"><a href="scene?styleId={{$v['id']}}" class="one_menu">{{$v['name']}}</a></li>
              @endforeach

            </li>
          </ul>
        </div>


       </div>
      </li>
       <li class="sort_style">
       <div class="sort_img"><span class="sort_yuan_bg"></span><img src="{{url('web')}}/images/product/p-4.jpg"  width="80px" height="80"/></div>
       <div class="sort_name">
        <h2>风格分类</h2>
        <h4>看不同风格  装喜爱之家</h4>
           <div class="sub">
               <div id="dropBox" class="">
                   <ul class="sideMenu_list">


                       {{--遍历类似风格方案--}}
                       @foreach($styleData as $v)
                           <li class="Menu_Bar"><a href="scene?areaId={{$v['id']}}" class="one_menu">{{$v['name']}}</a></li>
                       @endforeach



                   </ul>
               </div>
       </div>
      </li>
       <li class="sort_style">
       <div class="sort_img"><span class="sort_yuan_bg"></span><img src="{{url('web')}}/images/product/p-4.jpg"  width="80px" height="80"/></div>
       <div class="sort_name">
        <h2>色彩分类</h2>
        <h4>多种色咖 专治审美疲劳</h4>
       </div>
      </li>
       <li class="sort_style">
       <div class="sort_img"><span class="sort_yuan_bg"></span><img src="{{url('web')}}/images/product/p-4.jpg"  width="80px" height="80"/></div>
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

      @foreach($dData as $v)

          <div class="clearfix">
             <div class="Program_single_style">
              <a href="scene/{{$v['id']}}" class="Program_single_img">
              <p><img src="designPic/{{$v['pic']}}"  width="280px" height="400"/></p>
              <h3>{{$v['dtitle']}}</h3>
              </a>
             <div class="Program_operating">
            <span class="Evaluation"><a href="javascript://"><em class="iconfont icon_Evaluation">赞</em>{{$v['laud_num']}}</a></span>
            <span class="Collection"><a href="javascript://"><em class="iconfont icon_Collection">评</em>{{$v['comment_num']}}</a></span>
            <span class="share"><a href="#"><em class="iconfont icon_share"></em></a></span></p>
             </div>
          </div>

      @endforeach

  </div>
      {{--分页--}}
          {{$dData->links()}}

  </div>
</div>
@endsection

    @section('footJs')
        <script src="{{url('js')}}/design/designList.js"></script>
    @endsection