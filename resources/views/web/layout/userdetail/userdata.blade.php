<!DOCTYPE html>
<html>
<head>
    <title>个人资料</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="{{url('web/bootstrap')}}/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="{{url('web/bootstrap')}}/js/bootstrap.js"></script>
    <link href="{{url('web/bootstrap')}}/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
<hr>
<h4>个人资料</h4>
<hr>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form class="form-horizontal" method="post" action="{{url('user/detail/saveuserdata')}}">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">名称</label>
                <div class="col-xs-6">
                    <input type="text" class="form-control" id="inputEmail3" name="name" placeholder="名称">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">电话</label>
                <div class="col-xs-6">
                    <input type="text" class="form-control" id="inputPassword3" name="phone" placeholder="电话">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">生日</label>
                <div class="col-xs-6">
                    <input type="date" name="birthday" class="form-control" id="inputPassword3" >
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">头像</label>
                <div class="col-xs-6">
                <input type="file" name="pic" id="exampleInputFile">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1"> 男
                        </label> 
                        <label>
                            <input type="checkbox" value="1"> 女
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

</body>
</html>
<script>
    var user_id = {{session('user')[0]->id}};
    $.get(
        'avatar'
        {id: user_id},
        function (data) {
            
        },
        'json'
        );

</script>

