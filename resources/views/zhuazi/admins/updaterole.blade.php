@extends('zhuazi.layout.master')

@section('content')


<div id="content">
    <ul class="breadcrumb">
        <li><a href="/users">首页</a></li>
        <li修改角色</li>
    </ul>
  	
    <hr>
    
    <form class="form-horizontal" action="{{url('admin/admins/updater')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $roles[0]->id }}">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">角色名称：</label>
            <div class="col-sm-10">
                <input type="name" name="role_name" class="form-control" value="{{ $roles[0]->name }}" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">权限分配：</label>
        </div>
        <hr>
        <div class="text-center" style="border-radius: 2px;height: 150px;overflow: auto;">
            @foreach ( $permissions as $perm )
                @if ( in_array($perm->p_name,$role_perm) ) 
                <div class="checkbox" >
                    <label>
                        <input type="checkbox" name="p_name[]" value="{{ $perm->p_name }}" checked>
                        {{ $perm->show_name }}
                    </label>
                </div>
                @else
                <div class="checkbox" >
                    <label>
                        <input type="checkbox" name="p_name[]" value="{{ $perm->p_name }}">
                        {{ $perm->show_name }}
                    </label>
                </div>
                @endif

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