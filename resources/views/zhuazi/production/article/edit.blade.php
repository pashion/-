@extends('zhuazi.layout.master')

@section('content')

    <form action="{{url('Article')}}/{{$data->id}}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">文章标题</label>
            <input type="text" class="form-control" name="title" value="{{$data->title}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">描述</label>
            <input type="text" class="form-control" name="description" value="{{$data->description}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">作者</label>
            <input type="text" class="form-control" name="author" value="{{$data->author}}">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">请选择封面图</label>
            <input type="file" name="" onchange="cover_upload('../../../')" id="inputId">
            <input type="hidden" name="cover" value="" id="cover">
            <input type="hidden" name="coverpath" id="coverpath">
            <input type="hidden" name="date" value="{{date('Y:m:d H:d:m')}}">
            <div id="show" style="width:300px;height:160px;border:1px solid black; padding:3px;">
                <img src="../../..{{$data->coverpath}}/t_{{$data->cover}}" alt="">
            </div>
        </div>
        <br><br>
        <div>
            <!-- 加载编辑器的容器 -->
            <script id="container" name="content" type="text/plain">{!! $data->content !!}</script>
            <!-- 实例化编辑器 -->
            <script type="text/javascript">
                var ue = UE.getEditor('container');
            </script>
            <input type="text" name="oldcover" value="{{$data->coverpath}}/{{$data->cover}}">
            <input type="text" name="t_oldcover" value="{{$data->coverpath}}/t_{{$data->cover}}">
            <input type="text" name="oldimg" value="{{$data->content}}">
        <input type="submit" class="btn btn-default" value="Submit">
    </form>

@endsection