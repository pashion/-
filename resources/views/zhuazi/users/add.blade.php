@extends('zhuazi.layout.master')

@section('content')


<div id="content">
    <ul class="breadcrumb">
        <li><a href="/users">首页</a></li>
        <li>会员添加</li>
    </ul>
  	
    <hr>

    <div class="col-sm-10">
        <div class="tab-content">
            <div class="tab-pane active" id="tab-customer">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="form-horizontal" action="/admin/user/insert" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-customer-group">会员等级</label>
                        <div class="col-sm-10">
                            <select name="grade" class="form-control">
                                <option value="0">普通用户</option>
                                <option value="1">青铜用户</option>
                                <option value="2">白银用户</option>
                                <option value="3">黄金用户</option>
                                <option value="4">铂金用户</option>
                                <option value="5">钻石用户</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-fullname">姓名</label>
                        <div class="col-sm-10">
                            <input type="text" id="username" name="username" class="form-control" value="{{old('username')}}" />
                        </div>
                    </div>

                  <!--   <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-fullname">电话</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}" />
                        </div>
                    </div> -->

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-fullname">邮箱</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" value="{{old('email')}}" />
                        </div>
                    </div>

                     <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-fullname">密码</label>
                        <div class="col-sm-10">
                            <input type="password" name="password"  class="form-control" />
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-fullname">确认密码</label>
                        <div class="col-sm-10">
                            <input type="password" name="repassword" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">状态</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option value="1" selected="selected">启用</option>
                                <option value="0">停用</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group required">
                        <div class="text-right">
                            <input type="submit"  value="添加" class="btn btn-success" />
                            <input type="reset"  value="重置" class="btn btn-info" />
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

<script>

    //username判断
    $("#username").on('blur',function()
    {
        $('.tip').remove();
        var that = $(this);
        $.post('data',{'_token':'{{csrf_token()}}','username':that.val()},function(data) //第二个参数要传token的值 再传参数要用逗号隔开
        {
            if(data == 1)
            {
                that.after('<span class="tip" style="color:red">用户名已存在</span>');
            }else if(data == 0){
                that.after('<span class="tip" style="color:green">用户名可以使用</span>');
            }else if (data ==2){
                that.after('<span class="tip" style="color:red">用户名不符合规则</span>');
            }
        });
    });
</script>	   	    


@endsection