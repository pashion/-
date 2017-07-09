@extends('web.layout.master')

@section('title','单品大全')

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
   "margin-left":($(".page_Style").width() - $('.pagination').outerWidth())/2, 
   });
	$(window).resize(function(){ 
  $('.pagination').css({ 
   "margin-left":($(".page_Style").width() - $('.pagination').outerWidth())/2, 
   }); 
}); 
});

</script>
<body>
<div class="Background_color">
<div class="header">
 <div class="header_top">
   <div class="top_info clearfix">
   <div class="logo_style l_f"><a href=""><img src="/web/images/logo.jpg" /></a></div>
   <div class="Search_style l_f">
   <form action="{{url('goods_list')}}" method="get">
   <div class="select">
    <select name="" size="1">
      <option value="1">设计精髓</option>
      <option value="2">设计店家</option>
    </select>
    </div>
    <input name="search" type="text" value="" class="add_Search"/>
    <input name="" type="submit"  value="" class="submit_Search"/>
  </form>
   </div>
   <div class="Cart_user r_f">
   <div class="Cart_Quantity "><span class="number">0</span></div>
   <div class="header_operating l_f">
   </div>
   </div>
 </div>
 <div class="header_menu">
 <!--菜单导航栏-->
  <ul class="menu" id="nav">
    <li class="nLi Down"><a href="">网站首页</a><em class="icon_jiantou"></em></li>
    <li class="nLi Down"><a href="{{url('scene')}}/create">设计精粹</a><em class="icon_jiantou"></em></li>
    <li class="nLi Down"><a href="{{url('scene')}}">场景方案</a><em class="icon_jiantou"></em></li>
    <li class="nLi Down"><a href="{{url('goods_list')}}">单品大库</a><em class="icon_jiantou"></em></li>
    <li class="nLi Down"><a href="{{url('colourTide')}}">找找感觉</a><em class="icon_jiantou"></em></li>
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
<!--产品列表-->

<div class="content_style clearfix">
 <div class="page_Style">
 
  <!--条件筛选-->
  <div class="filter_style clearf]kix">
   <ul>
    <!-- 测试 -->
    @foreach($data as $k=>$v)
      <li>
        <label class="filter_name">{{$v['name']}}</label>
        <div class="filter_link">
          @foreach($v['child'] as $k1=>$v1)
              <!-- 如果判断id相等则下层添加内容 -->
              <a href="javascript:void(0)" level="2" myself="{{$v1['id']}}" tid="{{$v1['tid']}}" sid="{{$v1['id']}}">{{$v1['name']}}</a>
          @endforeach
            <div class="next" name='next'>
            </div>
        </div>
      </li>
    @endforeach
   </ul>
  </div>
  <!--产品列表-->
   <div class="prodcuts_list clearfix" >
     <ul class="prodcuts_style clearfix" id="prodList">
        <!-- 分类首页遍历测试 -->
        @foreach($goods as $v)
        <li class="product">
          <div class="pic_img textalign">
            <a href="{{url('/goodsShow')}}/{{$v->id}}"><img src="{{url('goodsPic')}}/{{$v->pic}}"></a>
            <div class="operating"><a href="#" class="pic_cart">加入购物车</a><a href="#" class="Collection">收藏</a></div>
          </div>
          <p class="pic_nme"><a href="#">{{$v->goods}}</a></p>
       <p class="pic_price">￥{{$v->price}}</p>
        </li>
        @endforeach  
     </ul>

     <div class="pic_page_style clearfix">
      <ul class="page_example pagination" id="pagination">
       
       {!! $goods->appends(['search'=>$search])->links() !!}
       
      </ul>
      </div>
   </div>
 </div>
</div>
</div>
@endsection
