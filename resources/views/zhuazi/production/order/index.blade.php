@extends('zhuazi.layout.master');
@section('title' ,'订单首页')
@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>订单详情</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{'/'}}">回到首页</a>
                            </li>
                            <li><a href="{{'order'}}">查看订单</a>
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
                        $pay_type=array('0'=>'支付宝','1'=>'微信','1'=>'银行卡');
                        $pay_status=array('0'=>'未支付','1'=>'已支付','2'=>'取消支付');
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
                            <th class="column-title">订单id </th>
                            <th class="column-title">用户id </th>
                            <th class="column-title">地址id </th>
                            <th class="column-title">支付方式 </th>
                            <th class="column-title">支付状态</th>
                            <th class="column-title">总金额 </th>
                            <th class="column-title">下单时间</th>
                            <th class="column-title">修改时间</th>
                            <th class="column-title">操作</th>
                        </tr> 
                        </thead>
                        <tbody>
                        
                            @foreach($orderData as $v)
                                <tr class="even pointer" id="tr_{{$v['id']}}">
                                    <td >{{$v['id']}}</td>
                                    <td >{{$v['user_id']}}</td>
                                    <td >{{$v['address_id']}}</td>
                                    <td >{{$pay_type[$v["pay_type"]]}}</td>
                                    <td >{{$pay_status[$v["pay_status"]]}}</td>
                                    <td >{{$v['tatal_amount']}}</td>
                                    <td >{{$v['created_at']}}</td>
                                    <td class="a-right a-right ">{{$v['updated_at']}}</td>
                                    <td class="last">
                                        <a href="talking/{{$v->id}}/edit" class="btn btn-primary btn-sm">编辑</a>
                                        <a href="javascript:;" onclick="TdelData('{{$v->id}}')" class="btn btn-primary btn-sm">删除</a>
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



