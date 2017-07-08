@extends('zhuazi.layout.master')

@section('content')
    
    <p class="bg-danger">
        @if (session('news'))
           {{ session('news') }}
        @endif
    </p>

    <table class="table">
        <tr>
            <th>id</th>
            <th>标题</th>
            <th>作者</th>
            <th>描述</th>
            <th>操作</th>
        </tr>
        @foreach($data as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->title}}</td>
                <td>{{$v->author}}</td>
                <td>{{$v->description}}</td>
                <td>
                    <a href="javascript:void(0)" onclick="del( '{{$v->id}}',this,'Article/' )">删除</a>
                    <a href="./Article/{{$v->id}}/edit">修改</a>
                </td>
            </tr>
        @endforeach
    </table>
    <nav aria-label="Page navigation">
      <ul class="pagination">
        {{ $data->links() }}
      </ul>
    </nav>
@endsection
