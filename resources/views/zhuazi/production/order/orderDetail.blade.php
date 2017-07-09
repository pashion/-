

@extends('zhuazi.layout.master');
@section('title' ,'订单首页')
@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>订单管理</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{'/'}}">回到首页</a>
                            </li>
                            <li><a href="{{'order'}}">添加评论</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div>
                     <?php
                        $order_status=array('0'=>'待发货','1'=>'待收货','2'=>'完成','3'=>'取消');
                        $ruturn_status=array('0'=>'不退货','1'=>'退货');
                        $comment_status=array('0'=>'未评论','1'=>'已评论');
                        // var_dump($orderData);

                    ?>
                    <form class="form-inline" action="/order" method="get">
                      <div class="form-group">
                        <label for="exampleInputName2">搜索:</label>
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="请输入订单号" name="keywords">
                      </div>
                      <button type="submit" class="btn btn-default">查询</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">详情id </th>
                            <th class="column-title">订单id </th>
                            <th class="column-title">商品id </th>
                            <th class="column-title">商品名 </th>
                            <th class="column-title">物流状态</th>
                            <th class="column-title">数量 </th>
                            <th class="column-title">价格</th>
                            <th class="column-title">图片</th>
                            <th class="column-title">退货状态</th>
                            <th class="column-title">评论状态</th>
                            <th class="column-title">生成时间</th>
                            <th class="column-title">修改时间</th>
                            <th class="column-title">操作</th>
                        </tr> 
                        </thead>
                        <tbody>
                        
                            @foreach($orderData as $v)
                                <?php
                                $str = $v['goods_pic'];
                                $array = explode(',', $str);
                                ?>
                                <tr class="even pointer" id="tr_{{$v['id']}}">
                                    <td >{{$v['id']}}</td>
                                    <td >{{$v['order_id']}}</td>
                                    <td >{{$v['goods_id']}}</td>
                                    <td >{{$v['goods_name']}}</td>
                                    <td >{{$order_status[$v["order_status"]]}}</td>
                                    <td >{{$v['commodity_number']}}</td>
                                    <td >{{$v['cargo_price']}}</td>
                                    <td ><img src='{{url("goodsPic")}}/{{$array["0"]}}' style="height: 100px;float: left;margin-left: 20px;margin-top: 30px;"></td>
                                    <td >{{$ruturn_status[$v["ruturn_status"]]}}</td>
                                    <td >{{$comment_status[$v["comment_status"]]}}</td>
                                    <td >{{$v['created_at']}}</td>
                                    <td class="a-right a-right ">{{$v['updated_at']}}</td>
                                    <td class="last">
                                        <a href="detail/{{$v->id}}/edit" class="btn btn-primary btn-sm">编辑</a>
                                        <a href="javascript:;" onclick="DdelData('{{$v->id}}')" class="btn btn-primary btn-sm">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $orderData->appends($request)->links() !!}
                </div>


            </div>
        </div>
    </div>







@endsection



