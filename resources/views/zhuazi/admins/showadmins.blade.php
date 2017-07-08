@extends('zhuazi.layout.master')

@section('content')


<div id="content">
    <ul class="breadcrumb">
        <li><a href="/users">首页</a></li>
        <li>管理员管理</li>
    </ul>
  	
    <hr>
    <div class="text-right">
        <a class="btn btn-primary" href="{{url('admin/admins/addadmin')}}" role="button">添加管理员</a>
    </div>
    <table class="table table-bordered">
    	<thead>
    		<th>用户名</th>
    		<th>角色名称</th>
    		<th>添加时间</th>
    		<th>操作</th>
    	</thead>
    	<tbody>
    		@foreach ( $admins as $admin ) 
    		<tr>
    			<td align="center">{{$admin->name}}</td>
    			<td align="center">{{$admin->role_name}}</td>
    			<td align="center">{{$admin->addtime}}</td>
    			<td align="center">
                @if ( $admin->role_name == "超级管理员" )
                <a class="btn btn-danger btn-sm disabled" href="{{url('admin/admins/admindelete')}}/{{$admin->id}}" role="button">删除</a>
                <a class="btn btn-info btn-sm" href="{{url('admin/admins/adminupdate')}}/{{$admin->id}}" role="button">修改</a></td>
                @else
                <a class="btn btn-danger btn-sm" href="{{url('admin/admins/admindelete')}}/{{$admin->id}}" role="button">删除</a>
                <a class="btn btn-info btn-sm" href="{{url('admin/admins/adminupdate')}}/{{$admin->id}}" role="button">修改</a></td>
                @endif

    		</tr>
    		@endforeach
    	</tbody>
	</table>
@endsection