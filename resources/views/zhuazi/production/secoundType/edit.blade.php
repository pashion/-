@extends('zhuazi.layout.master')

@section('content')
    <form class="form-horizontal" action="{{url('SecoundType/')}}/{{$name->id}} " method="post">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">分类名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$name->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">修改名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </div>
        </div>
        {{--修改顺序--}}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">修改排序</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="sort" value="">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default">
            </div>
        </div>
    </form>
@endsection