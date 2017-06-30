<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="{{url('web/bootstrap')}}/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="{{url('web/bootstrap')}}/js/bootstrap.js"></script>
    <link href="{{url('web/bootstrap')}}/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!-- <script src="{{url('web/build')}}/js/jquery-1.9.1.min.js" type="text/javascript"></script> -->

      <script type="text/javascript" src="{{url('web/build')}}/js/jquery.SuperSlide.2.1.1.js"></script>
      <script type="text/javascript" src="{{url('web/build')}}/js/layer/layer.js"></script>
      <script type="text/javascript" src="{{url('web/build')}}/js/common.js"></script>
      <script type="text/javascript" src="{{url('web/build')}}/js/jquery.imagezoom.min.js"></script>
      <script src="{{url('web/build')}}/js/accordion.js" type="text/javascript"></script>


    <link  href="{{url('web/build')}}/css/common.css" type="text/css" rel="stylesheet" />
    <link href="{{url('web/build')}}/css/style.css" type="text/css" rel="stylesheet" />
    <link href="{{url('web/build')}}/css/z_css.css" type="text/css" rel="stylesheet" />
    <title>@yield('title')</title>

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

</head>

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
<!--产品详细介绍-->
<div class="content_style clearfix">
  <div class="page_Style">
    <div class="ptc_detailed clearfix">
      <div class="left_pic_ad">
        <div class="pro_detail_img float-lt">
          <div class="gallery">
            <div class="tb-booth tb-pic tb-s310"> <a href="images/product/01.jpg"><img src="images/product/01_mid.jpg"  alt="展品细节展示放大镜特效" rel="images/product/01.jpg" class="jqzoom" /></a> </div>
            <ul class="tb-thumb" id="thumblist">
              <li class="tb-selected">
                <div class="tb-pic tb-s40"><a href="#"><img src="images/product/01_small.jpg" mid="images/product/01_mid.jpg" big="images/product/01.jpg"></a></div>
              </li>
              <li>
                <div class="tb-pic tb-s40"><a href="#"><img  src="images/product/02_small.jpg"  mid="images/product/02_mid.jpg" big="images/product/02.jpg"></a></div>
              </li>
              <li>
                <div class="tb-pic tb-s40"><a href="#"><img src="images/product/03_small.jpg"  mid="images/product/03_mid.jpg" big="images/product/03.jpg"></a></div>
              </li>
              <li>
                <div class="tb-pic tb-s40"><a href="#"><img src="images/product/03_small.jpg"  mid="images/product/03_mid.jpg" big="images/product/03.jpg"></a></div>
              </li>
              <li style="margin-right:0px;">
                <div class="tb-pic tb-s40"><a href="#"><img src="images/product/04_small.jpg"  mid="images/product/04_mid.jpg" big="images/product/04.jpg"></a></div>
              </li>
            </ul>
          </div>
          <script type="text/javascript">
              function ShowDiv(name,id){
                  layer.confirm('你确定收藏该商品吗？', {
                      btn: ['确认','取消'] //按钮
                  }, function(){
                      layer.msg('收藏成功！', {icon: 1});
                      $("#h1").html("<i class='icon_Collection icon'></i>已收藏");
                  });
              }
          </script>

        </div>
        <div class="Collection"><a id="h1" class="addcart" onclick="ShowDiv('MyDiv2','fade2')" /><i class="icon_Collection"></i>加入收藏</a></div>
      </div>


      @yield('content')


      <div class="footer clearfix">
        <div class="footer_spacing clearfix">
          <span class="left_link l_f"><a href="#">首页</a>|<a href="#">设计精粹</a>|<a href="#">场景方案</a>|<a href="#">单品大库</a>|<a href="#">奇货可享</a>|<a href="#">找找感觉</a></span>
          <span class="copyright r_f">copyright©南京一家一世界网络科技有限公司 版权所有   苏ICP备16043372号-1</span>
        </div>
      </div>
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
</body>
</html>

