@extends('web/layout/master')

@section('title','首页')

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
                <div class="logo_style l_f"><a href="#"><img src="{{url('web')}}/images/logo.jpg" /></a></div>
                <div class="Search_style l_f">
                    <form>
                        <div class="select">
                            <select name="" size="1">
                                <option value="1">设计精粹</option>
                                <option value="2">场景方案</option>
                                <option value="1">单品大库</option>
                                <option value="2">找找感觉</option>
                            </select>
                        </div>
                        <input name="" type="text"  class="add_Search"/>
                        <input name="" type="submit"  value="" class="submit_Search"/>
                    </form>
                </div>
                <div class="Cart_user r_f">
                    <div class="header_operating l_f" >
                        @if ( !session('user') )
                            <span class="header_touxiang"><img src="{{url('web')}}/images/touxiang_03.png" /></span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    网站导航 <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">购物车</a></li>
                                    <li><a href="{{url('home/index')}}">注册</a></li>
                                    <li><a href="{{url('home/login')}}">登录</a></li>
                                </ul>
                            </div>
                        @else
                            <span class="header_touxiang"><img src="{{url('web')}}/images/touxiang_03.png" /></span>
                            欢迎您，<div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{session('user')[0]->username}} <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">购物车</a></li>
                                    <li><a href="{{url('/user/detail/order')}}">个人中心</a></li>
                                    <li><a href="{{url('home/logout')}}">退出</a></li>
                                </ul>
                            </div>
                        @endif
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
                
            </div>
        </div>
    </div>
    <!--banner轮播  s-->
    <div class="fullSlide">
        <div class="bd">
            <ul style="position: relative; width: 1583px; height: 460px;">
                <li style="position: absolute; width: 1583px; left: 0px; top: 0px; display: none; background: url({{url('web')}}/images/banner01.jpg) 50% 0px no-repeat;"><a target="_blank" href="#"></a></li>
                <li style="position: absolute; width: 1583px; left: 0px; top: 0px; display: list-item; background: url({{url('web')}}/images/banner02.jpg) 50% 0px no-repeat;"><a target="_blank" href="#"></a></li>
                <li style="position: absolute; width: 1583px; left: 0px; top: 0px; display: list-item; background: url({{url('web')}}/images/banner03.jpg) 50% 0px no-repeat;"><a target="_blank" href="#"></a></li>
                <li style="position: absolute; width: 1583px; left: 0px; top: 0px; display: none; background: url({{url('web')}}/images/banner01.jpg) 50% 0px no-repeat;"><a target="_blank" href="#"></a></li>
                <li style="position: absolute; width: 1583px; left: 0px; top: 0px; display: none; background: url(images/banner03.jpg) 50% 0px no-repeat;"><a target="_blank" href="#"></a></li>
            </ul>
        </div>
        <div class="hd">
            <ul>
                <li class="">1</li>
                <li class="on">2</li>
                <li class="">3</li>
                <li class="">4</li>
                <li class="">5</li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(".fullSlide").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, trigger:"click" });
    </script>
   



    <!--关于我们  s-->
    <div class="wrap_a bgcolor_f9">
        <div class="a_main">
            <div class="a_box_text">
                <p class="a_title"> 关于我们</p>
                <p class="a_text">这里是一个提倡分享与交流的社区，你可以这里：分享你喜欢的案例或者是自己参与设计的案例发帖和大家一起交流，发布自己的观点与设计态度，有机会获得更多的商业机会哦。互动的动态会及时更新到我们的官网微信社区与QQ群，并且一家一世界软装网会大力推广原创设计师的作品以及设计师，包括家居饰品的设计师哟；还可以认识很多与你志趣相投的新朋友，组织线下活动聚会。在这里你都可以找到归属。</p>
            </div>
            <div class="a_box2_pic">
                <img src="{{url('web')}}/images/a_img01.jpg" />
            </div>
        </div>
    </div>
    <!--关于我们  e-->

    <!--服务流程  s-->
    <div class="wrap_s">
        <div class="s_main">
            <div class="s_title">
                服务和流程
            </div>
            <div class="s_box1">
                <ul>
                    <li>
                        <p><img src="{{url('web')}}/images/icon_s01.jpg" /></p>
                        <p class="s_tip">知识</p>
                        <p class="s_tip_text">软装饰细节，无论是从视觉到触觉，从感官到心里都彻底温暖起来。</p>
                    </li>
                    <li>
                        <p><img src="{{url('web')}}/images/icon_s02.jpg" /></p>
                        <p class="s_tip"c>实现</p>
                        <p class="s_tip_text">软装饰细节，无论是从视觉到触觉，从感官到心里都彻底温暖起来。</p>
                    </li>
                    <li>
                        <p><img src="{{url('web')}}/images/icon_s03.jpg" /></p>
                        <p class="s_tip">优势</p>
                        <p class="s_tip_text">软装饰细节，无论是从视觉到触觉，从感官到心里都彻底温暖起来。</p>
                    </li>
                    <li>
                        <p><img src="{{url('web')}}/images/icon_s04.jpg" /></p>
                        <p class="s_tip">服务</p>
                        <p class="s_tip_text">软装饰细节，无论是从视觉到触觉，从感官到心里都彻底温暖起来。</p>
                    </li>
                </ul>
            </div>
            <div class="s_box2">
                <div class="s_box2_list">
                    <p><img src="{{url('web')}}/images/icon_s05.jpg" /></p>
                    <p>浏览场景</p>
                </div>
                <div class="s_box2_jt">
                    <img src="{{url('web')}}/images/s_jt.jpg" />
                </div>
                <div class="s_box2_list">
                    <p><img src="{{url('web')}}/images/icon_s06.jpg" /></p>
                    <p>挑选方案</p>
                </div>
                <div class="s_box2_jt">
                    <img src="{{url('web')}}/images/s_jt.jpg" />
                </div>
                <div class="s_box2_list">
                    <p><img src="{{url('web')}}/images/icon_s07.jpg" /></p>
                    <p>选择套餐</p>
                </div>
                <div class="s_box2_jt">
                    <img src="{{url('web')}}/images/s_jt.jpg" />
                </div>
                <div class="s_box2_list">
                    <p><img src="{{url('web')}}/images/icon_s08.jpg" /></p>
                    <p>下单购买</p>
                </div>
                <div class="s_box2_jt">
                    <img src="{{url('web')}}/images/s_jt.jpg" />
                </div>
                <div class="s_box2_list">
                    <p><img src="{{url('web')}}/images/icon_s09.jpg" /></p>
                    <p>物流配送</p>
                </div>
                <div class="s_box2_jt">
                    <img src="{{url('web')}}/images/s_jt.jpg" />
                </div>
                <div class="s_box2_list">
                    <p><img src="{{url('web')}}/images/icon_s010.jpg" /></p>
                    <p>售后服务</p>
                </div>
            </div>
        </div>
    </div>
    <!--服务流程  e-->

    <!--二维码  s-->
    <div class="ewm bgcolor_f9">
        <span>
            <p><img src="{{url('web')}}/images/ewm.jpg" /></p>
            <p>手机端访问</p>
        </span>
        <span>
            <p><img src="{{url('web')}}/images/ewm.jpg" /></p>
            <p>手机端访问</p>
        </span>
        <span>
            <p><img src="{{url('web')}}/images/ewm.jpg" /></p>
            <p>手机端访问</p>
        </span>
    </div>
    <!--二维码  e-->
@endsection


