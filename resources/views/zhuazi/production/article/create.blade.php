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


    <form action="{{url('Article')}}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">文章标题</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">描述</label>
            <input type="text" class="form-control" name="description">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">作者</label>
            <input type="text" class="form-control" name="author">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">请选择封面图</label>
            <input type="file" name="" onchange="cover_upload('../../')" id="inputId">
            <input type="hidden" name="cover" value="" id="cover">
            <input type="hidden" name="coverpath" id="coverpath">
            <input type="hidden" name="date" value="{{date('Y:m:d H:d:m')}}">
            <div id="show" style="width:300px;height:160px;border:1px solid black; padding:3px;"></div>
        </div>
        <br><br>
        <div>
            <!-- 加载编辑器的容器 -->
            <script id="container" name="content" type="text/plain"></script>
            <!-- 实例化编辑器 -->
            <script type="text/javascript">
                var ue = UE.getEditor('container');
            </script>
        </div>
        <input type="submit" class="btn btn-default" value="Submit">
    </form>

@endsection
