@extends('web.layout.master')

@section('title','个人注册详细')

@section('content')

<body>
<div class="Reg_header">
  <div class="login_top">
   <div class="content_style">
    <a href="#"><img src="images/logo.jpg"  /></a><span class="title">个人注册详细</span></div>
   </div>
</div>
<div class="clearfix content_style">
 <div class=" clearfix content_style">
   <div class="Registration_details ">
    <div class="prompt_style">
   <span>注：</span>为保证审核及时通过，请尽量完善信息内容。请乎填写虚假信息，所填信息将进行审核。所有信息未必填项，填写完整方能提交审核。否则无法提交审核，请配合完善信息  </div>
      <div class="details_content clearfix margin_sx">
         <div class="left_text"> 
            <div class="label_info">
      <span class="title_name">个人基本信息</span>   
      <ul class="details_info">
       <li><label class="label_name"><i>*</i>姓名</label><span class="add_text"> <input name="" type="text"  class="text_add"  style="width:150px;"/><em>(真实姓名)</em></span></li>
       <li><label class="label_name"><i>*</i>性别</label><span class="add_text">
       <label><input name="radio" type="radio" value="" />男</label>&nbsp;&nbsp;<label><input name="radio" type="radio" value="" />女</label></span></li>
       <li><label class="label_name"><i>*</i>身份证号</label><span class="add_text"> <input name="" type="text"  class="text_add" /></span></li>
       <li><label class="label_name"><i>*</i>毕业学校</label><span class="add_text"> <input name="" type="text"  class="text_add"  style="width:250px;"/></span></li>
       <li><label class="label_name"><i>*</i>毕业专业</label><span class="add_text"> <input name="" type="text"  class="text_add"  style="width:250px;"/></span></li>
       <li><label class="label_name"><i>*</i>技术职称</label><span class="add_text"> <input name="" type="text"  class="text_add"  style="width:250px;"/></span></li>
       <li><label class="label_name"><i>*</i>所属协会</label><span class="add_text"> <input name="" type="text"  class="text_add"  style="width:250px;"/></span></li>
       <li>
       <label class="label_name"><i>*</i>案例简介</label>
       <span class="add_text"> 
       <textarea name="" cols="" rows="" class="textarea" dragonfly="true" onkeyup="checkLength(this);"></textarea>
       <span class="wordage"><span id="sy" style="color:Red;">300</span>/300</span>
       </span>
       </li>
        <li><label class="label_name"><i>*</i>工作地点</label><span class="add_text"> <input name="" type="text"  class="text_add"  style="width:250px;"/></span></li>
         <li><label class="label_name"><i>*</i>移动电话</label><span class="add_text"> <input name="" type="text"  class="text_add"  style="width:250px;"/></span></li>
      </ul>
      </div>
         </div>
          <div class="right_add_img">
          <div class="label_info">
      <span class="title_name">证件扫描图</span>
          <div class="upload_style" id="upload_operation">
          <div id="display_img"><img src="images/file_add.png" width="100"/></div>
            <h5>身份证</h5>
            <div class="fileInput ">
              <a href="javascript:;" class="a-upload"> <input type="file" name="" id="">点击上传图片</a>
            </div>
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
 
