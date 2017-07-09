@extends('zhuazi.layout.master')

@section('content')

    <!-- 测试验证 -->
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{url('/Wheel')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="form-group">
        <label>图片描述</label>
        <input type="text" class="form-control" name="picname" value="">
    </div>
    <div class="form-group">
        <label>添加图片顺序</label>
        <input type="text" class="form-control" name="sort">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">选择图片</label>
        <input type="file" name="picurl">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    </form>

@endsection
