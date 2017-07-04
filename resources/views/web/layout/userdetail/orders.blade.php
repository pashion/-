
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" src="{{url('web/bootstrap')}}/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="{{url('web/bootstrap')}}/js/bootstrap.js"></script>
	<link href="{{url('web/bootstrap')}}/css/bootstrap.min.css" type="text/css" rel="stylesheet" /> 
	<!-- <script src="{{url('web/build')}}/js/jquery-1.9.1.min.js" type="text/javascript"></script> -->

	  <script type="text/javascript" src="{{url('web/build')}}/js/jquery.SuperSlide.2.1.1.js"></script> 
	  <script type="text/javascript" src="{{url('web/build')}}/js/layer/layer.js"></script> 

	  <script type="text/javascript" src="{{url('web/build')}}/js/jquery.imagezoom.min.js"></script>
	  <script src="{{url('web/build')}}/js/accordion.js" type="text/javascript"></script>
	 

	<link  href="{{url('web/build')}}/css/common.css" type="text/css" rel="stylesheet" />
	<link href="{{url('web/build')}}/css/style.css" type="text/css" rel="stylesheet" />
	<link href="{{url('web/build')}}/css/z_css.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<DIV class="right_detailed r_f">
                    <div class="slideTxtBox">
                        <div class="hd">
                            <ul><li><em class="jt"></em>新订单</li><li><em class="jt"></em>已发货</li><li><em class="jt"></em>已收货</li></ul>
                        </div>
                        <div class="bd">


                            <ul id="content" class="Introduction">



                            </ul>


                            <ul class="Evaluation">
                            </ul>


                            <ul class="comment_style">
                              
                            </ul>
                        </div>
                    </div>

</body>
</html>
<script src="{{url('js')}}/goods/goodsDetail.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $(".jqzoom").imagezoom();
                $("#thumblist li a").mousemove(function(){
                    $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
                    $(".jqzoom").attr('src',$(this).find("img").attr("mid"));
                    $(".jqzoom").attr('rel',$(this).find("img").attr("big"));
                });

            });
            jQuery(".picScroll-top").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,vis:3,trigger:"click"});
            jQuery(".slideTxtBox").slide({trigger:"click"});
        </script>
