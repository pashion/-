@extends('fitment.layout.master')


@section('content')

    <div class="">
        <div class="page-title">


        </div>

        <div class="clearfix"></div>
        <form enctype="multipart/form-data" method="post" name="fileinfo">
            <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>商品添加<small>Activity report</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        {{--商品信息填写--}}



                            <table class="table">
                                <tr height="100">
                                    <td><h3>商品图片</h3></td>
                                    <td colspan="2">

                                        <div class="col-md-55">
                                            <div class="thumbnail">
                                                <div class="image view view-first">
                                                    <div class="imgDis"><img src="" alt=""></div>

                                                </div>
                                                <div class="caption">

                                                    <center>{{--以下按钮定点--}}

                                                        <div>未有图片</div>
                                                        <a style="display:none" class="btn btn-defulat cancPic">取消</a>
                                                        <button class="btn btn-defulat selPic">选择图片</button>
                                                        <input type="file" class="fileUp" style="display:none;" name="pic" >

                                                    </center>
                                                </div>
                                            </div>
                                        </div>




                                    </td>
                                </tr>

                                <tr>
                                    <td width="12%">商品名称</td>
                                    <td width="40%"><input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"></td>
                                    <td >不包含有特殊字符在</td>
                                </tr>
                                <tr>
                                    <td>基本价格</td>
                                    <td>

                                        <div class="input-group">
                                            <div class="input-group-addon">$</div>
                                            <input type="text" class="form-control " id="exampleInputAmount" placeholder="价格">
                                        </div>
                                    </td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>库存数量</td>
                                    <td> <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"></td>
                                    <td>1</td>
                                </tr>

                                @foreach($type as $typeV)
                                <tr>
                                    <td>{{$typeV['name']}}</td>
                                    <td colspan="2">
                                    @foreach($typeTou as $touV)
                                        @if($typeV['id'] == $touV['tid'] )
                                            <label class="">
                                                <div class="iradio_flat-green checked" style="position: relative;">
                                                    <input type="radio" class="flat" name="iCheck{{$typeV['id']}}" value="{{$touV['id']}}"  style="position: absolute; opacity: 0;">
                                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
                                                    </ins></div>   {{$touV['name']}} &nbsp &nbsp
                                            </label>
                                        @endif
                                    @endforeach
                                    </td>
                                    <td></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>属性选项</td>

                                    <td colspan="2">
                                        <div class="pull-left">
                                            <select style="width:100px;" class="select2_group form-control sele">
                                                <option value="">请选择</option>
                                                @foreach($kind as $kindV)
                                                    <option value="{{$kindV["id"]}}">{{$kindV['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                     </td>


                                </tr>

                                <tr>
                                    <td>
                                        属性选项
                                    </td>
                                    <td colspan="2">
                                        <table id="parTable" class="table">

                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        规格参数
                                    </td>
                                    <td colspan="2">
                                        <tabe id="spec">

                                        </tabe>
                                    </td>
                                </tr>

                                <tr>
                                    <td>商品状态</td>
                                    <td>

                                        <select class="form-control" name="state">
                                            <option value="0">在售</option>
                                            <option value="1">下架</option>
                                            <option value="2">预售</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>描述</td>
                                    <td>
                                        <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>商品详情</td>
                                    <td colspan="2">

                                        <script type="text/plain" id="myEditor" style="width:800px;height:240px;">
                                            <p></p>
                                        </script>

                                    </td>

                                </tr>

                            </table>
                            <input type="submit" >
                            <br><br><br><br><br><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>

    @endsection

@section('footJS')

<script src="{{url('zhuazi')}}/js/AddGoods.js"></script>

                                        {{--富编辑器js--}}
<link href="{{url('zhuazi/js/uedit')}}/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="{{url('zhuazi/js/uedit')}}/loading.css">
<script type="text/javascript" src="{{url('zhuazi/js/uedit')}}/third-party/template.min.js"></script>
<script type="text/javascript" charset="utf-8" src="{{url('zhuazi/js/uedit')}}/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="{{url('zhuazi/js/uedit')}}/umeditor.js"></script>
<script type="text/javascript" src="{{url('zhuazi/js/uedit')}}/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src='{{url('zhuazi/js/uedit')}}/loading.js'></script>




 @endsection


