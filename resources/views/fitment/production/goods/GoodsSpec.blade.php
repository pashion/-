@extends('fitment.layout.master')

@section('content')

<div class="title_left">
    <h3>规格\属性分类表</h3>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <table class="table table-bordered">
            <tr>
                <th>类别名称</th>
                <th>种类</th>
            </tr>
            @foreach( $typeData as $v)
                <tr class="typeTr">
                    <td>{{$v['name']}}</td>
                    <td>
                        @foreach($kindData[$v['id']] as $vv)
                            <a href="#"  kindId="{{$vv['id']}}" class="btn btn-default btn-xs kindBtn" >{{$vv['name']}}</a>
                        @endforeach
                    </td>
                </tr>
                @endforeach

        </table>
    </div>
</div>


@endsection

@section('footJS')

    <script src="{{url('zhuazi')}}/js/GoodsSpec.js"></script>

    @endsection