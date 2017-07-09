@extends('web.layout.master')

@section('title','购物车')

@section('content')
<body>
<div class="shopping_cart">
 <div class="cart_top clearfix"><a href="#"><img src="/web/images/logo.jpg" /></a><span class="title_name"></span></div>
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

    @foreach($data as $k=>$v)
      <table class="cart_pic table_list">
        <tr>
          <td width="70" valign="top" class='choose'>

            @if(isset($v['num_bunch']))
              <input name="choose[]" class="checkbox" type="checkbox" value="{{$v['gid']}}|{{$v['num_bunch']}}" checked="" />
            @else
              <input name="choose[]" class="checkbox" type="checkbox" value="{{$v['gid']}}" checked="" />
            @endif


            <!-- <input name="choose[]" class="checkbox" type="checkbox" value="{{$v['gid']}}" checked="" /> -->
          </td>
          <td width="430" valign="top">
          <p class="img"><img src="{{url('goodsPic')}}/{{$v['pic']}}" width="80px" height="80px" /></p>
          <p class="name"><a href="#">{{$v['goods']}}</a></p>
          <p class="classification">规格分类：
            @if(isset($v['str_bunch']))
              {{$v['str_bunch']}}
            @else
              无
            @endif
          </p>
          </td>
          <td width="100" valign="top" class="cart_price">{{$v['price']}}</td>
          <td width="120" valign="top">
            <div class="Numbers">
              @if(isset($v['num_bunch']))
                <a onclick="decrease($(this),'{{$v['gid']}}','{{$v['num_bunch']}}')" href="javascript:void(0)" class="jian">-</a>
              @else
                <a onclick="decrease($(this),'{{$v['gid']}}','')" href="javascript:void(0)" class="jian">-</a>
              @endif

              <input type="text" readonly name="qty_item_1" value="{{$v['num']}}" id="qty_item_1" class="number_text">
              @if(isset($v['num_bunch']))
                <a onclick="increase($(this),'{{$v['gid']}}','{{$v['num_bunch']}}')" href="javascript:void(0)" class="jia">+</a>
              @else
                <a onclick="increase($(this),'{{$v['gid']}}','')" href="javascript:void(0)" class="jia">+</a>
              @endif
           </div>
         </td>
         <td width="100" valign="top" class="statistics">￥{{$v['price']}}{{$v['num']}}</td>
          @if(isset($v['num_bunch']))
            <td width="80" valign="top" class="operating" bunch="{{$v['num_bunch']}}">
            <a href="javascript:void(0)" onclick="delCart(this,'{{$v['gid']}}','{{$v['num_bunch']}}')" >
            删除</a>
            </td>
          @else
            <td width="80" valign="top" class="operating"><a href="javascript:void(0)" onclick="delCart(this,'{{$v['gid']}}','')">删除</a>
            </td>
          @endif
       </tr>
    @endforeach 



    <table class="cart_pic table_list">
     
  </table>




  <div class="Settlement clearfix">
   <div class="select-all clearfix">
  
  <div class="operation"><a href="javascript:void(0);" id="send">购物车商品展示</a></div> 
    </div>
    <div class="toolbar_right clearfix">
     <div class="Quantity l_f marginright"><em></em></div>
     <div class="l_f">总价：<em class="Total_price">￥12334.00</em></div>
    </div>
    <input type="submit" class="Submit_billing" value="去结算">
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
       <p class="img"> <a href="{{url('/goodsShow')}}/{{$v->id}}"><img src="{{url('goodsPic')}}/{{$v->pic}}"  width="160" height="160"/></a></p>
       <p class="name"><a href="{{url('/goodsShow')}}/{{$v->id}}">{{$v->goods}}</a></p>
       <p class="price">￥{{$v->price}}</p>
       <p><a href="{{url('/goodsShow')}}/{{$v->id}}" class="add_cart_btn"><em class="icon_cart"></em>查看商品</a></p>
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
