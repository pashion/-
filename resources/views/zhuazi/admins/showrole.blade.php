@extends('zhuazi.layout.master')

@section('content')


<div id="content">
    <ul class="breadcrumb">
        <li><a href="/users">首页</a></li>
        <li>管理群组</li>
    </ul>
  	
    <hr>
    <div class="text-right">
        <a class="btn btn-primary" href="{{url('admin/admins/addrole')}}" role="button">添加角色</a>
    </div>
    <table class="table table-bordered">
    	<thead>
    		<th>管理员群组名称</th>
    		<th>操作</th>
    	</thead>
    	<tbody>
    		@foreach ( $roles as $role )
    		<tr>
    			<td align="center">{{ $role->name }}</td>
    			<td align="center">
    				@if ( $role->name == "超级管理员" )
                    <a class="btn btn-danger btn-sm disabled" href="{{url('admin/admins/deleterole')}}/{{$role->id}}" role="button">删除</a>
                    <a class="btn btn-info btn-sm" href="{{url('admin/admins/updaterole')}}/{{$role->id}}" role="button">修改</a></td>
                    @else
	                <a class="btn btn-danger btn-sm" href="{{url('admin/admins/deleterole')}}/{{$role->id}}" role="button">删除</a>
	                <a class="btn btn-info btn-sm" href="{{url('admin/admins/updaterole')}}/{{$role->id}}" role="button">修改</a></td>
                    @endif
    			</td>
    		</tr>
    		@endforeach
    	</tbody>
	</table>
@endsection