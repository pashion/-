@extends('web.layout.master')

@section('title','公司注册详细')

@section('content')
<body>
<div class="Reg_header">
  <div class="login_top">
   <div class="content_style">
    <a href="#"><img src="images/logo.jpg"  /></a><span class="title">公司注册详细</span></div>
   </div>
</div>
<div class=" clearfix content_style">
<div class="Registration_details ">
  <div class="prompt_style">
   <span>注：</span>为保证审核及时通过，请尽量完善信息内容。请乎填写虚假信息，所填信息将进行审核。所有信息未必填项，填写完整方能提交审核。否则无法提交审核，请配合完善信息  </div>
  <div class="details_content clearfix margin_sx">
    <div class="left_text"> 
     <div class="label_info">
      <span class="title_name">公司基本信息</span>   
      <ul class="details_info">
       <li><label class="label_name"><i>*</i>公司名称</label><span class="add_text"> <input name="" type="text"  class="text_add"  style="width:300px;"/><em>(完整公司名称)</em></span></li>
       <li><label class="label_name"><i>*</i>公司类型</label><span class="add_text">
       <label><input name="radio" type="radio" value="" />设计</label>&nbsp;&nbsp;<label><input name="radio" type="radio" value="" />设计装饰</label></span></li>
       <li><label class="label_name"><i>*</i>注册资本</label><span class="add_text"> <input name="" type="text"  class="text_add" /><em>万/元</em></span></li>
       <li><label class="label_name"><i>*</i>法定代表</label><span class="add_text"> <input name="" type="text"  class="text_add" /></span></li>
      </ul>
      </div>
       <div class="label_info">
      <span class="title_name">授权代理人</span>
      <ul class="details_info">
       <li><label class="label_name"><i>*</i>姓名</label><span class="add_text"> <input name="" type="text"  class="text_add" style=" width:250px"/></span></li>
       <li><label class="label_name"><i>*</i>身份证号</label><span class="add_text"> <input name="" type="text"  class="text_add" style=" width:250px"/></span></li>
       <li><label class="label_name"><i>*</i>手机号</label><span class="add_text"> <input name="" type="text"  class="text_add" style=" width:250px"/></span></li>
       <li><label class="label_name"><i>*</i>电子邮箱</label><span class="add_text"> <input name="" type="text"  class="text_add"  style=" width:250px"/></span></li>
       <li><label class="label_name"><i>*</i>经营范围</label><span class="add_text"> <input name="" type="text"  class="text_add" style=" width:350px"/></span></li>
       <li><label class="label_name"><i>*</i>办公地点</label><span class="add_text"> <input name="" type="text"  class="text_add" style=" width:350px"/></span></li>
       <li>
       <label class="label_name"><i>*</i>公司简介</label>
       <span class="add_text"> 
       <textarea name="" cols="" rows="" class="textarea" dragonfly="true" onkeyup="checkLength(this);"></textarea>
       <span class="wordage"><span id="sy" style="color:Red;">300</span>/300</span>
       </span>
       </li>
      </ul>
      </div>
         <div class="label_info">
      <span class="title_name">公司联系方式</span>
      <ul class="details_info">
       <li><label class="label_name"><i>*</i>电话</label><span class="add_text"> <input name="" type="text"  class="text_add" style=" width:200px"/></span></li>
       <li><label class="label_name"><i>*</i>电邮</label><span class="add_text"> <input name="" type="text"  class="text_add" style=" width:200px"/></span></li>
      </ul>
      </div>
    </div>
    <div class="right_add_img">
        <div class="label_info">
      <span class="title_name">证件扫描图</span>
          <div class="upload_style" id="upload_operation">
          <div id="display_img"><img src="images/file_add.png" width="100"/></div>
            <h5>上传公司营业执照</h5>
            <div class="fileInput ">
              <a href="javascript:;" class="a-upload"> <input type="file" name="" id="">点击上传图片</a>
            </div>
          </div>
          <div class="upload_style" id="upload_operation1">
          <div id="display_img"><img src="images/file_add.png"  width="100"/></div>
            <h5>公司税务登记证</h5>
            <div class="fileInput ">
              <a href="javascript:;" class="a-upload"> <input type="file" name="" id="">点击上传图片</a>
            </div>
          </div>
           <div class="upload_style" id="upload_operation2">
          <div id="display_img"><img src="images/12.jpg" width="400"  height="268" /></div>
            <h5>法定代表人身份证</h5>
            <div class="fileInput ">
              <a href="javascript:;" class="a-upload"> <input type="file" name="" id="">点击上传图片</a>
            </div>
          </div>
           <div class="upload_style" id="upload_operation3">
          <div id="display_img"><img src="images/file_add.png" width="100"/></div>
            <h5>授权代理人身份证</h5>
            <div class="fileInput ">
              <a href="javascript:;" class="a-upload"> <input type="file" name="" id="">点击上传图片</a>
            </div>
          </div>
      </div> 
    </div>
  </div>
  <!--按钮操作-->
  <div class="Submit_operation textalign">
    <input name="" type="submit"  class="btn save_btn" value="保存当前信息"  onclick="saveregistered()"/>
    <input name="" type="submit"  class="btn submit_btn" value="提交注册信息" onclick="submitregistered()"/>
  </div>
</div>
</div>
 @endsection
<script>
 //字数限制
function checkLength(which) {
	var maxChars = 300; //
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
		var curr = maxChars - which.value.length; //减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
};	
 $(".upload_style").hover(function(){
			$(this).addClass("hover");
		},function(){
			$(this).removeClass("hover");  

		}
	); 
</script>
