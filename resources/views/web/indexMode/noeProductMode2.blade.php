

{{--商品首页模块2--}}
@foreach($goodsData as  $k => $v)
    @if ($k == 0)
        <div class="p_box1">
            <a href="goodsShow/{{$v['id']}}" class="p_box1pic"><img src="{{url('goodsPic')}}/{{$goodsPic[$k]}}" /></a>
            <p><a href="#">{{$v['goods']}}</a></p>
            <p class="p_pirce">￥{{$v['price']}}</p>
        </div>
    @else
        <div class="p_box2">
            <a href="goodsShow/{{$v['id']}}" class="p_box2pic"><img src="{{url('goodsPic')}}/{{$goodsPic[$k]}}" /></a>
            <p><a href="#">{{$v['goods']}}</a></p>
            <p class="p_pirce">￥{{$v['price']}}</p>
        </div>

    @endif
@endforeach


