@extends('web.layout.master')

@section('title','购物车结算')

@section('content')
<script type="text/javascript">
$(document).ready(function(){
  $("#fold_btn").click(function(){	  
	   var active=$(this).attr("active");
	   $(".addresses_content").slideToggle("slow");
	   if($(this).hasClass('active')){
		   $(this).removeClass('active').find("i").attr("class","icon_Expand");
		   }
		   else{
			   $(this).addClass('active').find("i").attr("class","icon_hide")
			   
			   }
	  }
	);
       $(".modify").click(function(){
		  $("#invoice_style").find(".invoice_edit").show();

		})
})
//字数限制
function checkLength(which) {
	var maxChars = 45; //
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您输入的字数超过限制!',	
    });
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; // 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
};	
function checkinvoice(which) {
	var maxChars =100; //
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您输入的字数超过限制!',	
    });
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; // 减去 当前输入的
		document.getElementById("sys").innerHTML = curr.toString();
		return true;
	}
};
</script>
<body>
<div class="shopping_cart">
   <div class="cart_top clearfix">
   <a href="#"><img src="images/logo.jpg" /></a><span class="title_name">结算页</span>
   <div class="Step_bar r_f"><img src="images/Step_bar_03.png" /></div>
   </div>
<!--结算页样式-->
<div class="Settlement_style">
 <div class="Settlement_title">填写并核对订单信息</div>
 <div class="s_detailed_style">
   <!--收货人信息-->
   <div class="Address_info">
     <div class="title_name clearfix marginbottom"><span>收货人信息</span><a href="#">新增收货地址</a></div>
     <div class="address clearfix">
       <a href="javascript:ovid()" class="Select_address determine" id="" aria-checked="true">张天师 江苏 <i class="icon_Select"></i></a>
       <span class="info">张天师&nbsp;&nbsp;&nbsp;江苏&nbsp;南京&nbsp;雨花台&nbsp;区郁金香路2号郁金香软件大厦6楼&nbsp;;&nbsp;18903456789</span>
     </div>
     <div class="More_addresses">
      <a href="javascript:ovid()" id="fold_btn" class="title_name">更多地址<i class="icon_Expand"></i></a>
     <div class="addresses_content">
        <div class="address clearfix">
       <a href="javascript:ovid()" class="Select_address" id="" aria-checked="true">张天师 江苏 <i class="icon_Select"></i></a>
       <span class="info">张天师&nbsp;&nbsp;&nbsp;江苏&nbsp;南京&nbsp;雨花台&nbsp;区郁金香路2号郁金香软件大厦6楼&nbsp;;&nbsp;18903456789</span>
     </div>
      <div class="address clearfix">
       <a href="javascript:ovid()" class="Select_address" id="" aria-checked="true">张天师 江苏 <i class="icon_Select"></i></a>
       <span class="info">张天师&nbsp;&nbsp;&nbsp;江苏&nbsp;南京&nbsp;雨花台&nbsp;区郁金香路2号郁金香软件大厦6楼&nbsp;;&nbsp;18903456789</span>
     </div>
      <div class="address clearfix">
       <a href="javascript:ovid()" class="Select_address" id="" aria-checked="true">张天师 江苏 <i class="icon_Select"></i></a>
       <span class="info">张天师&nbsp;&nbsp;&nbsp;江苏&nbsp;南京&nbsp;雨花台&nbsp;区郁金香路2号郁金香软件大厦6楼&nbsp;;&nbsp;18903456789</span>
     </div>
     </div>
     </div>
   </div>
   <!--支付方式-->
   <div class="Pay_by clearfix">
     <div class="title_name clearfix marginbottom"><span>支付方式</span></div>
     <div class="Pay_list clearfix">
      <a href="javascript:ovid()" class="Select_address determine" id="" aria-checked="true">支付宝<i class="icon_Select"></i></a>
      <a href="javascript:ovid()" class="Select_address " id="" aria-checked="true">微信支付<i class="icon_Select"></i></a>
       <a href="javascript:ovid()" class="Select_address " id="" aria-checked="true">银联支付<i class="icon_Select"></i></a>
     </div>
   </div>
   <!--送货清单-->
   <div class="shopping_list">
   <div class="title_name clearfix marginbottom"><span>送货清单</span><a href="#">返回并修改购物车</a></div>
   <div class="product_list">
   <table>
    <tbody>
     <tr>
      <td width="690px">
       <p class="img"><img src="images/product/p-7.jpg"  width="90px" height="90"/></p>
       <p class="pic_name">
        <a href="#">黑白调 电脑椅子办公椅家用电竞椅可躺人体工学椅 白色</a>
       </p>
      </td>
      <td width="150px" class="price">￥234</td>
      <td width="150px">X2</td>
     </tr>
     <tr>
      <td width="690px">
       <p class="img"><img src="images/product/p-7.jpg"  width="90px" height="90"/></p>
       <p class="pic_name">
        <a href="#">黑白调 电脑椅子办公椅家用电竞椅可躺人体工学椅 白色</a>
       </p>
      </td>
      <td width="150px" class="price">￥234</td>
      <td width="150px">X2</td>
     </tr>
     <tr>
      <td width="690px">
       <p class="img"><img src="images/product/p-7.jpg"  width="90px" height="90"/></p>
       <p class="pic_name">
        <a href="#">黑白调 电脑椅子办公椅家用电竞椅可躺人体工学椅 白色</a>
       </p>
      </td>
      <td width="150px" class="price">￥234</td>
      <td width="150px">X2</td>
     </tr>
    </tbody>
   </table>
   <div class="Remarks">
    <div class="title_name">添加订单备注</div>
    <input name="" type="text"  class="add_Remarks" dragonfly="true" onkeyup="checkLength(this);" placeholder="45字以内"/><span class="wordage">剩余字数：<span id="sy" style="color:Red;">45</span>字</span>
   </div>
   </div>
   <!--发票信息-->
   <div class="invoice_style" id="invoice_style">
    <div class="title_name clearfix marginbottom"><span>发票信息</span></div>
    <div class="invoice_content">
     <div class="xinxi"><span>普通发票（纸质）</span><span>个人</span><span>明细</span> <a href="javascript:ovid()" class="modify" id="invoice_modify">修改</a></div>
    <div class="invoice_edit clearfix">
     <p><label class="label_name">选择发票类型:</label>
     <label><input name="invoice_radio" type="radio" value="" />普通发票（纸质）</label>
      <label><input name="invoice_radio" type="radio" value="" />普通发票（电子版）</label>
       <label><input name="invoice_radio" type="radio" value="" />增值税发票（纸质）</label>
        <label><input name="invoice_radio" type="radio" value="" />增值税发票（电子版）</label></p>
        <p> <label class="label_name">发票抬头:</label>
         <select name="" class="look_up"><option value="">--选择抬头--</option><option value="个人">个人</option><option value="公司">公司</option><option value="学校">学校</option></select>
          <label class="label_name">是否显示明细:</label>  
           <label>
          <input name="Details_radio" type="radio" value="" />是</label>
           <label><input name="Details_radio" type="radio" value="" />否</label></p>
           <p><label class="label_name">备注说明:</label><input name="" type="text"  class="add_invoice" dragonfly="true" onkeyup="checkinvoice(this);" placeholder="100字以内"/><span class="wordage">剩余字数：<span id="sys" style="color:Red;">100</span>字</span>  </p>
          <p class="textalign"> <input name="" type="submit"  value="保存" class="submitbtn"/></p>
    </div>
    </div>
   </div>
   </div>
 </div>
 <!---->
 <div class="Settlement_price">
   <div class="s_shop_p_style clearfix">
    <div class="info">
     <p><label class="label_name"><em>4</em>件商品，总金额</label><span class="s_figures">￥2345.00</span></p>
     <p><label class="label_name">积分抵现</label><span class="s_figures">-￥34.00</span></p>
     <p><label class="label_name">运费</label><span class="s_figures">￥0.00</span></p>
    </div>
   </div>
   <div class="clearfix">
    <div class="Orders_submit">
       <div class="total"><span>总金额</span><span class="total_Amount">￥2345.00</span></div>
       <div class="Order_address">张天师&nbsp;&nbsp;&nbsp;江苏&nbsp;南京&nbsp;雨花台&nbsp;区郁金香路2号郁金香软件大厦6楼&nbsp;;&nbsp;18903456789</div>
       <div> <input name="" type="submit"  value="提交订单" class="submit_Order"/></div>
    </div>
   </div>
 </div>
</div>
</div>
@endsection
