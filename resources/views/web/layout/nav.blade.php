<div class="header">
    <div class="header_top">
        <div class="top_info clearfix">
            <div class="logo_style l_f"><a href="#"><img src="{{url('web')}}/images/logo.jpg" /></a></div>
            <div class="Search_style l_f">
                <form>
                    <div class="select">
                        <select name="" size="1">
                            <option value="1">家具商品</option>
                            <option value="2">设计方案</option>
                        </select>
                    </div>
                    <input name="" type="text"  class="add_Search"/>
                    <input name="" type="submit"  value="" class="submit_Search"/>

                </form>
            </div>
            <div class="Cart_user r_f">
                <div class="Cart_Quantity "><span class="number">0</span></div>
                <div class="header_operating l_f">
                      @if ( !session('user') )
                            <span class="header_touxiang"><img src="{{url('web')}}/images/touxiang_03.png" /></span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    网站导航 <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('shopCart')}}/cart">购物车</a></li>
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
                <li class="nLi Down"><a href="{{url('')}}">网站首页</a><em class="icon_jiantou"></em></li>
                <li class="nLi Down"><a href="{{url('scene/create')}}">设计精粹</a><em class="icon_jiantou"></em></li>
                <li class="nLi Down"><a href="{{url('scene')}}">场景方案</a><em class="icon_jiantou"></em></li>
                <li class="nLi Down"><a href="{{url('goods_list')}}">单品大库</a><em class="icon_jiantou"></em></li>
                <li class="nLi Down"><a href="{{url('')}}">奇货可享</a><em class="icon_jiantou"></em></li>
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
