
@extends('zhuazi.layout.master')

@section('content')
  

<div id="content">
    <ul class="breadcrumb">
        <li><a href="javascript:;">首页</a></li>
        <li>用户权限管理</li>
        <li>新建权限</li>
    </ul>
    <div class="col-md-6">
        <form method="post" action="{{url('admin/permissions/store')}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="exampleInputEmail1">名称:</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">显示名称:</label>
                <input type="text" name="label" class="form-control" id="exampleInputEmail1" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">描述:</label>
                <input type="text" name="description" class="form-control" placeholder="角色描述">
            </div>
          
            <button type="submit" class="btn btn-success">新建角色</button>
            <button type="reset" class="btn btn-info">重置</button>
        </form>
            
    </div>
            
</div>
@endsection