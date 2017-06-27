@extends('zhuazi.layout.master')

@section('content')
  

<div id="content">
  	<ul class="breadcrumb">
        <li><a href="/users">首页</a></li>
        <li>会员</li>
   	</ul>
  	<div class="container-fluid">
     	<div class="panel panel-default">
		    <div class="panel-heading">
		    	<h3 class="panel-title"><i class="fa fa-list"></i> 会员列表</h3>
		    </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                 
                  <td class="text-left">会员姓名</td>
                  <td class="text-left">邮箱</td>
                  <td class="text-left">状态</td>
                  <td class="text-left">IP</td>
                  <td class="text-left">添加时间</td>
                  <td class="text-right">操作</td>
                  
                </tr>
              </thead>
              <tbody>
                  @foreach ($users as $user)

                <tr>
                 	<!-- 这里的数据从数据库遍历 -->
                  <td class="text-left">{{$user->username}}</td>
                  <td class="text-left">{{$user->email}}</td>

                  @if ($user->status == 1)
                    <td class="text-left">启用</td>
                  @elseif ($user->status == 0)
                    <td class="text-left">停用</td>
                  @endif

                  <td class="text-left">{{$user->register_ip}}</td>
                  <td class="text-left">{{$user->created_at}}</td>
                  <td class="text-right">

                  <!-- <button type="button" class="btn btn-success" >启用</button> -->
                  <button class="btn btn-danger" ><a  id="del" onclick='confirm("确定要删除吗？") ? $(this).attr({href:"delete/{{$user->id}}"}) : $(this).attr({href:"javascript:;"});' ">删除</a></button>

                   <button type="button" class="btn btn-primary" ><a href="{{url('admin/user/edit/')}}/{{$user->id}}">编辑</a></button>
                                        
                  </td>
                </tr>
                
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>


@endsection