@extends('zhuazi.layout.master')


@section('content')

    <div class="">
        <div class="page-title">


        </div>

        <div class="clearfix"></div>




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


                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="x_content">

                        {{--商品信息填写--}}

                        <form id="formCon" action='../goods' enctype="multipart/form-data" method="post" name="fileinfo">
                            <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">


                            <table class="table">

                                <tr id="goodName">
                                    <td width="10%">商品名称</td>
                                    <td width="40%"><input name="goodName" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"></td>
                                    <td width="30%">必须输入商品名</td>
                                </tr>
                                <tr id="price">
                                    <td>基本价格</td>
                                    <td>
                                        <input name="price" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </td>
                                    <td>必须,你必须输入一个商品价格</td>
                                </tr>
                                <tr id="stockAll">
                                    <td>库存数量</td>
                                    <td>
                                        <input name="stockAll" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                    <td>必须,你必须输入有关该商品的所有库存,最多输入999999</td>
                                </tr>

                                @foreach($type as $typeV)
                                <tr id="{{$typeV['name']}}">
                                    <td>{{$typeV['name']}}</td>

                                    <td data="{{$typeV['name']}}" colspan="2">

                                    @foreach($typeTou as $touV)
                                        @if($typeV['id'] == $touV['tid'] )
                                            <label name='{{$typeV['name']}}' class="disStyle">
                                                <div class="iradio_flat-green" style="position: relative;">
                                                    <input type="radio" class="flat " name="{{$typeV['name']}}" value="{{$touV['id']}}"  style="position: absolute; opacity: 0;">
                                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
                                                    </ins></div>   {{$touV['name']}} &nbsp &nbsp
                                            </label>
                                        @endif
                                    @endforeach

                                        <span>你必须选择指定标签,来定位你的商品</span>
                                    </td>
                                    <td></td>
                                </tr>
                                @endforeach
                                <tr id="goodKind">
                                    <td><h2>商品种类</h2></td>
                                    <td>
                                        <table>
                                            <tr >
                                                <td>
                                                    <select tableName="type" style="width:100px;" class="select2_group form-control sele">
                                                        <option value="">请选择</option>
                                                        @foreach($tType as $tTypeV)
                                                            <option value="{{$tTypeV["id"]}}">{{$tTypeV['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                     </td>
                                    <td>必须, 你必须选择一个商品种类来完善商品信息</td>
                                </tr>
                                <tr id="goodParTr">
                                    <td><h2>商品属性</h2></td>
                                    <td class="selKind">
                                        <h2>无</h2>
                                    </td>
                                    <td>非必选, 如果你的商品没有选项,那么则不用添加</td>
                                </tr>

                                <tr id="goodSelTr">
                                    <td>
                                        <h2>属性选项</h2>
                                    </td>
                                    <td colspan="2">
                                        <table id="parTable" class="table">

                                        </table>
                                        <center>
                                            <a data="0" class="btn btn-default parAff" style="display:none; width:100px;" >确认</a>
                                            <span></span>
                                            <a  class="btn btn-default parEdit" style="display:none; width:100px;" >修改</a>
                                        </center>

                                    </td>
                                </tr>
                                <tr id="goodPriceTr">
                                    <td><h2>选项价格</h2></td>
                                    <td colspan="2" class="selTableTd">

                                    </td>
                                </tr>

                                <tr id="goodsSpecTr">
                                    <td>
                                        <h2>规格参数</h2>
                                    </td>
                                    <td colspan="2">
                                        <tabe id="spec">
                                            这里为必填项,请选择--商品种类--后填写
                                        </tabe>
                                    </td>
                                </tr>

                                <tr class="bg-success">
                                    <td><h2>商品状态</h2></td>
                                    <td>

                                        <select class="form-control goodState" name="state">
                                            <option value="0">在售</option>
                                            <option value="1">下架</option>
                                            <option value="2">预售</option>
                                        </select>
                                    </td>
                                    <td>默认在售</td>
                                </tr>
                                <tr id="depict">
                                    <td><h2>描述</h2></td>
                                    <td>
                                        <textarea name="desr" id="message" required="required" class="form-control desr" ></textarea>
                                    </td>
                                    <td>必须</td>
                                </tr>

                                <tr id="pic" height="100">
                                    <td><h2>商品图片</h2></td>
                                    <td colspan="2">


                                        <table>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <img id="addLog" num="0" width="100" height="100" src="{{url('zhuazi')}}/images/addPicLog.jpg" alt="">
                                                        <span class="mig" ></span>
                                                        <input type="file" class="fileUp" style="display:none;" name="pic" >
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>



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
                                        <tr>
                                        <td>

                                    <td>
                                    </tr>
                                    </table>
                                    <center>
                                    {{--<input type='submit' id='conmitData' style='width:150px; height:50px;'  class="btn btn-primary btn-lg" >--}}

                                    <a id='conmitData' style='width:150px; height:50px;'  class="btn btn-primary btn-lg" >提交</a>

                                        <span id='submitMig'></span>
                                        </center>
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


