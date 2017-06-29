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
  <table class="table">
    <thead>
     <tr class="label_name"><th width="70"><label><input name=""  class="checkbox" type="checkbox" value="" />全选</label></th><th width="430">商品</th><th width="100">单价（元）</th><th width="120">数量</th><th width="100">小计（元）</th><th width="80">操作</th></tr>
    </thead>
     </table>
    <table class="cart_pic table_list">
     <tr>
      <td width="70" valign="top"><input name=""  class="checkbox" type="checkbox" value="" /></td>
      <td width="430" valign="top">
      <p class="img"><img src="images/img_30.jpg" width="80px" height="80px" /></p>
      <p class="name"><a href="#">作木坊 实木床1.8米1.5米高箱中式家具婚床储物双人胡桃木A303 标准框架床(不含</a></p>
      <p class="classification">颜色分类：大号蓝色 </p>
      </td>
      <td width="100" valign="top" class="cart_price">￥2343.00</td>
      <td width="120" valign="top">
      <div class="Numbers">
		  <a onclick="setAmount.jian('#qty_item_1')" href="javascript:void(0)" class="jian">-</a>
          <input type="text" name="qty_item_1" value="1" id="qty_item_1" onkeyup="setAmount.modify('#qty_item_1')" class="number_text">
		  <a onclick="setAmount.jia('#qty_item_1')" href="javascript:void(0)" class="jia">+</a>
		 </div>
      </td>
      <td width="100" valign="top" class="statistics">￥2345.0</td>
      <td width="80" valign="top" class="operating"><a href="#">编辑</a><a href="#">删除</a></td>
     </tr>
  </table>
   <table class="cart_pic table_list">
     <tr>
      <td width="70" valign="top"><input name=""  class="checkbox" type="checkbox" value="" /></td>
      <td width="430" valign="top">
      <p class="img"><img src="images/img_30.jpg" width="80px" height="80px" /></p>
      <p class="name"><a href="#">作木坊 实木床1.8米1.5米高箱中式家具婚床储物双人胡桃木A303 标准框架床(不含</a></p>
      <p class="classification">颜色分类：大号蓝色 </p>
      </td>
      <td width="100" valign="top" class="cart_price">￥2343.00</td>
      <td width="120" valign="top">
      <div class="Numbers">
		  <a onclick="setAmount.jian('#qty_item_1')" href="javascript:void(0)" class="jian">-</a>
          <input type="text" name="qty_item_1" value="1" id="qty_item_1" onkeyup="setAmount.modify('#qty_item_1')" class="number_text">
		  <a onclick="setAmount.jia('#qty_item_1')" href="javascript:void(0)" class="jia">+</a>
		 </div>
      </td>
      <td width="100" valign="top" class="statistics">￥2345.0</td>
      <td width="80" valign="top" class="operating"><a href="#">编辑</a><a href="#">删除</a></td>
     </tr>
  </table>
   <table class="cart_pic table_list">
     <tr>
      <td width="70" valign="top"><input name=""  class="checkbox" type="checkbox" value="" /></td>
      <td width="430" valign="top">
      <p class="img"><img src="images/img_30.jpg" width="80px" height="80px" /></p>
      <p class="name"><a href="#">作木坊 实木床1.8米1.5米高箱中式家具婚床储物双人胡桃木A303 标准框架床(不含</a></p>
      <p class="classification">颜色分类：大号蓝色 </p>
      </td>
      <td width="100" valign="top" class="cart_price">￥2343.00</td>
      <td width="120" valign="top">
      <div class="Numbers">
		  <a onclick="setAmount.jian('#qty_item_1')" href="javascript:void(0)" class="jian">-</a>
          <input type="text" name="qty_item_1" value="1" id="qty_item_1" onkeyup="setAmount.modify('#qty_item_1')" class="number_text">
		  <a onclick="setAmount.jia('#qty_item_1')" href="javascript:void(0)" class="jia">+</a>
		 </div>
      </td>
      <td width="100" valign="top" class="statistics">￥2345.0</td>
      <td width="80" valign="top" class="operating"><a href="#">编辑</a><a href="#">删除</a></td>
     </tr>
  </table>
  <div class="Settlement clearfix">
   <div class="select-all clearfix">
  <div class="cart-checkbox"><input type="checkbox" id="CheckedAll" name="toggle-checkboxes" class="jdcheckbox" clstag="clickcart">全选</div>
  <div class="operation"><a href="javascript:void(0);" id="send">删除选中的商品</a></div> 
    </div>
    <div class="toolbar_right clearfix">
     <div class="Quantity l_f marginright">已选择<em>3</em>件商品</div>
     <div class="l_f">总价：<em class="Total_price">￥12334.00</em></div>
    </div>
    <a href="javascipt:ovid()" onclick="Submitbilling()" class="Submit_billing">去结算</a>
  </div>
 </div>
 <!--猜你喜欢-->
 <div class="recommend_pic">
  <div class="recommend_title">猜你喜欢</div>
  <table>
   <tbody>
    <tr>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
     <td>
     <p class="img"> <a href="#"><img src="images/product/p-4.jpg"  width="160" height="160"/></a></p>
     <p class="name"><a href="#">kaimeng 真皮 双人床 皮床+床垫+单床头柜 668 1.8*2.0米床+床垫+1柜</a></p>
     <p class="price">￥1234.00</p>
     <p><a href="#" class="add_cart_btn"><em class="icon_cart"></em>加入购物车</a></p>
     </td>
    </tr>
   </tbody>
  </table>
 </div>
</div>
@endsection
<script>
  $(".add_cart_btn ").hover(function(){
			$(this).addClass("hover");
		},function(){
			$(this).removeClass("hover");  

		}
	); 
</script>