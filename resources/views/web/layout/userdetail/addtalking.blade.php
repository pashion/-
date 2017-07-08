@extends('web.layout.selfconmit')

@section('title','活动专区')

@section('content')
                            
<div class="cont-main" style="text-align:center">
                    <div class="main-wrap mt15" style="border: 0px;margin-top: 20px">
                             
                          <div class="x_panel">
                            <div class="x_title">
                                <h3>请留下您的评论! </h3>
                               
                                
                            </div>
                            <div class="x_content" style="margin-top: 20px">

                                <!-- start form for validation -->
                                <form id="demo-form" data-parsley-validate action="{{url('web/addtalking')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" class="flat" name="goods_id" value="{{$goods_id}}" />
                                    <input type="hidden" class="flat" name="order_id" value="{{$order_id}}"/>
                                   <input type="hidden" class="flat" name="user_id" value="{{$user_id}}"/>
                                    <input type="hidden" class="flat" name="orderDetail_id" value="{{$id}}"/>
                                    <label for="urlname">评论状态 * :</label>
                                    <p>
                                        实名评论:
                                        <input type="radio" class="flat" name="comment_type" id="typeY" value="0" checked="" required /> 匿名评论:
                                        <input type="radio" class="flat" name="comment_type" id="typeN" value="1" />
                                    </p><br>
                                    <label>星级 *:</label>
                                    <p>
                                        1星:
                                        <input type="radio" class="flat" name="star"  value="0" />
                                        2星:
                                        <input type="radio" class="flat" name="star" id="typeN" value="1" />
                                        3星:
                                        <input type="radio" class="flat" name="star" id="typeN" value="2" />
                                        4星;
                                        <input type="radio" class="flat" name="star" id="typeN" value="3"/>
                                        5星:
                                        <input type="radio" class="flat" name="star" id="typeY" value="4" checked="" required />
                                    </p><br>
                                    <label for="message">评论内容 :</label><br>
                                    <textarea style="width:400px; height:150px; text-align:center; border:1px;" id="message" name="comment_info"></textarea><br>
                                    <input type="submit" class="btn btn-success">

                                </form>


                            </div>
                        </div>
                           
                                 
                    </div>       
                            
                            
 
 @endsection




