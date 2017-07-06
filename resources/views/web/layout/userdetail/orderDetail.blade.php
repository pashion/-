@extends('web.layout.selfconmit')

@section('title','活动专区')

@section('content')
                            
                            
 <div class="cont-main">
                    <div class="main-wrap mt15" style="border: 0px;">
                              <ul class="sui-nav nav-tabs" style="margin-top:0px;width: 1000px;margin-left: 30px;">
                                  <li   style="margin-left: -5px;"><a href="#profile" data-toggle="tab">所有订单<span style="margin-left: 20px;color: #ccc;">|</span></a></li>
                                  <li class="active"><a href="#profile" data-toggle="tab">待付款<span style="margin-left: 20px;color: #ccc;">|</span></a></li>
                                   <li class="active"><a href="#profile" data-toggle="tab">待发货<span style="margin-left: 20px;color: #ccc;">|</span></a></li>
                                    <li class="active"><a href="#profile" data-toggle="tab">待发货1<span style="margin-left: 20px;color: #ccc;">|</span></a></li>
                                    <li class="active"><a href="#profile" data-toggle="tab">待评价<span style="margin-left: 20px;color: #ccc;">|</span></a></li>
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
                                <input  type="text"  placeholder="输入商品标题或者订单号进行搜索 " style="width: 200px;height: 25px;font-size: 12px;" />
                                <button style="height: 100%;margin-left: -5px;border: 1px #ccc solid;font-size: 12px;color:#353535;background-color: #f2f2f2;width: 100px;">订单搜索</button>
                                <span style="margin-left: 5px;">更多搜索条件</span>
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
                                 <div style="width: 100%;height: 0px;padding: 10px;">
                                    <span style="line-height: 20px;">全选</span>
                                    <input type="button" value="批量确认收货"  style="padding: 2px;border: 1px #ccc solid;background-color: #fff;color: #ccc;margin-left: 20px;"/>
                                    <div style="float: right;margin-right: 5px;">
                                        <input type="button"  style="display: inline-block;background-color: #fff; background-image: url({{url('web')}}/images/我的订单/组-39.png);width: 20px;height: 20px;border: 0px;background-repeat: no-repeat;" />
                                        <input type="button" style="border:0px;display: inline-block;background-color: #fff;background-image: url({{url('web')}}/images/我的订单/组-40.png);background-repeat: no-repeat;width: 58px;height: 20px;" />
                                    </div>
                                 </div>
                                <?php
                                     $order_status=array('0'=>'待发货','1'=>'待收货','2'=>'完成','3'=>'取消');
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
                                    <dl><a href="{{url('web/orderDetail')}}/{{$v->id}}">{{$comment_status[$v["comment_status"]]}}</a></dl>
                                    <dl>查看物流</dl>
                                 </div>
                                 <div style="float: left;border-left: 1px #addff8 solid;width: 11%;height:200px;text-align: center ;">
                                    <dl style="margin-top: 50px;">还有9天10时4分</dl>
                                    <button style="color: fff;background-color: #65b5ff;border: 0px;padding: 4px;margin-top: 5px;">确认收货</button>
                                 </div>
                                 </div>
                                 @endforeach
                                 <div style="width: 100%;height: 0px;padding: 10px;">
                                    <span style="line-height: 20px;">全选</span>
                                    <input type="button" value="批量确认收货"  style="padding: 2px;border: 1px #ccc solid;background-color: #fff;color: #ccc;margin-left: 20px;"/>
                                        
                                 </div>     <p style="text-align:right;margin-top: 10px;width: 100%;">
                                    <span class="fenye"><</span><span class="fenye" style="margin-left: 10px;">1</span><span class="fenye">2</span><span class="fenye">3</span>.....<span class="fenye">></span>共1页，到<input type="text" value="1" style="width: 20px;margin-left: 10px;margin-right: 10px;" />页<button  style="background-color: #f95555;padding: 3px;border: 0px;color: #fff;margin-left: 10px;width: 50px;border-radius:4px;">确认</button>
                                        </p>
                                 </div>
                            </div>       
 @endsection
