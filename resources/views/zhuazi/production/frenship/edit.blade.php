@extends('zhuazi.layout.master');
@section('title' ,'修改链接')
@section('content')
    {{--@foreach($data as $v)--}}
       {{--{{dd($data->type)}}--}}

    {{--@endforeach--}}

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
            <form id="demo-form" data-parsley-validate action="/frenship/{{$data->id}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden"  class="form-control" name="_method" required  value="PUT"/>
                <input type="hidden"  class="form-control" name="id" required  value="{{$data->id}}"/>
                <label for="urlname">链接名 * :</label>
                <input type="text" id="urlname" class="form-control" name="name" required  value="{{$data->name}}"/>

                <label for="urladderss">链接地址 * :</label>
                <input type="text" id="urladderss" class="form-control" name="url" data-parsley-trigger="change" required  value="{{$data->url}}"/>

                <label>是否显示 *:</label>
                <p>
                    显示:
                    <input type="radio" class="flat" name="type" id="typeY" value="0" {{($data->type==0)? 'checked':''}}/> 不显示:
                    <input type="radio" class="flat" name="type" id="typeN" value="1" {{($data->type==1)? 'checked':''}}/>
                </p>
                <label for="fullname">链接logo * :</label>
                <img src="{{url('uploads')}}/{{$data->image}}" alt="" width="100" height="100">
                <br>
                <label for="fullname">上传新logo * :</label>
                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage"  name="image" /><br>
                <input type="submit" class="btn btn-success"></input>

            </form>
            <!-- end form for validations -->

        </div>
    </div>
@endsection
