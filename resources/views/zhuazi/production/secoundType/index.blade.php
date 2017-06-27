@extends('zhuazi.layout.master')

@section('content')

    <p class="bg-success">{{ session('name') }}</p>

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
                        {{ str_repeat( '&nbsp;', substr_count($v->path,',')*4  ) }} |-- {{$v->name}}
                    @endif
                </td>
                <td>{{$v->tid}}</td>
                <td>{{$v->path}}</td>
                <td>{{$v->tid}}-{{$v->sort}}</td>
                <td>
                    <a  class="btn btn-danger" href="javascript:void(0)" onclick="del( '{{$v->id}}',this,'SecoundType/' )">D</a>
                    @include('zhuazi.production.secoundType.add')
                    @include('zhuazi.production.secoundType.modal')
                    {{--<a href="{{url('/SecoundType/increase')}}?id={{$v->id}}&name={{$v->name}}&path={{$v->path}}">添加子分类</a>--}}
                    {{--<a href="{{url('/SecoundType')}}/{{$v->id}}/edit">编辑</a>--}}
                </td>
            </tr>
        @endforeach
    </table>



@endsection