@extends('zhuazi.layout.master');
@section('title' ,'修改链接')
@section('content')

    <div class="x_panel">
        <div class="x_title">
            <h2>修改状态 </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('/')}}">回到首页</a>
                        </li>
                        <li><a href="{{url('order')}}">回到订单首页</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <!-- start form for validation -->
            <form id="demo-form" data-parsley-validate action="/detail/{{$data->id}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden"  class="form-control" name="_method" required  value="PUT"/>
                <input type="hidden"  class="form-control" name="id" required  value="{{$data->id}}"/>
                <input type="hidden"  class="form-control" name="order_id" required  value="{{$data->order_id}}"/>
                <input type="hidden"  class="form-control" name="goods_id" required  value="{{$data->goods_id}}"/>
                <input type="hidden"  class="form-control" name="goods_name" required  value="{{$data->goods_name}}"/>
                <input type="hidden"  class="form-control" name="commodity_number" required  value="{{$data->commodity_number}}"/>
                <input type="hidden"  class="form-control" name="cargo_price" required  value="{{$data->cargo_price}}"/>
                <input type="hidden"  class="form-control" name="ruturn_status" required  value="{{$data->ruturn_status}}"/>
                <input type="hidden"  class="form-control" name="comment_status" required  value="{{$data->comment_status}}"/>
                <input type="hidden"  class="form-control" name="goods_pic" required  value="{{$data->goods_pic}}"/>
                <input type="hidden"  class="form-control" name="created_at" required  value="{{$data->created_at}}"/>
                <label>是否显示 *:</label>
                <p>
                    待发货:
                    <input type="radio" class="flat" name="order_status" id="typeY" value="0" {{($data->order_status==0)? 'checked':''}}/> 待收货:
                    <input type="radio" class="flat" name="order_status" id="typeN" value="1" {{($data->order_status==1)? 'checked':''}}/> 完成订单:
                    <input type="radio" class="flat" name="order_status" id="typeN" value="2" {{($data->order_status==2)? 'checked':''}}/> 取消订单:
                    <input type="radio" class="flat" name="order_status" id="typeN" value="3" {{($data->order_status==3)? 'checked':''}}/>
                </p>
                <input type="submit" class="btn btn-success"></input>

            </form>

        </div>
    </div>
@endsection
