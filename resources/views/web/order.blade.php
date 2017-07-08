@extends('web.layout.master')

@section('title','订单页面')

@section('content')
   
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
    <div class="content_style clearfix">
            <?php 
            // var_dump($data);
           
            $userId = $data['user_id'];

            $orderAddress=DB::table('users_address')
                    ->where('user_id','=',$userId)
                    ->get();
           
             ?>
             <form action="{{url('order/work')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="user_id" value="{{$data['user_id']}}">
                <input type="hidden" name="goods_id" value="{{$data['gid']}}">
                <input type="hidden" name="num" value="{{$data['num']}}">
                <input type="hidden" name="num_bunch" value="{{$data['num_bunch']}}">
                <input type="hidden" name="address_id" value="{{$orderAddress['0']->id}}">
                 <div class="form-group">
                    <label for="exampleInputEmail1">收货人
                    :</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="get_name" value="{{$orderAddress['0']->get_name}}"><a href="">修改</a>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">地址
                    :</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="address" value="{{$orderAddress['0']->province}}/{{$orderAddress['0']->city}}/{{$orderAddress['0']->county}}/{{$orderAddress['0']->detaile_address}}"><a href="">修改</a>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">收货人电话
                    :</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="phone" value="{{$orderAddress['0']->phone}}"><a href="">修改</a>
                  </div>
                 
                  <button type="submit" class="btn btn-default">提交</button>
                  

                </div>

@endsection
