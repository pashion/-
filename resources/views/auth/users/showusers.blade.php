@extends('zhuazi.layout.master')

@section('content')
  

<div id="content">
    <ul class="breadcrumb">
        <li><a href="javascript:;">首页</a></li>
        <li>用户权限管理</li>
        <li>角色列表</li>
    </ul>
    <div class="container-fluid">
        @foreach ($users as $user)
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title text-center">
                @if ($user->hasRole('admin'))
                    {{$user->name}}
                @endif
                </h3>
                </div>
                <div class="panel-body">
                Email:{{$user->email}}
                <table class="table">
                    <th>角色</th>
                    <th>权限</th>
                    @foreach($user->roles as $role)
                    <tr>
                        <td>
                            <i class="fa fa-user"></i>
                            {{$role->display_name or $role->name}}
                        </td>
                        <td>
                           <ul class="da-ul">
                                @foreach($role->perms as $perm)
                                <li>
                                    <i class="fa-li fa fa-tag"></i>
                                    {{$perm->display_name or $perm}}
                                </li>
                                @endforeach
                           </ul>
                        </td>
                    </tr>
                    @endforeach

                </table>
                </div>
            </div>     
        </div>
        @endforeach
    </div>
</div>
<div class="col-md-6 text-right">
</div>
@endsection