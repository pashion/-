<!DOCTYPE html>
<html>
<head>
    <title>修改密码</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="{{url('web/bootstrap')}}/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="{{url('web/bootstrap')}}/js/bootstrap.js"></script>
    <link href="{{url('web/bootstrap')}}/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
	<body>
	<hr>
	<h4>修改密码</h4>
	<hr>
	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
		<form class="form-horizontal" method="post" action="{{url('user/detail/change')}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}" >
  <input type="hidden" name="id" value="{{session('user')[0]->id}}" >
  <div class="form-group">
  
    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
    <div class="col-xs-5">
      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="密码">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">重复密码</label>
    <div class="col-xs-5">
      <input type="password" name="repassword" class="form-control" id="inputPassword3" placeholder="重复密码">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">提交</button>
    </div>
  </div>
</form>
	</body>
</html>

