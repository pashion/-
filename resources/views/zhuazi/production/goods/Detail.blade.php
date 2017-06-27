<link href="{{url('zhuazi')}}/css/goodsEdit.css" rel="stylesheet">


<div class="">

    <div class="page-title">
        <div class="title_left">
            <h3>商品信息<small></small></h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <input type="hidden" id="token" name="token" value="{{csrf_token()}}">
    <input type="file" name="picFile" id="addPicFile">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 id="goodsID" data="{{$goodsData['id']}} ">商品ID: {{$goodsData['id']}} </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <button id='infoEditBtn' type="button" class="btn btn-success ">修改</button>
                        <button id="infoEditBtnAff" type="button" class="btn btn-warning ">确定</button>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-3 mail_list_column">
                            <button id="compose" class="btn btn-sm btn-success btn-block addEditGoodPic" type="button">添加图片</button>
                                <div class="mail_list picBox">

                                    @foreach($picData as $v)
                                        <img src="goodsPic/{{$v}}" alt="..." class="img-thumbnail">
                                    @endforeach

                                </div>
                        </div>
                        <!-- /MAIL LIST -->

                        <!-- CONTENT MAIL -->
                        <div class="col-sm-9 mail_view">
                            <div class="inbox-body">
                                <div class="mail_heading row">

                                    <table style="margin-left:15px; width:700px" class="table table-hover">
                                        <tr id="goodNameTr">
                                            <td width="100"><h2>商品名称 :</h2></td>
                                            <td>
                                                <h2 class="lineTextBox">
                                                    <div  class="pull-left">{{$goodsData['goods']}}</div>
                                                    <input type="text" class="form-control inputText">
                                                </h2>
                                                <div class="editBtnMinBox">
                                                    <button type="button" class="btn btn-default btn-sm nameBtn">修改</button>
                                                    <div class="saveAnCloseBox">
                                                        <button type="button" class="btn btn-default btn-sm nameBtnSave">保存</button>
                                                        <button type="button" class="btn btn-default btn-sm btnCancle">取消</button>
                                                    </div>
                                                    <div class="pull-left saveMig"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h2>价格 :</h2></td>
                                            <td>
                                                <h2 class="lineTextBox">
                                                    <div class="pull-left">{{$goodsData['price']}}</div>
                                                    <input type="text" class="form-control inputText">
                                                </h2>
                                                <div class="editBtnMinBox">
                                                    <button type="button" class="btn btn-default btn-sm nameBtn">修改</button>
                                                    <div class="saveAnCloseBox">
                                                        <button type="button" class="btn btn-default btn-sm priceBtnSave">保存</button>
                                                        <button type="button" class="btn btn-default btn-sm btnCancle">取消</button>
                                                    </div>
                                                    <div class="pull-left saveMig"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h2>总库存 :</h2></td>
                                            <td>
                                                <h2 class="lineTextBox">
                                                    <div  class="pull-left">{{$goodsData['stockall']}}</div>
                                                    <input type="text" class="form-control inputText">
                                                </h2>
                                                <div class="editBtnMinBox">
                                                    <button type="button" class="btn btn-default btn-sm nameBtn">修改</button>
                                                    <div class="saveAnCloseBox">
                                                        <button type="button" class="btn btn-default btn-sm stockBtnSave">保存</button>
                                                        <button type="button" class="btn btn-default btn-sm btnCancle">取消</button>
                                                    </div>
                                                    <div class="pull-left saveMig"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h2>风格 :</h2></td>
                                            <td>
                                                <h2 class="lineTextBox">
                                                    <div id="goodsStyleText" class="pull-left">{{$styleNameArr[0][0]['name']}}</div>
                                                    <div class="selRadio">
                                                    </div>
                                                </h2>
                                                <div class="editBtnMinBox">
                                                    <button type="button" class="btn btn-default btn-sm styleEditBtn">修改</button>
                                                    <div class="saveAnCloseBox">
                                                        <button type="button" class="btn btn-default btn-sm sytleBtnSave">保存</button>
                                                        <button type="button" class="btn btn-default btn-sm btnCancle">取消</button>
                                                    </div>
                                                    <div class="pull-left saveMig"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h2>区域 :</h2></td>
                                            <td>
                                                <h2 class="lineTextBox">
                                                    <div id="goodsAreaText" class="pull-left">{{$styleNameArr[1][0]['name']}}</div>
                                                </h2>
                                                <div class="editBtnMinBox">
                                                    <button type="button" class="btn btn-default btn-sm areaEditBtn">修改</button>
                                                    <div class="saveAnCloseBox">
                                                        <button type="button" class="btn btn-default btn-sm areaBtnSave">保存</button>
                                                        <button type="button" class="btn btn-default btn-sm btnCancle">取消</button>
                                                    </div>
                                                    <div class="pull-left saveMig"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h2>种类 :</h2></td>
                                            <td>
                                                <h2 id="goodsKindText" >{{$styleNameArr[2][0]['name']}}</h2>
                                                <div><button style="display:none;" type="button" class="btn btn-info editBtn nameBtn">修改</button></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h2>描述 :</h2></td>
                                            <td>
                                                <h2 class="lineTextBox">
                                                    <div  class="pull-left">{{$goodsData['desr']}}</div>
                                                    <input type="text" class="form-control inputText">
                                                </h2>
                                                <div class="editBtnMinBox">
                                                    <button type="button" class="btn btn-default btn-sm nameBtn">修改</button>
                                                    <div class="saveAnCloseBox">
                                                        <button type="button" class="btn btn-default btn-sm desrBtnSave">保存</button>
                                                        <button type="button" class="btn btn-default btn-sm btnCancle">取消</button>
                                                    </div>
                                                    <div class="pull-left saveMig"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h2>状态 :</h2></td><td>
                                                <h2 class="lineTextBox">
                                                    <div  class="pull-left">
                                                        @if($goodsData['state'] == 0 )
                                                            <span style="color:green;">在售</span>
                                                        @elseif($goodsData['state'] == 1)
                                                            <span style="color:red;">下架</span>
                                                        @elseif($goodsData['state'] == 2)
                                                            <span style="color:black">缺货</span>
                                                        @endif
                                                    </div>
                                                    <select class="stateList" name="status" id="">
                                                        <option value="0">在售</option>
                                                        <option value="1">下架</option>
                                                        <option value="2">缺货</option>
                                                    </select>
                                                </h2>
                                                <div class="editBtnMinBox">
                                                    <button type="button" class="btn btn-default btn-sm nameBtn">修改</button>
                                                    <div class="saveAnCloseBox">
                                                        <button type="button" class="btn btn-default btn-sm statuBtnSave">保存</button>
                                                        <button type="button" class="btn btn-default btn-sm btnCancle">取消</button>
                                                    </div>
                                                    <div class="pull-left saveMig"></div>
                                                </div>
                                            </td>
                                        </tr>

                                    </table>

                                </div>

                                <div class="view-mail">

                                    <div class="col-md-12">

                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">属性选项</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">规格</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">选项价格</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">评论记录</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">销售记录</a>
                                                </li>

                                            </ul>
                                            <div id="myTabContent" class="tab-content">

                                                {{--选项--}}
                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                                    @if($headKey != null)
                                                        @foreach($headKey as  $v)
                                                            <table>
                                                                <tr>
                                                                    <td style="font-size:15px;">{{$v}}</td>
                                                                    <td>
                                                                        <div style="margin:10px">
                                                                        @foreach($selData as  $vv)
                                                                            @if($vv->headName == $v)
                                                                             <div class="pull-left"><a class="btn btn-default">{{$vv->name}}<a></div>
                                                                            @endif
                                                                        @endforeach
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        @endforeach
                                                    @else
                                                        <div>无</div>
                                                    @endif

                                                </div>


                                                {{--规格--}}
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                                    @foreach($specData as $v)
                                                        <div class="pull-left btn btn-default" style="margin:10px; background:rgb();  padding:5px;  class="clearfix">
                                                            <div class="pull-left"><h4>{{$v->name}} : </h4></div>
                                                            <div class="pull-left"><h4>{{$v->specName}}
                                                                    @if($v->specName  == '') 无 @endif
                                                                </h4></div>
                                                        </div>
                                                    @endforeach


                                                </div>

                                            {{--选项价格--}}
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>选项链</th>
                                                            <th>价格</th>
                                                            <th>库存</th>
                                                            <th>操作</th>
                                                        </tr>
                                                        @foreach($goodSelPrice as $v)
                                                            <tr>
                                                                <td>{{$v['str_bunch']}}</td><td>{{$v['price']}}</td><td>{{$v['store']}}</td><td>删除</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>


                                            {{--评论记录--}}
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                                评论记录
                                            </div>

                                            {{--销售记录--}}
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                                                销售记录
                                            </div>

                                            </div>
                                        </div>



                                </div>

                            </div>

                        </div>
                        <!-- /CONTENT MAIL -->


                    </div>
                </div>
                <br>
                {{--详情--}}
                <div class="alert alert-success">
                    <h2>商品详情</h2>
                </div>
                <div style="width:500px;">{!!  $detail[0]['content'] !!}</div>

            </div>

        </div>
        </div>
</div>
    <br><br><br><br><br><br><br><br><br>
</div>
<!-- /page content -->

<!-- footer content -->
<footer>

    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- compose -->
<div class="compose col-md-6 col-xs-12">
    <div class="compose-header">
        New Message
        <button type="button" class="close compose-close">
            <span>×</span>
        </button>
    </div>

    <div class="compose-body">
        <div id="alerts"></div>

        <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                <ul class="dropdown-menu">
                </ul>
            </div>

            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a data-edit="fontSize 5">
                            <p style="font-size:17px">Huge</p>
                        </a>
                    </li>
                    <li>
                        <a data-edit="fontSize 3">
                            <p style="font-size:14px">Normal</p>
                        </a>
                    </li>
                    <li>
                        <a data-edit="fontSize 1">
                            <p style="font-size:11px">Small</p>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="btn-group">
                <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
            </div>

            <div class="btn-group">
                <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
            </div>

            <div class="btn-group">
                <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
            </div>

            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                <div class="dropdown-menu input-append">
                    <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                    <button class="btn" type="button">Add</button>
                </div>
                <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
            </div>

            <div class="btn-group">
                <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
            </div>

            <div class="btn-group">
                <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
            </div>
        </div>

        <div id="editor" class="editor-wrapper"></div>
    </div>

    <div class="compose-footer">
        <button id="send" class="btn btn-sm btn-success" type="button">Send</button>
    </div>



</div>




<script src="{{url('zhuazi')}}/js/GoodsDetail.js"></script>