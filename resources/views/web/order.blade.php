@extends('web.layout.master')

@section('title','订单页面')

@section('content')
   
   <body>
    <div class="header">
        <div class="header_top">
            <div class="top_info clearfix">
                <div class="logo_style l_f"><a href="#"><img src="images/logo.jpg" /></a></div>
                <div class="Search_style l_f">
                    <form>
                        <div class="select">
                            <select name="" size="1">
                                <option value="1">设计精髓</option>
                                <option value="2">设计店家</option>
                            </select>
                        </div>
                        <input name="" type="text"  class="add_Search"/>
                        <input name="" type="submit"  value="" class="submit_Search"/>
                    </form>
                </div>
                <div class="Cart_user r_f">
                    <div class="Cart_Quantity "><span class="number">0</span></div>
                    <div class="header_operating l_f">
                        <span class="header_touxiang"><img src="images/touxiang_03.png" /></span>
                        <a href="#">登录</a><a href="@">注册</a>
                    </div>
                </div>
            </div>
            <div class="header_menu">
                <!--菜单导航栏-->
                <ul class="menu" id="nav">
                    <li class="nLi"><a href="#">网站首页</a></li>
                    <li class="nLi"><a href="#">设计精粹</a></li>
                    <li class="nLi Down"><a href="#">场景方案</a><em class="icon_jiantou"></em>
                        <ul class="sub">
                            <li><a href="#">新闻首页</a></li>
                            <li><a href="#">新闻人物</a></li>
                            <li><a href="#">新闻电视</a></li>
                            <li><a href="#">新闻图片</a></li>
                            <li><a href="#">新闻视频</a></li>
                            <li><a href="# ">新闻专题</a></li>
                        </ul>
                    </li>
                    <li class="nLi Down"><a href="#">单品大库</a><em class="icon_jiantou"></em></li>
                    <li class="nLi Down"><a href="#">奇货可享</a><em class="icon_jiantou"></em></li>
                    <li class="nLi Down"><a href="#">找找感觉</a><em class="icon_jiantou"></em></li>
                </ul>
                <script>jQuery("#nav").slide({ type:"menu", titCell:".nLi", targetCell:".sub",effect:"slideDown",delayTime:300,triggerTime:0,returnDefault:false,trigger:"click"});</script>
                <div class="q_code">
                    <a href="" class="q_code_applnk" rel="nofollow"></a>
                    <div class="q_code_layer" style="display: none;">
                        <a href="" class="qcode_lnk" rel="nofollow">
                            <span class="qcode_title">只分享装修干货</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-md-2"></div>
        <div class="col-xs-8 col-sm-8 col-md-10">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                新增收货地址
            </button>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">收货地址</h4>
                        </div>
                        <form id='form'>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @if (session('user'))
                                <input type="hidden" name="user_id" id="user_id" value="{{session('user')[0]->id}}">
                            @endif
                            <div class="modal-body">
            
                                <div class="form-group ">
                                    <label for="exampleInputName2"><span style="color: red">*</span>收货人：</label>
                                    <input type="text" style="border:1px solid #e6e6e6" name="get_name" class="form-control" id="get_name" >
                                </div>

                                <div class="form-group ">
                                    <label for="exampleInputName2"><span style="color: red">*</span>电话：</label>
                                    <input type="text" name="phone" class="form-control" style="border:1px solid #e6e6e6" id="phone" >
                                </div>

                                <div class="form-group ">
                                    <label for="exampleInputName2"><span style="color: red">*</span>邮政编码：</label>
                                    <input type="text" name="code" class="form-control" style="border:1px solid #e6e6e6" id="code" >
                                </div>

                                <div class="form-group select" id="address">
                                    <label for="exampleInputName2"><span style="color: red">*</span>所在地区：</label>
                                    <select class="form-control"  id="province" name="province">
                                        <option value="-1">--请选择省份--</option>
                                    </select>
                
                                </div>

                                <div class="form-group ">
                                    <label for="exampleInputName2"><span style="color: red">*</span>详细地址：</label>
                                    <input type="text" style="border:1px solid #e6e6e6" class="form-control" name="detail_address" id="detail_address">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="保存收货地址">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <script type="text/javascript">
                //这里的JS是进行查询省市区

                $.get(
                    "{{url('/order/address/province')}}",
                    {upid:0},
                    function (data) {

                        var str = '';
                        for ( var i =0;i<data.length; i++  ) {
                            str += '<option id="'+data[i]['id']+'" value="'+data[i]['id']+'">'+data[i]['name']+'</option>';
                        }
                        $('#province').append(str);
                    },
                    'json'
                );


                $('.select').on('change','select',function () {
                    var id = $(this).val();
                    console.log(id);
                    var that = $(this);

                    var size = $('#address select').length;
                    if (size <3) {
                        switch (size) {
                            case 1:
                                var selectName = 'city';
                                var selectId = 'city';
                                break;
                            case 2:
                                var selectName = 'county';
                                var selectId = 'county';
                                break;
                        }

                        that.nextAll('select').remove();
                        $.get(
                            "{{url('/order/address/province')}}",
                            {upid:id},
                            function (data) {
                                var str = '<select class="form-control" name="'+selectName+'" id="'+selectId+'">';
                                str += '<option value="-1">--请选择--</option>'
                                for ( var i=0;i<data.length;i++ ) {
                                    str += '<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>';
                                }
                                str += '</select>';
                                that.after(str);
                            },
                            'json'
                        );
                    }
        
                });

              

                $("#form").submit( function () {
                    //获取用户填写的地址西
                    var name = $('#get_name').val();
                    var user_id = $('#user_id').val();
                    var phone = $('#phone').val();
                    var code = $('#code').val();
                    var province = $("#province option:selected").text();
                    var city = $("#city option:selected").text();
                    var county = $("#county option:selected").text();
                    var detail_address = $('#detail_address').val();
                    $.post(
                        "{{url('/order/address/addaddress')}}",
                        {   '_token':'{{csrf_token()}}',
                            'get_name':name,
                            'user_id':user_id,
                            'phone':phone,
                            'code':code,
                            'province':province,
                            'city':city,
                            'county':county,
                            'detail_address':detail_address
                        },
                        function (data) {
                            if ( data == 1 ) {
                                // alert('添加成功');
                                window.location.reload();
                                // location.replace(location.href);
                            }else{
                                alert('添加失败');

                            }
                        },
                        'json'
                    );

                } );


                //这里用AJAX执行改变默认地址状态
                $('.status').on('click',function () {
                    var aid = $(this).attr('id');
                    $.get(
                        'status',
                        {id:aid},
                        function (data) {
                            if ( data == 1 ) {
                                alert('默认成功');window.location.reload();
                            }else{
                                alert('默认地址失败');
                            }
                        },
                        'json'
                    );

                });


        </script>       
            <hr>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Success:</span>
                    {{session('success')}}
                </div>
            @endif
             <?php 
                // dd($data);
                $userId = $data['user_id'];

                $users=DB::table('users_address')
                        ->where('user_id','=',$userId)
                        ->get();
               // dd($orderAddress);
             ?>
            @foreach ( $users as $user )
                <div class="address" style="border: 1px solid #88C523">
        
                    <div class="text-right" >
                        <a href="{{url('/order/address/deladdress')}}/{{$user->id}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                    </div>
                    <div style="padding: 10px">
                        <address>
                            <strong>收件人：</strong>{{$user->get_name}}<br>
                            <strong>收件人地址：</strong>
                            {{$user->province}}{{$user->city}}{{$user->county}}{{$user->detaile_address}}
                            <br>
                            <strong>手机：</strong>{{$user->phone}}<br>
                            <strong>邮编：</strong>{{$user->code}}<br>
                        </address>
                        <div class="text-right">
                            @if ( $user->status == 1  )
                                <button type="button" class="btn btn-primary btn-sm">默认地址</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            @else
                                <button type="button" id="{{$user->id}}"  class="btn btn-primary btn-sm status">设为默认地址</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            @endif
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal-{{$user->id}}"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal-{{$user->id}}-Label">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-left" id="myModal-{{$user->id}}-Label">收货地址</h4>
                                            </div>
                                            <form action="{{url('user/detail/updateaddress')}}" method="post">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="id"  value="{{$user->id}}">
                                                <div class="modal-body">
            
                                                    <div class="form-group text-left ">
                                                        <label for="exampleInputName2"><span style="color: red">*</span>收货人：</label>
                                                        <input type="text" style="border:1px solid #e6e6e6" name="get_name" class="form-control" value="{{$user->get_name}}" >
                                                    </div>

                                                    <div class="form-group text-left ">
                                                        <label for="exampleInputName2"><span style="color: red">*</span>电话：</label>
                                                        <input type="text" name="phone" style="border:1px solid #e6e6e6" class="form-control" value="{{$user->phone}}" >
                                                    </div>

                                                    <div class="form-group text-left ">
                                                        <label for="exampleInputName2"><span style="color: red">*</span>邮政编码：</label>
                                                        <input type="text" name="code" style="border:1px solid #e6e6e6" class="form-control" value="{{$user->code}}" >
                                                    </div>

                                                    <div class="form-group text-left " >
                                                        <label for="exampleInputName2"><span style="color: red">*</span>所在地区：</label>
                                                        <select class="form-control" name="province">
                                                            <option value="{{$user->province}}">{{$user->province}}</option>
                                                        </select>
                                                        <select class="form-control" name="city">
                                                            <option value="{{$user->city}}">{{$user->city}}</option>
                                                        </select>
                                                        <select class="form-control" name="county">
                                                            <option value="{{$user->county}}">{{$user->county}}</option>
                                                        </select>
                
                                                    </div>

                                                    <div class="form-group text-left ">
                                                        <label for="exampleInputName2" ><span style="color: red">*</span>详细地址：</label>
                                                        <input type="text" style="border:1px solid #e6e6e6" class="form-control" name="detaile_address" value="{{$user->detaile_address}}">
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" value="保存收货地址">
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>&nbsp;&nbsp;&nbsp;&nbsp;


                        </div>
                    </div>
                </div>
                <hr>
            @endforeach

            
        </div>
    </div>

    <div class="content_style clearfix" style="margin-left:240px;">
            <?php 
            // dd($data);
            $userId = $data['user_id'];

            $orderAddress=DB::table('users_address')
                    ->where('user_id','=',$userId)
                    ->get();
           // dd($orderAddress);
             ?>
             <form action="{{url('order/work')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="user_id" value="{{$data['user_id']}}">
                <input type="hidden" name="goods_id" value="{{$data['gid']}}">
                <input type="hidden" name="num" value="{{$data['num']}}">
                <input type="hidden" name="num_bunch" value="{{$data['num_bunch']}}">
                <input type="hidden" name="address_id" value="{{$orderAddress['0']->id}}">
                 <div class="form-group">
                    <label for="exampleInputEmail1">收货人
                    :</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="get_name" value="{{$orderAddress['0']->get_name}}">
                  <div class="form-group">
                    <label for="exampleInputEmail1">地址
                    :</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="address" value="{{$orderAddress['0']->province}}/{{$orderAddress['0']->city}}/{{$orderAddress['0']->county}}/{{$orderAddress['0']->detaile_address}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">收货人电话
                    :</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="phone" value="{{$orderAddress['0']->phone}}">
                  </div>
                 
                  <button type="submit" class="btn btn-default">提交</button>
                  

                </div>

@endsection
