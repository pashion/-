@extends('zhuazi.layout.master')

@section('content')
    <table class="table table-condensed">
        <tr>
            <th class="active">id</th>
            <th class="success">轮播图描述</th>
            <th class="warning">轮播图</th>
            <th class="danger">排序</th>
            <th class="info">编辑</th>
        </tr>
        @foreach($Wheel as $k => $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->picname}}</td>
                <td><img src="http://localhost/test2/laravel{{$v->picurl}}" alt="" width="300px" height="100px"></td>
                <td><input type="text" value="{{$v->sort}}" onchange=" update( '{{$v->id}}' ,this ) "></td>
                <td>
                    <a href="javascript:void(0)" onclick="del( '{{$v->id}}',this,'Wheel/' )">删除</a>
                    <a href="Wheel/{{$v->id}}/edit">编辑</a>
                </td>
            </tr>

        @endforeach
    </table>

    <script>
        //文本框修改排序触发事件
            function update($id,$obj){

            var sort = $( $obj ).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'post',
                url: 'Wheel/sort',
                data: {'id':$id , 'sort':sort},
                success:function(data){
                    if(data > 0){
                        $($obj).after('<span style="color: red;">修改成功</span>');
                    }else{
                        $($obj).after('<span style="color: red;">修改失败</span>');
                    }
                }
            });
            $($obj).next().remove();
        }
    </script>
@endsection