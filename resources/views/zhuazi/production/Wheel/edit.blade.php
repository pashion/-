@extends('zhuazi.layout.master')

@section('content')

    <form action="{{url('Wheel')}}/{{$info->id}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">轮播图描述</label>
            <input type="text" class="form-control" name="picname" value="{{$info->picname}}">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">轮播图顺序</label>
            <input type="text" class="form-control" name="sort" value="{{$info->sort}}">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" name="picurl">
        </div>
        <input type="submit" class="btn btn-default">
    </form>


@endsection