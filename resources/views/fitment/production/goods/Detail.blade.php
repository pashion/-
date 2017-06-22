<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>商品详情</h3>
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

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ID:{{$data['id']}}</h2>
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

                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="product-image">
                            <img src="{{url('zhuazi')}}/images/{{$data['pic']}}" alt="..." />
                        </div>
                        <div class="product_gallery">
                            <a>
                                <img src="{{url('zhuazi')}}/images/prod-2.jpg" alt="GGGGG" />
                            </a>
                            <a>
                                <img src="{{url('zhuazi')}}/images/prod-3.jpg" alt="..." />
                            </a>
                            <a>
                                <img src="{{url('zhuazi')}}/images/prod-4.jpg" alt="..." />
                            </a>
                            <a>
                                <img src="{{url('zhuazi')}}/images/prod-5.jpg" alt="..." />
                            </a>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                        <h3 class="prod_title">{{$data['goods']}}</h3>

                        <p>{{$data['desr']}}</p>
                        <br />

                        {{--遍历属性--}}
                        <div class="">
                            @foreach($headArr as $headv)
                                <h2>{{$headv['name']}} <small></small></h2>
                                <ul class="list-inline prod_size">
                                    @foreach($parArr as $prav)
                                        @if($prav['hid'] === $headv['id'])
                                            <li>
                                                <button type="button" class="btn btn-default btn-xs">{{$prav['name']}}</button>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>


                        <div class="">
                            <div class="product_price">
                                <h1 class="price">{{$mPrice}}</h1>
                                <span class="price-tax"></span>
                                <br>
                            </div>
                        </div>

                        <div class="">
                            <button type="button" class="btn btn-default btn-lg">Add to Cart</button>
                            <button type="button" class="btn btn-default btn-lg">Add to Wishlist</button>
                        </div>

                        <div class="product_social">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-envelope-square"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-rss-square"></i></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab"data-toggle="tab" aria-expanded="true">价格详情</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">规格详情</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">评论</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                    <h2>属性价格</h2>

                                    <table id="priceType" class="table table-bordered">
                                        <thead>
                                        <tr>

                                            <th>规格</th>
                                            <th>价格</th>
                                            <th >库存</th>
                                            <th width="20%">添加时间</th>
                                            <th width="20%">修改时间</th>
                                            <th width="13%">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($price as $v)
                                        <tr>
                                            <td>{{$v['bunch_name']}}</td>
                                            <td>${{$v['price']}}</td>
                                            <td>{{$v['store']}}</td>
                                            <td>{{$v['created_at']}}</td>
                                            <td>{{$v['updated_at']}}</td>

                                            <td>
                                                <button type="button" class="btn btn-info btn-xs edit">修改</button>
                                                <button type="button" class="btn btn-danger btn-xs delete">删除</button>

                                                <button type="button" style="display:none;" class="btn btn-info btn-xs seva">保存</button>
                                                <button type="button" style="display:none;" class="btn btn-danger btn-xs  concel" >取消</button>
                                            </td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                    <h2>属性分类</h2>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>类型</th>
                                            <th>属性</th>
                                            <th>操作</th>
                                    <tbody>
                                            @foreach($headArr as $headv)
                                                <tr>
                                                <td>{{$headv['name']}} <small></small></td>
                                                <td>
                                                    @foreach($parArr as $prav)
                                                        @if($prav['hid'] === $headv['id'])
                                                                <button type="button" class="btn btn-default btn-xs">{{$prav['name']}}</button>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                    <td><button class="btn btn-default " type="submit">添加</button></td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                        </tr>
                                    </table>


                                    <h2>规格参数</h2>
                                    <table>
                                        <tr>
                                            <td></td>
                                        </tr>


                                    </table>
                                </div>



                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                    <h2></h2>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br>

<script src="{{url('zhuazi')}}/js/GoodsDetail.js"></script>