@extends('web.layout.selfconmit')

@section('title','活动专区')

@section('content')
                            
                            
 <div class="cont-main">
                    <div class="main-wrap mt15" style="border: 0px;">
                              <ul class="sui-nav nav-tabs" style="margin-top:0px;width: 1000px;margin-left: 30px;">
                                  <li   style="margin-left: -5px;"><a href="{{url('web/order')}}" ><h4 style="line-height: 10px; font-weight:800;">所有订单</h4><span style="margin-left: 20px;color: #ccc;">|</span></a></li>
                                   <li class="active"><a href="{{url('web/willgoods')}}" >待发货<span style="margin-left: 20px;color: #ccc;">|</span></a></li>
                                   <li class="active"><a href="{{url('web/willgetgoods')}}" >已发货<span style="margin-left: 20px;color: #ccc;">|</span></a></li>
                                    <li class="active"><a href="{{url('web/susess')}}" >已完成<span style="margin-left: 20px;color: #ccc;">|</span></a></li>
                                    <li class="active"><a href="{{url('web/willtalking')}}" >待评价<span style="margin-left: 20px;color: #ccc;">|</span></a></li>
                                </ul>
                            <div class="profile-info">
                                <div class="control-group clearfix " style="width: 1020px;margin-bottom: 0px;">
                                    <div style="margin-top: -60px";>
                                        <div style="float:right;display: inline;margin-left:60px;display: inline-block;height: 25px;margin-right: -5px;padding-top: 10px;"> 
                                        <img src="img/trash-拷贝.png"  style="height: 10px;width: 10px;" />
                                               <font style="">订单回收站</font>
                                        </div> 
                                     </div>
                                    
                                </div>
                            </div>
                            <div style="margin-left: 30px;height: 25px;" >
                                <form class="form-inline" action="{{url('web/order')}}" method="get">
                                  <div class="form-group">
                                    <label for="exampleInputName2">搜索:</label>
                                    <input type="text" style="width: 200px;height: 25px;font-size: 12px;" id="exampleInputName2" placeholder="请输入商品订单号名字" name="keywords">
                                  </div>
                                  <button type="submit" style="height: 100%;margin-left: -5px;border: 1px #ccc solid;font-size: 12px;color:#353535;background-color: #f2f2f2;width: 100px;">查询</button>
                                </form>
                                                       
                            </div>
                            
                            <div class="tab-content" style="width: 1000px;margin-top: 10px;border:1px #fff solid; border-top:transparent;margin-left: 30px;">
                                  <div id="index" class="tab-pane " style="padding: 40px 30px;">
                                  </div>
                                 <div id="profile" class="tab-pane active" style="padding: 00px 00px;">
                                 <div style="width: 100%;height: 50px;border: 1px #ccc solid;line-height: 50px;background-color: #fdfdfd">
                                    <span style="color: #858585;margin-left: 120px;">宝贝</span>
                                    <span style="color: #858585;margin-left: 220px;">单价(元)</span>
                                    <span style="color: #858585;margin-left: 20px;">数量</span>
                                    <span style="color: #858585;margin-left: 95px;">商品操作</span>
                                    <span style="color: #858585;margin-left: 50px;">实付款(元)</span>
                                    <span style="color: #858585;margin-left: 45px;">交易状态</span>
                                    <span style="color: #858585;margin-left: 45px;">交易操作</span>
                                 </div>
                                 
                                <?php
                                     $order_status=array('0'=>'待发货','1'=>'待收货','2'=>'完成订单','3'=>'取消');
                                    $ruturn_status=array('0'=>'不退货','1'=>'退货');
                                    $comment_status=array('0'=>'去评论','1'=>'已评论');
                                    // var_dump($orderData);

                                ?>
                                 <div style="margin-top: 30px;width: 100%;height: 250px;border: 1px #addff8 solid;">
                                 <div style="width: 100%;height: 50px;background-color: #eaf9ff;vertical-align: middle;font-size: 12px;">
                                <!-- <input type="checkbox" style="line-height: 50px;margin-left: 20px;"/> -->
                                @foreach($data as $v)
                                <?php
                                    $str = $v['goods_pic'];
                                    $array = explode(',', $str);
                                ?>
                                 <div style="margin-top: 30px;width: 100%;height: 250px;border: 1px #addff8 solid;">
                                 <div style="width: 100%;height: 50px;background-color: #eaf9ff;vertical-align: middle;font-size: 12px;">
                                <input type="checkbox" style="line-height: 50px;margin-left: 20px;"/>
                                 <span style="line-height: 50px;">{{$v->created_at}}</span>
                                  <span style="line-height: 50px;margin-left: 20px;">订单号：{{$v->order_id}}</span>

                                <img src="{{url('web')}}/images/speech-bubble-3-拷贝.png" style="margin-left: 100px;"/> <span>和我联系</span>
                                 </div> 
                                  <div style="float: left;width: 65%;height: 93px;">
                                    <div style="width: 100%; margin-top:0px;">
                                    <img src="{{url('goodsPic')}}/{{$array['0']}}" style="height: 100px;float: left;margin-left: 20px;margin-top: 30px;" />
                                    <dl style="width: 220px;float: left;margin-left: 20px;margin-top: 70px;">{{$v->goods_name}}</dl>

                                     <dl style="float: left;margin-left: 20px;margin-top: 70px;">{{$v->cargo_price}}</dl>
                               
                                          <span style="margin-left: 50px;line-height: 160px;">{{$v->commodity_number}}</span>
                               
                                   
                                    
                                    
                                    <dl style="float: right;margin-right: 20px;margin-top: 50px;">退款/退货
                                    <br />投诉卖家
                                    <br>
                                    退运保险
                                    </dl>
                                    </div>   
                                 </div> 
                                 <div style="float: left;border-left: 1px #addff8 solid;width: 11%;height:200px;text-align: center;">
                                    
                                    <span style="font-weight: bold;margin-top: 60px;display: block;">{{$v->cargo_price}}</span>
                                    <dl>(含运费:00)</dl>
                                    
                                 </div>
                                 <div style="float: left;border-left: 1px #addff8 solid;width: 11%;height:200px;text-align: center ;">
                                    <dl style="margin-top: 50px;">{{$order_status[$v["order_status"]]}}</dl>
                                    <dl><a href="{{url('web/detail')}}/{{$v->order_id}}">查看详情</a></dl>
                                    
                                 </div>
                                 <div style="float: left;border-left: 1px #addff8 solid;width: 11%;height:200px;text-align: center ;">
                                    <dl style="margin-top: 50px;">还有9天10时4分</dl>
                                    <button style="color: fff;background-color: #65b5ff;border: 0px;padding: 4px;margin-top: 5px;">查看订单</button>
                                 </div>
                                 </div>
                                 @endforeach
                                 <div style="float: right";>
                                     {!! $data->appends($request)->links() !!}
                                 </div>
                                 
                            </div>       
 @endsection

