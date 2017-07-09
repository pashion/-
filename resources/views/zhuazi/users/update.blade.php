@extends('zhuazi.layout.master')

@section('content')


<div id="content">
    <ul class="breadcrumb">
        <li><a href="/users">首页</a></li>
        <li>会员信息</li>
    </ul>
  	
    <hr>

    <div class="col-sm-10">
        <div class="tab-content">
            <div class="tab-pane active" id="tab-customer">

                <form class="form-horizontal" method="post" action="{{url('admin/user/update')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-fullname">姓名</label>
                        <div class="col-sm-10">
                            <input type="text"  value="{{$data->username}}"  name="username" class="form-control" />
                        </div>
                    </div>

                   

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-fullname">邮箱</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" value="{{$data->email}}" class="form-control" />
                        </div>
                    </div>
               
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">状态</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control" value="{{$data->status}}">
                                <option value="1" selected="selected">启用</option>
                                <option value="0">停用</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group required">
                        <div class="text-right">
                            <input type="submit"  value="修改" class="btn btn-success" />
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

		    


@endsection