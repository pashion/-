@extends('zhuazi.layout.master')

@section('content')
  

<div id="content">
    <ul class="breadcrumb">
        <li><a href="javascript:;">首页</a></li>
        <li>用户权限管理</li>
        <li>角色列表</li>
    </ul>
    <div class="container-fluid">
        <div class="panel panel-default">
            @include('auth.roles._rolePanel')

        </div>
    </div>
</div>
<div class="col-md-6 text-right">
{{ $roles->links() }}
</div>
@endsection