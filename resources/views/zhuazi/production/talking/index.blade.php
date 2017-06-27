@extends('zhuazi.layout.master');
@section('title' ,'评论首页')
@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>评论管理</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{'/'}}">回到首页</a>
                            </li>
                            <li><a href="{{'talking/create'}}">添加评论</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th>
                                <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">评论id </th>
                            <th class="column-title">商品id </th>
                            <th class="column-title">订单id </th>
                            <th class="column-title">用户id </th>
                            <th class="column-title">评论状态 </th>
                            <th class="column-title">评论星级 </th>
                            <th class="column-title">评论内容 </th>
                            <th class="column-title">评价时间</th>
                            <th class="column-title">修改时间</th>
                            <th class="column-title">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $comment_type=array('0'=>'实名评论','1'=>'匿名评论');
                        $star=array('0'=>'1星','1'=>'2星','2'=>'3星','3'=>'4星','4'=>'5星');
                        ?>
                            @foreach($talkData as $v)
                                <tr class="even pointer" id="tr_{{$v['id']}}">
                                    <td class="a-center ">
                                        <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td >{{$v['id']}}</td>
                                    <td >{{$v['goods_id']}}</td>
                                    <td >{{$v['order_id']}}</td>
                                    <td >{{$v['user_id']}}</td>
                                    <td >{{$comment_type[$v["comment_type"]]}}</td>
                                    <td >{{$star[$v["star"]]}}</td>
                                    <td >{{$v['comment_info']}}</td>
                                    <td >{{$v['created_at']}}</td>
                                    <td class="a-right a-right ">{{$v['updated_at']}}</td>
                                    <td class="last">
                                        <a href="talking/{{$v->id}}/edit">编辑</a>
                                        <a href="javascript:;" onclick="TdelData('{{$v->id}}')">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $talkData->links() !!}
                </div>


            </div>
        </div>
    </div>







@endsection


