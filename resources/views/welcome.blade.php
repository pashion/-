
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="{{url('zhuazi')}}/vendors/jquery/dist/jquery.min.js"></script>



    <style>
        #exec_target{display:none;width:0;height:0;}
        #feedback{width:1200px;margin:0 auto;}
        #feedback img{float:left;width:300px;height:300px;}

        .a1 {
            width:50px; height:50px;
            border: 1px solid red;
        }


    </style>


</head>
<body>
<div class='a1'>

</div>


<input class='file' type="file" name="image" >        <!-- 添加上传文件 -->

<input class="token" type="hidden" name="_token" value="{{csrf_token()}}">

<iframe id="exec_target" name="exec_target"></iframe>
<!-- 提交表单处理iframe框架 -->
<div id="feedback"></div>
<!-- 响应返回数据容器 -->

</body>


<form action="file" method="post" enctype="multipart/form-data">
    <input class="token" type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="file" name="gg">
    <input type="submit">
</form>



<script type="text/javascript">

    $(function () {

    });


    //点击事件
    function uploadBtn ()
    {
        $('.a1').on('click', function () {

            $('.file').click();
        })
    }

    //选择框改变事件
    function fileChang ()
    {
        $('.file').on('change', function () {

            var fileObj = $(this);
            var formData = new FormData();

            //准备上传数据,使用HTNL5新对象formData,保存数据
            formData.append("image", $(this)[0].files[0]);
            formData.append("name", 'image' );
            formData.append('_token', $('.token').val());

            //准备回调方法,这里写你获取到上传结果,0 为失败,获取到 文件名 为成功
            function gg (data) {
                if(data  === 0 ){
                    return falses;
                }
                console.log(data);
                var str = "<img src=upload/"+data+">";
                fileObj.after(str);
            }


            //执行已经包装好的ajaxFile方法
            ajaxFile('file', formData, gg);

        });

    }

    //ajax文件上传方法,默认post上传,(地址, formData对象, 回调方法(data))
    function ajaxFile (url, formData, func)
    {
        $.ajax({
            url : url,
            type : 'POST',
            data : formData,
            // 告诉jQuery不要去处理发送的数据
            processData : false,
            // 告诉jQuery不要去设置Content-Type请求头
            contentType : false,
            beforeSend:function(){
                console.log("正在进行，请稍候");
            },
            success : function(responseStr) {
                func(responseStr);
            },
            error : function(responseStr) {
                console.log("error");
            }
        });
    }





</script>

</html>


 