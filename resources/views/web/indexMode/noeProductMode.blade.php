<!--产品列表-->
<div class="shops_proc_list clearfix"  >
    <ul class="prodcuts_style clearfix">

        @foreach($goodsData as  $k => $v)
            <li class="product">
                <div class="pic_img textalign"><a href="goodsShow/{{$v['id']}}"><img src="{{url('goodsPic')}}/{{$goodsPic[$k]}}"></a>
                    <div class="operating" style="bottom: -30px;"><a href="#" class="pic_cart">加入购物车</a><a href="#" class="Collection">收藏</a></div>
                </div>
                <p class="pic_nme"><a href="goodsShow/{{$v['id']}}">{{$v['goods']}}</a></p>
                <p class="pic_price">￥{{$v['price']}}</p>
            </li>
        @endforeach
    </ul>
</div>
</div>
</div>