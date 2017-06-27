{{--添加子分类弃用--}}
@extends('zhuazi.layout.master')

@section('content')
    <form class="form-horizontal" action="{{url('SecoundType/insert')}}" method="post">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">原分类</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$ret['name']}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">新增子分类</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="tid" value="{{$ret['id']}}">
                <input type="hidden" name="path" value="{{$ret['path']}}{{$ret['id']}},">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default">
            </div>
        </div>
    </form>
@endsection