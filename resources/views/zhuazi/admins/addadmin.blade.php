@extends('zhuazi.layout.master')

@section('content')


<div id="content">
    <ul class="breadcrumb">
        <li><a href="/users">首页</a></li>
        <li>添加管理员</li>
    </ul>
    <hr>
    <table class="table">
        <form class="form-inline" method="post" action="{{url('admin/admins/adda')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <tr>
                <td>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="exampleInputName2">管理员名称</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName2" >
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="form-group text-left">
                        <div class="col-xs-6">
                            <label for="exampleInputName2">密码</label>
                            <input type="text" name="password" class="form-control" id="exampleInputName2" >
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="exampleInputName2">角色</label>
                            <select class="form-control" name="role_id" >
                                @foreach ( $roles as $role )
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="form-group text-left">
                        <div class="col-xs-6">
                            <label for="exampleInputName2">电话</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputName2" >
                        </div>
                    </div>
                </td>
            </tr>
        
            <tr>
                <td> <button type="submit" class="btn btn-primary">保存</button></td>
            </tr>
       
        </form>
    </table>

@endsection