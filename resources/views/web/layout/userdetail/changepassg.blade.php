@extends('web.layout.selfconmit')

@section('title','修改密码')

@section('content')

    <div class="row">
        <div class="col-xs-4 col-md-2"></div>
        <div class="col-xs-8 col-sm-6 col-md-8">
            <hr>
            <h3><em>修改密码</em></h3>
            <hr>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        action="{{url('user/detail/change')}}
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 col-md-offset-3"><form class="form-horizontal" method="post" ">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" >
                    <input type="hidden" name="id" value="{{session('user')[0]->id}}" >
                    <div class="form-group">
  
                        <label for="inputPassword3" class="col-sm-2 control-label"><span style="color: red">*</span>密码</label>
                        <div class="col-xs-5">
                            <input type="password" name="password" class="form-control input-lg" id="inputPassword3" placeholder="密码">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label"><span style="color: red">*</span>重复密码</label>
                        <div class="col-xs-5">
                            <input type="password" name="repassword" class="form-control input-lg" id="inputPassword3" placeholder="重复密码">
                        </div>
                    </div>
  
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-5">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">提交</button>
                        </div>
                    </div>
                    </form></div>
            </div>
		
        </div>
    </div>
	
	

@endsection