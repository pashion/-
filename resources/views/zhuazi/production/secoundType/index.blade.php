@extends('zhuazi.layout.master')

@section('content')

    {{ Session::get('name') }}

    <table class="table">
        <tr>
            <th>id</th>
            <th>类名</th>
            <th>父id</th>
            <th>path</th>
            <th>排序</th>
            <th>操作</th>
        </tr>
        @foreach($info as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>
                    @if ( substr_count($v->path,',') > 0 )
                        {{ str_repeat( '&nbsp;', substr_count($v->path,',')*12  ) }} |-- {{$v->name}}
                    @endif

                </td>
                <td>{{$v->tid}}</td>
                <td>{{$v->path}}</td>
                <td>{{$v->sort}}</td>
                <td>
                    <a href="javascript:void(0)" onclick="del( '{{$v->id}}',this )">
                        删除
                    </a>
                    <a href="{{url('/SecoundType/increase')}}?id={{$v->id}}&name={{$v->name}}&path={{$v->path}}">添加子分类</a>
                    <a href="{{url('/SecoundType')}}/{{$v->id}}/edit">编辑</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{--{{ $info->links() }}--}}
    <script>

        function del($id,$obj){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: 'DELETE',
                url: 'SecoundType/'+$id,
                data: {id: $id},
                success:function(data){
                    if(data == '删除成功'){
                        alert(data);
                        $($obj).parent().parent().remove();
                    }else{
                        alert('删除失败');
                    }
                }
            });
        }

    </script>


@endsection