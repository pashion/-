@extends('zhuazi.layout.master')

@section('content')

    <form action="{{url('Article/ajax')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">文章标题</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">描述</label>
            <input type="text" class="form-control" name="desc">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">请选择封面图</label>
            <input type="file" name="cover" onchange="upload()" id="inputId">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <script>

            function upload(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var js_file = document.getElementById('inputId').files[0];
            $jq_file = $(js_file);
                console.log(typeof $jq_file);
            $.ajax({
                type: 'POST',
                url: '../Article/ajax' ,
                data: {file:$jq_file},
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert(data);
                },
            });


        }


    </script>

@endsection