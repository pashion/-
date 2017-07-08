@extends('web.layout.master')

@section('title','产品详细')


    @section('head')
        <link rel="stylesheet" href="{{url('web ')}}/css/goodsGetail.css">
    @endsection

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

    {{--导入导航条--}}
    @include('web.layout.nav')

    <input type="hidden" id="styleID" value="{{$goodData[0]->style}}">
    <input type="hidden" id="areaID" value="{{$goodData[0]->area}}">
    <!--产品详细介绍-->
    <form action="{{url('order/add')}}" method="post" id="from">

        <input id="isSel" type="hidden" name="isSel" value="">
        <input id="goodsId" type="hidden" name="gid" value="{{$goodData[0]->id}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="num_bunch" value="">
        <input type="hidden" name="user_id" value="{{session('user')['0']->id}}">


    
    
    <div class="content_style clearfix">
        <div class="page_Style">
            <div class="ptc_detailed clearfix">
                <div class="left_pic_ad">
                    <div class="pro_detail_img float-lt">
                        <div class="gallery">
                            <div class="tb-booth tb-pic tb-s310"> <a ><img id="origin" src="{{url('goodsPic')}}/{{$picArr[0]}}"  alt="展品细节展示放大镜特效" rel="{{url('goodsPic')}}/{{$picArr[0]}}" class="jqzoom" /></a> </div>
                            <ul style="float:left;"class="tb-thumb " id="thumblist">

                                {{--遍历猜你喜欢--}}
                                @foreach($picArr as $v)
                                    <li style="margin:4px;" class= "tb-selected">
                                        <div  class="tb-pic tb-s40"><a ><img width="80px" height="80px" src="{{url('goodsPic')}}/{{$v}}" mid="{{url('goodsPic')}}/{{$v}}" big="{{url('goodsPic')}}/{{$v}}"></a></div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
                <!--购买信息-->
                <div class="pic_Purchase_operation">
                    <div class="pic_title_name"><h2>{{$goodData[0]->goods}}</h2><h5>{{$goodData[0]->desr}}</h5></div>

                    <dl class="pic_price putong clearfix"><dt class='parText'>价格</dt><dd class="price content"><em style="margin-top:16px;" class="pull-left">￥</em><div style="margin-top:6px;" id="price" class=".priceaa">{{$goodData[0]->price}}</div></dd></dl>

                    <dl class="Deadline clearfix"><dt class="infoParText">供货期</dt><dd class="Description content">下单后{{$goodData[0]->supply_date}}天内发货</dd></dl>

                    {{--js遍历选项内容--}}
                    <div style="width:500px;" id="goodParSelBox"></div>


                    <dl class="tb-amount tm-clear">
                        <dt class="infoParText">数量</dt>
                        <dd id="J_Amount content" ><span class="tb-amount-widget mui-amount-wrap ">
                       <input id="inputNum" type="text" name="num" class="tb-text mui-amount-input" value="1" maxlength="8" title="请输入购买量">

                        <span class="mui-amount-btn clearfix">

                           <span id="numAdd" class="numAdd mui-amount-increase">∧</span>

                            <span id="numSub" class="mui-amount-decrease">∨</span>
                        </span>

                        <span class="mui-amount-unit">件</span>
                        </span>
                            <em id="J_EmStock" class="tb-hidden" style="display: inline;">
                            
                            

        
                            库存{{$goodData[0]->stockall}}件</em>
                            <div></div>
                            <span id="J_StockTips"></span>
                        </dd>
                    </dl>
                    <div class="purchasing_btn clearfix">
                        <div class="tb-btn-buy tb-btn-sku">
                            <a id="J_LinkBuy" clss="" rel="nofollow" data-addfastbuy="true"  title="点击此按钮，到下一步确认购买信息。" role="button" data-spm-anchor-id="">立即购买</a>
                        </div>
                        <div class="tb-btn-basket tb-btn-sku ">
                            <a href="javascript:void(0)" rel="nofollow" id="addShop" role="button"><i class="icon_shop"></i>加入购物车</a></div>
                        </div>

                        @if (session('news'))
                        <div class="alert alert-danger" role="alert">
                          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                          <span class="sr-only">Error:</span>
                            {{ session('news') }}
                        </div>
                        @endif

                        

                    <dl class="clearfix">
                        <dt class="infoParText ">承诺</dt>
                        <dd class="content color" >
                            @if ($goodData[0]->promise == 1)
                                下单后7天可退款
                            @else
                                下单后7天可退款
                            @endif
                        </dd>
                    </dl>
                    <dl class="Pay_by clearfix">
                        <dt  style="margin-top:25px;" class="infoParText">支付方式</dt>
                        @if ($goodData[0]->mode_pay == 2)
                            <dd><i class="icon_zfb"></i><img src="{{url('web')}}/images/icon_Payment_03.png" alt="">
                                <i class="icon_zfb"></i><img src="{{url('web')}}/images/icon_Payment_05.png" alt="">
                                <i class="icon_zfb"></i><img width="70" height="70" src="{{url('web')}}/images/55345f53N39cabedd.jpg" alt=""></dd>
                            <dd></dd>

                        @endif
                    </dl>

                </div>
    </form>
                <!--猜你喜欢-->
                <div class="pic_like">
                    <div class="title_name"><span>猜你喜欢</span></div>
                    <div class="like_list picScroll-top">
                        <div class="hd">
                            <a href="javascript:ovid()" class="next"></a>
                            <a href="javascript:ovid()" class="prev"></a>
                        </div>
                        <div class="bd">
                            <ul  id='youlick' class="picList">
                                <li><a href="#"><img src="images/product/p-7.jpg"  width="145" height="145"/></a></li>
                                <li><a href="#"><img src="images/product/p-8.jpg"  width="145" height="145"/></a></li>
                                <li><a href="#"><img src="images/product/p-4.jpg"  width="145" height="145"/></a></li>
                                <li><a href="#"><img src="images/product/p-2.jpg"  width="145" height="145"/></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--信息-->
            <div class=" clearfix">
                <div class="left_Package">

                    <div class="Package_list">
                        <div class="title_name"><span>套系参考</span></div>
                        <ul id="coordin" class="list">

                        </ul>
                    </div>
                </div>
                <DIV class="right_detailed r_f">
                    <div class="slideTxtBox">
                        <div class="hd">
                            <ul><li><em class="jt"></em>商品详细</li><li><em class="jt"></em>陈设点评</li><li><em class="jt"></em>用户评论<span class="Quantity">345</span></li></ul>
                        </div>
                        <div class="bd">

                            {{--商品详细--}}
                            <ul id="content" class="Introduction">

                               {!! $goodData[0]->content !!}

                            </ul>

                            {{--陈设点评--}}
                            <ul class="Evaluation">
                            </ul>


                            <ul class="comment_style">
                                <?php 

                                $userContent = DB::table('criticism')
                                  ->leftJoin('users_register', 'users_register.id', '=', 'criticism.user_id')
                                  ->leftJoin('goods', 'goods.id', '=', 'criticism.goods_id')
                                  ->get();
                                  foreach ($userContent as $key => $value) {
                                    echo "<li class='comment_list clearfix'>";
                                    echo "
                                    <div class='comment_Avatar'> 
                                    <div class='user_Avatar'><div class='Avatar_bg'></div>
                                    <img src='{images/touxiang.jpg}' width='60' height='60'></div>
                                    <h3>$value->username</h3>
                                    </div>";
                                    echo "
                                    <div class='comment_info'>
                                    <p class='comments'>$value->comment_info</p>
                                    <p class='Basic_Information'>
                                    <span>件数：2件</span>&nbsp;&nbsp;&nbsp;&nbsp;<span>商品名称：$value->goods</span>
                                    </p>
                                    </div>
                                    ";
                                    echo "<div class='comment_time'>$value->created_at</div>";
                                  }
                                 ?>
                            </ul>
                        </div>
                    </div>
                </DIV>
            </div>
        </div>
    </div>
    @endsection


    @section('footJs')

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

@endsection
