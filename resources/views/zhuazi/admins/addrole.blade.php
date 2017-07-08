@extends('zhuazi.layout.master')

@section('content')


<div id="content">
    <ul class="breadcrumb">
        <li><a href="/users">首页</a></li>
        <li添加角色</li>
    </ul>
  	
    <hr>
    
    <form class="form-horizontal" action="{{url('admin/admins/addr')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">角色名称：</label>
            <div class="col-sm-10">
                <input type="name" name="role_name" class="form-control"  >
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">权限分配：</label>
        </div>
        <hr>
        <div class="text-center" style="border-radius: 2px;height: 150px;overflow: auto;">
            @foreach ( $permissions as $perm ) 
                <div class="checkbox" >
                    <label>
                        <input type="checkbox" name="p_name[]" value="{{ $perm->p_name }}">
                        {{ $perm->show_name }}
                    </label>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="form-group text-right">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
    </form>
@endsection