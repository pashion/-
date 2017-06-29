@extends('zhuazi.layout.master');
@section('title' ,'链接添加')
@section('content')
<script type="text/javascript" src="{{url('ueditor')}}/ueditor.config.js"></script>
<script type="text/javascript" src="{{url('ueditor')}}/ueditor.all.min.js"></script>
<script type="text/javascript" src="{{url('ueditor')}}/lang/zh-cn/zh-ch.js"></script>
    {{--<form action="{{url('stroe')}}" method="post" class="form">--}}
        {{--链接名: <input type="text" name="urlname">--}}
        {{--<input type="radio" name="discover" value="1">显示--}}
        {{--<input type="radio" name="discover" value="2">不显示--}}
        {{--链接地址: <input type="file" name="urladdress">--}}
        {{--链接logo: <input type="image" name="urlpic">--}}
    {{--</form>--}}


    <div class="x_panel">
        <div class="x_title">
            <h2>添加友情链接 </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('/')}}">回到首页</a>
                        </li>
                        <li><a href="{{url('frenship')}}">回到链接首页</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <!-- start form for validation -->
            <form id="demo-form" data-parsley-validate action="{{url('frenship')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <label for="urlname">链接名 * :</label>
                <input type="text" id="urlname" class="form-control" name="name" required />

                <label for="urladderss">链接地址 * :</label>
                <input type="text" id="urladderss" class="form-control" name="url" data-parsley-trigger="change" required />

                <label>是否显示 *:</label>
                <p>
                    显示:
                    <input type="radio" class="flat" name="type" id="typeY" value="0" checked="" required /> 不显示:
                    <input type="radio" class="flat" name="type" id="typeN" value="1" />
                </p>
                <label for="urladderss">描述 * :</label>
                <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>

                <label for="image">链接logo * :</label>
                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" name="image" /><br>
                <input type="submit" class="btn btn-success">

            </form>
            <!-- end form for validations -->

        </div>
    </div>
    <script type="text/javascript">

        //实例化编辑器
        var ue = UE.getEditor('editor');
    </script>
@endsection
