<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="{{url('web/build')}}/css/safe/css.css" />
    <link rel="stylesheet" href="{{url('web/build')}}/css/safe/common.min.css" />
    <link rel="stylesheet" href="{{url('web/build')}}/css/safe/ms-style.min.css" />
    <link rel="stylesheet" href="{{url('web/build')}}/css/safe/personal_member.min.css" />
    <link rel="stylesheet" href="{{url('web/build')}}/css/safe/Snaddress.min.css" />
    <link rel="stylesheet" href="{{url('web/build')}}/css/sui.css" />
    <script type="text/javascript" src="{{url('web/build')}}/js/sui.js" ></script>
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
    <style>
        body {
            background: #f5f5f5;
        }
        .sui-table th{
            padding: 16px 8px;
            line-height: 18px;
            text-align: center;
            vertical-align: middle;
            border-top: 1px solid #e6e6e6;
            font-weight: normal;
            font-size: 14px;
            color: #333333;
        }
        .sui-table td {
            padding: 16px 8px;
            line-height: 18px;
            text-align: center;
            vertical-align: middle;
            border-top: 1px solid #e6e6e6;
            font-weight: normal;
            font-size: 12px;
            color: #333333;
        }
        img {
            max-width: 100%;
            height: auto;
            /*vertical-align: bottom;*/
            border: 0;
            -ms-interpolation-mode: bicubic;
            margin-left: -10px;
        }
        a{
            color: #000000;
        }
        .nav-manage .list-nav-manage {
            position: absolute;
            padding: 15px 4px 10px 15px;
            left: 0;
            top: -15px;
            width: 90px;
            background: #FFF;
            box-shadow: 1px 1px 2px #e3e3e3, -1px 1px 2px #e3e3e3;
            z-index: 10;
        }
					
        .ms-nav li {
            float: left;
            position: relative;
            padding: 0 20px;
            height: 44px;
            font: 14px/26px "Microsoft YaHei";
            color: #FFF;
            cursor: pointer;
            z-index: 10;
        }
        .personal-member .main-wrap {
            width: 1068px;
            margin: 15px 0 30px 180px;
            padding: 0 0 39px 0;
            border: 1px solid #ddd;
            background: none;
        }
    </style>
</head>

<body class="ms-body">


<div class="Background_color">
    <div class="header">
        <div class="header_top">
            <div class="top_info clearfix">
                <div class="logo_style l_f"><a href="#"><img src="{{url('zhuazi')}}/images/logo.jpg" /></a></div>
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
                    </div>
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
                        欢迎您<div class="btn-group">
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
<div class="side-neck" style="margin-top: 20px;">
    <i></i>
</div>
<div class="ms-side" style="margin-top: 20px;" >
    <article class="side-menu side-menu-off">
        <dl class="side-menu-tree" style="padding-left: 30px;">
            <dt><img src="{{url('web')}}/images/左侧/我的购物车.png"  style="margin-right: 10px;margin-left: -20px;"/>我的购物车</dt>
            <dt><img src="{{url('web')}}/images/左侧/file.png"  style="margin-right: 10px;margin-left: -20px;"/>订单管理</dt>
            <dd>
                <a href="{{url('web/order')}}">我的订单</a>

            </dd>
            <dd>
                <a href="宝贝收藏.html">我的收藏</a>

            </dd>
            <dd>
                <a href="我的评价.html">我的评价</a>

            </dd>
            <dd>
                <a href="我的足迹.html">我的足迹</a>

            </dd>
            <dd>
                <a href="我的拍卖.html">我的拍卖</a>

            </dd>
            <dd>
                <a>我的优惠券</a>

            </dd>
            <dt><img src="{{url('web')}}/images/左侧/我的买啦.png"  style="margin-right: 10px;margin-left: -20px;"/>个人中心</dt>
            <dd>
                <a href="{{url('user/detail/data')}}">我的资料</a>

            </dd>
            <dd>
                <a href="{{url('user/detail/address')}}">地址管理</a>

            </dd>
            <dd>
                <a href="{{url('user/detail/changepass')}}">修改密码</a>

            </dd>
            <dt><img src="{{url('web')}}/images/左侧/v-card-3.png"  style="margin-right: 10px;margin-left: -20px;"/>售后服务</dt>
            <dd>
                <a href="退换货.html">退换货</a>

            </dd>
            <dd>
                <a href="意见投诉.html" style="color:#f70">意见/投诉</a>

            </dd>
        </dl>

        <a ison="on" class="switch-side-menu icon-up-side"><i></i></a>
    </article>
</div>
@yield('content')

</body>

</html>
