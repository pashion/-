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
    <title>我的订单</title>
<style>
    #menu{
        text-align: center;
    }
</style>
</head>
<body>
<div class="user_style  clearfix">
        <div class="margin_sx">
            <div class="left_mun">
                <div id="menu">
                    <dl>
                        <dt>我的交易</dt>
                        <dd><a href="{{url('/user/detail/orders')}}" class="hover" target="main">我的订单</a></dd>
                        <dd><a href="#" target="main">我的积分</a></dd>
                    </dl>
                    <dl>
                        <dt>VIP专区</dt>
                        <dd><a href="#" target="main">VIP活动专区</a></dd>
                    </dl>
                    <dl>
                        <dt>我的收藏</dt>
                        <dd><a href="#" target="main">设计师案例</a></dd>
                        <dd><a href="#" target="main">场景方案</a></dd>
                        <dd><a href="#" target="main">单品</a></dd>
                        <dd><a href="#" target="main">话题</a></dd>
                    </dl>
                    <dl>
                        <dt>我的足迹</dt>
                        <dd><a href="#" target="main">秀秀记录</a></dd>
                        <dd><a href="#" target="main">浏览记录</a></dd>
                        <dd><a href="#" target="main">评论记录</a></dd>
                        <dd><a href="#" target="main">点赞记录</a></dd>
                    </dl>
                    <dl>
                        <dt>我的邀请</dt>
                        <dd><a href="#" target="main">已邀请用户</a></dd>
                    </dl>
                    <dl>
                        <dt>设置</dt>
                        <dd><a href="{{url('user/detail/data')}}" target="main" >个人资料</a></dd>
                        <dd><a href="{{url('user/detail/address')}}" target="main" >地址管理</a></dd>
                        <dd><a href="{{url('user/detail/changepass')}}" target="main">修改密码</a></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>        
</body>
</html>
