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

    {{--导入导航条--}}
    @include('web.layout.nav')


<div class="content_style clearfix">
 <div class="Scenario_Type">

     @foreach($data as $k => $v)

       <div class="Typename">
        <div class="title_name">
         <span class="sort_name">{{$styleArr[$k]}}</span>
         <span class="sort_Introduction"></span>
        </div>
        <div class="Scenario_Type_list">
        <a href="javascript:ovid()" class="next"><i class="icon iocn_next"></i></a>
          <div class="bd">
           <ul>
               {{--遍历精品方案列表--}}
               @foreach($v as $vv)
                    <li><a href="{{$vv['id']}}"><img src="../designPic/{{$vv['pic']}}"  height="400" width="280px"/></a></li>
                    <li><a href="{{$vv['id']}}"><img src="../designPic/{{$vv['pic']}}"  height="400" width="280px"/></a></li>
                    <li><a href="{{$vv['id']}}"><img src="../designPic/{{$vv['pic']}}"  height="400" width="280px"/></a></li>
                    <li><a href="{{$vv['id']}}"><img src="../designPic/{{$vv['pic']}}"  height="400" width="280px"/></a></li>
               @endforeach

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