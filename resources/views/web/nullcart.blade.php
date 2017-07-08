@extends('web.layout.master')

@section('title','购物车')

@section('content')
<body>
<div class="shopping_cart">
 <div class="cart_top clearfix"><a href="#"><img src="images/logo.jpg" /></a><span class="title_name">购物车</span></div>
 <!--提示登录-->
 <div class="cart_prompt clearfix">
   <em class="icon_prompt"></em>
   <div class="prompt_content">你还没有登录，登录之后购物车的商品将保存到你的账户中 <a href="#" class="Login_btn">立即登录</a></div>
 </div>
 <!--购物车-->
 <div class="cart_style Shopping_list">
  <form action="{{url('/shopCart')}}/choose" method="post">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <table class="table">
    <thead>
     <tr class="label_name"><th width="70"><label><input name=""  class="allcheck" type="checkbox" value="" checked="" />全选</label></th><th width="430">商品</th><th width="100">单价（元）</th><th width="120">数量</th><th width="100">小计（元）</th><th width="80">操作</th></tr>
    </thead>
     </table>

    购物车为空

    <table class="cart_pic table_list">
     
  </table>




  <div class="Settlement clearfix">
   <div class="select-all clearfix">
  
  <div class="operation"><a href="javascript:void(0);" id="send">删除选中的商品</a></div> 
    </div>
    <div class="toolbar_right clearfix">
     <div class="Quantity l_f marginright"><em></em></div>
     <div class="l_f">总价：<em class="Total_price">￥12334.00</em></div>
    </div>
    <!-- <input type="submit" class="Submit_billing" value="去结算"> -->
    <!-- <a href="" class="Submit_billing">去结算</a> -->
  </div>
 </form>

 </div>



 <!--猜你喜欢-->
 <div class="recommend_pic">
  <div class="recommend_title">猜你喜欢</div>
  <table>
   <tbody>
    <tr>



     @foreach($HOT as $k => $v)
      <td>
       <p class="img"> <a href="#"><img src="{{$v->pic}}"  width="160" height="160"/></a></p>
       <p class="name"><a href="#">{{$v->goods}}</a></p>
       <p class="price">￥{{$v->price}}</p>
       <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>查看商品</a></p>
      </td>
     @endforeach 

     
    </tr>
   </tbody>
  </table>
 </div>
</div>
@endsection
<script>

</script>
