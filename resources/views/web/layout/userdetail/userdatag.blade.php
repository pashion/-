@extends('web.selfconmit')

@section('title','修改密码')

@section('content')

    <div class="row">
        <div class="col-xs-4 col-md-2"></div>
        <div class="col-xs-8 col-sm-8 col-md-10">


<hr>
<h4>个人资料</h4>
<hr>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Success:</span>
            {{session('success')}}
        </div>
    @endif
<div class="row" style="background-color:white;">
    <div class="col-md-6 col-md-offset-3">
    <div class="text-right">头像：<img  class="img-circle" id="avatar" style="width: 100px;height: 100px;"></div>
        <form class="form-horizontal" method="post" action="{{url('user/detail/saveuserdata')}}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="user_id" value="{{session('user')[0]->id}}">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><span style="color: red">*</span>名称：</label>
                <div class="col-xs-6">
                    <input type="text" style="border:1px solid #ccc" class="form-control" id="username" name="name" placeholder="名称">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">电话：</label>
                <div class="col-xs-6">
                    <input type="text" style="border:1px solid #ccc" class="form-control" id="phone" name="phone" placeholder="电话">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">生日：</label>
                <div class="col-xs-6">
                    <input type="date" style="border:1px solid #ccc" name="birthday" class="form-control" id="birthday" ><span>填生日有惊喜哦~</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">头像：</label>
                <div class="col-xs-6">
                <input type="file" name="avatar" id="exampleInputFile">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="radio"  name="sex" id="sex1" value="1"> 男
                        </label> 
                        <label>
                            <input type="radio" name="sex" id="sex0" value="0"> 女
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info">提交</button>
                </div>
            </div>

        </form>
    </div>
</div>
<script>
    //获取用户ID
    var user_id = {{session('user')[0]->id}};
    //AJAX请求用户名称
    $.get(
        'username',
        {id:user_id},
        function (data) {

                // console.log(data[0].username);
                $('#username').val(data[0].username);
        },
        'json'
        );

    //AJAX获取用户个人资料并填充到表单
    $.get(
        'userdata',
        {id:user_id},
        function (data) {

                $('#phone').val(data[0].phone);
                $('#birthday').val(data[0].birthday);
                $('#avatar').attr({src:"http://qq.com"+data[0].avatar});

                var sex = data[0].sex;
                
                if ( sex == 1 ) {

                    $('#sex1').prop("checked","true");

                }else{

                    $('#sex0').prop("checked","true");

                }

        },
        'json'
        );

</script>

        </div>
    </div>
	
	

@endsection