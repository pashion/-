@extends('web.layout.master')

@section('title','订单页面')

@section('content')
   <style>
	.clear{
		clear:both;
	}
   </style>
   <body style="text-align:center;">
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
    <div class="content_style clearfix" >
            <?php 
   
            $userId = session('user')['0']->id;
            // dump($userId);
            $orderAddress=DB::table('users_address')
                    ->where('user_id','=',$userId)
                    ->get();
           $orderlist = session('orderlist');
           dump($orderlist);
           $allnum = 0;
           $tatal = 0;
             ?>
              <div class="checkout_sub clearfix">
                    <div id="js-goods-container">
                        <div class="title-bar">
                            <h2>商品清单</h2><br>
                        </div>
                        <table class="goods-list" align="center" border="1">
                            <thead>
                                <tr>
                                    <th width="100">商品图片</th>
                                    <th width="*" style="text-indent: 80px; text-align: left">商品名称</th>
                                    <th width="90">单价</th>
                                    <th width="120">数量</th>
                                    <th width="110">小计</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                               
                           		@foreach($orderlist as $v)
                           		<tr>
                           		<?php
                                    $str = $v['pic'];
                                    $array = explode(',', $str);
                                    $price = (int) $v['price'];
                                    // var_dump($price);
                                    $num = (int) $v['num'];
                                    // $tatal = $price * $num;
                                    $allnum += $num;
                                    $tatal += $price * $num;
                                ?>
                           		<td><img src="{{url('goodsPic')}}/{{$array['0']}}" style="height: 100px;float: left;margin-left: 20px;margin-top: 30px;" /></td>
                           		<td>{{$v['goods']}}</td>
                           		<td>{{$v['price']}}</td>
                           		<td>{{$v['num']}}</td>
                           		<td>{{$price * $num}}</td>
                           		</tr>
                           		@endforeach()
                                
           
                        </table>
                    </div><br>
                    <div class="cart-count" id="js-order-total" style="padding-left:280px;">
                        <table align="left">
                            <tbody>
                                <tr>
                                    <th>商品件数：</th>
                                    <td id="countsnub"><strong>{{$allnum}} </strong>件</td>
                                </tr>
                                <tr>
                                    <th>商品总金额(不含运费)：</th>
                                    <td id="countprices"><strong>{{$tatal}} ￥</strong></td>
                                </tr>
                 
                                <tr>
                                    <th>运费：</th>
                                    <td id="yfprice">￥0.00</td>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <div class="freight-tip" style="">
                                            <p>您可以享受免运费服务</p>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <div class="total-price">
                                            应付金额：<strong class="price" id="zgprice"><strong>{{$tatal}} ￥</strong>
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
              <div class="clear"></div> 
             <form action="{{url('order/joy')}}" method="post" align="left">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="user_id" value="{{$userId}}">
                <input type="hidden" name="tatal" value="{{$tatal}}">
                <input type="hidden" name="address_id" value="{{$orderAddress['0']->id}}">
                 <div class="form-group">
                    <label for="exampleInputEmail1" >收货人
                    :</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="get_name" value="{{$orderAddress['0']->get_name}}" align="center"><a href="">修改</a>
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

