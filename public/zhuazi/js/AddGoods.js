
    //初始化
    $(function () {

        select();//加载 下拉框 事件
        fileChang();//加载 选择框改变 事件
        uploadBtn();//加载 上传按钮 事件
        canclePicBtn();//加载 图片取消按钮 事件

    });



    //点击事件
    function uploadBtn ()
    {
        $('.selPic').on('click', function () {

            $(this).next().click();
        })
    }

    //选择框改变事件
    function fileChang ()
    {
        $('.fileUp').on('change', function () {

            var fileObj = $(this);
            var formData = new FormData();

            //准备上传数据,使用HTNL5新对象formData,保存数据
            formData.append("image", $(this)[0].files[0]);
            formData.append("name", 'image' );
            formData.append('_token', $('#token').val());

            //准备回调方法,这里写你获取到上传结果,0 为失败,获取到 文件名 为成功
            function gg (data) {
                if(data  == 0 ){
                    fileObj.prev().prev().html('<p style="color:red;">上传失败</p>');
                    return falses;
                }

                var str = "<img width='135' height='130' src=../upload/"+data+">";//准备图片标签
                fileObj.parent().parent().parent().children().eq(0).html(str);//相对定位插入图片

                fileObj.parent().children('div').html('<p style="color:green;">上传成功</p>');//相对定位显示消息
                fileObj.parent().children('.selPic').css('display', 'none');//隐藏上传按钮
                fileObj.parent().children('.cancPic').css('display', 'block').attr('picName', data);//显示取取消按钮

                fileObj.after('<input class="picName" type="hidden" name="pic[]" vlaue="'+data+'" >');//添加隐藏的input标签,提交表单插入数据库

            }


            //执行已经包装好的ajaxFile方法
            ajaxFile('file/upload', formData, gg);

        });

    }

    //图片上传取消按钮
    function canclePicBtn ()
    {
        $('.cancPic').on('click', function () {

            var picName = $(this).attr('picName');

            $.get('file/upload?name=' + picName,  function (data) {

            });

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

















    //选项添加按钮
    function  selBut ()
    {
        $('.addParSel').on('click', function () {

            var trChObj = $(this).parent().parent().children();//获取th对象子对象集合

            var val = trChObj.eq(2).children('input').val();//获取文本框值
            var pid = trChObj.eq(0).attr('val'); //获取选项父id

            if(val == ''){
                var val = trChObj.eq(2).children('input');
                return false;
            }
            var str  = '<span class="tag input-sm"><span >'+val+'&nbsp;&nbsp;</span><lable class="parDel">X</lable>';//拼接显示图
            str  += '<input type="hidden" name="par'+pid+'[]" value="'+val+'"></span>';//拼接表单


            str  =  trChObj.eq(1).html() + str ;//新旧选项拼接
            trChObj.eq(1).html(str);//写入td标签

            parDelBut();//加载选项删除按钮事件

        });
    }


    //加载选项删除按钮事件
    function parDelBut ()
    {
        $('.parDel').on('click', function () {
            $(this).parent().remove();
        });
    }


    //属性选项添加按钮
    function addBut ()
    {
        //点击事件
        $('.addPar').on('click', function () {

            var id = $('.seleKind').val();
            // var name =  $('.seleKind').selectedIndex();
            var name= $(".seleKind option:selected").text();

            //检验是否已经添加该值
            var isPar  =  '';
            $('td[class=par]').each(function () {
                if($(this).attr('val') == id ){
                    isPar = 1;
                }
            });
            if( isPar == 1 ) {
                $('.addPar').next().html("<td>不能添加同样的属性</td>");
                return false
            }

            //装备字符
            var str  = '' ;
            str += "<tr><td width='10%' class='par' val='"+id+"'>"+name+" </td><td width='50%'></td>";
            str += '<td><input style="width:100px;" type="text" class="form-control" placeholder="输入选项名"></td>';
            str += '<td><button type="button" class="btn btn-primary btn-sm addParSel">添加选项</button></td>';
            str += '<td><button type="button" class="btn btn-default btn-sm">添加图片</button></td>';
            str += '<td><button type="button" class="btn btn-default btn-sm addParCel">取消</button></td>';
            str += '<tr>';
            str  = $('#parTable').html() + str;
            $('#parTable').html(str);


            selBut();//加载"添加选项"按钮事件
            cancel();//加载"取消"按钮事件


        });
    }

    //加载"取消"按钮事件
    function cancel ()
    {
        $('.addParCel').on('click', function () {
            $(this).parent().parent().remove();
        });
    }


    //下拉框事件
    function select ()
    {
        $('.sele').on('change', function () {

            var num =  $(this).val();//获取自身的值
            var seleObj =  $(this);//保存对象

            //查询数据库
            $.get('head/get?id=' + num, function (data) {

                if(data == 'NO'){
                    return false;
                }
                var dataObj = eval(data);
                var selStr = '<select style="width:100px;" class="select2_group form-control seleKind">';
                for(var a = 0  ; a < dataObj.length ; a++){
                    selStr += "<option value='"+dataObj[a]['id']+"'>"+dataObj[a]['name']+"</option>";
                }
                selStr += "</select>";

                selStr2 = '<div class="pull-left">'+selStr+'</div>';
                butStr = '<div class="pull-left"><button class="btn btn-info addPar" >添加</button><spam></spam></div>';

                $('#parTable').html('');
                seleObj.parent().nextAll().remove();//清空对象后面所有元素
                seleObj.parent().after(selStr2);      //对象后面插入
                seleObj.parent().next().after(butStr);//插入添加按钮


                specSel(dataObj);//加载-规格列表-事件

                addBut();//加载 "添加" 按钮事件
            });
        });
    }


    //加载-规格列表-事件
    function specSel (dataObj)
    {
        var str = '<tr>';
        for(var a = 0 ; a < dataObj.length ; a++){

            str +="<td>"+dataObj[a]['name']+"</td>";
            str += "<td><td>&nbsp&nbsp<input style='width:100px;' type='text' name='"+dataObj[a]['id']+"'>&nbsp&nbsp</td>";

    }
        str += '</tr>';

        $('#spec').html(str);

    }

