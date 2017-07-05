var MUST_INPUT_TMP = [];
$(function () {
    loadEvenAddLog();//加载 图片添加按钮 事件
    fileChang();
})

//加载 图片添加按钮 事件
function loadEvenAddLog ()
{
    $('#addLog').on('click', function () {
        var num = parseInt( $(this).attr('num') ); //转换数据类型
        if(num >= 10){ //判断有多少张图片
            $(this).next().html('<center>最多只能添加5展示张图片</center>');
            return false;
        }
        $(this).parent().children('.fileUp').click(); //触发点击事件
    });
}

//选择框改变事件
function fileChang ()
{
    $('.fileUp').on('change', function () {
        var fileObj = $(this);
        var formData = new FormData();

        //准备上传数据,使用HTNL5新对象formData,保存数据
        formData.append("image", $(this)[0].files[0]); //获取图片数据

        console.log(formData);

        // formData.append("name", 'image' );
        formData.append('_token', $('#token').val());


        //准备回调方法,这里写你获取到上传结果,0 为失败,获取到 文件名 为成功
        function gg (picName) {
            picName = picName['name'];

            if(picName  == '' ){
                fileObj.prev().html('<center style="color:red">上传失败</center>');
                return falses;
            }
            MUST_INPUT_TMP['pic'] +=1;//标记点解了添加按钮
            //拼接字符串
            var str  = '<td>' +
                '<div sytle="margin:10px;">' +

                '<img width="200" height="200" class="img-thumbnail" src="../tempPicDir/'+picName+'">' +

                '</div>' +
                '<center  style="color:green">上传成功</center>' +
                '<center picName="'+picName+'" class="del'+MUST_INPUT_TMP['pic']+'" ><label>删除</label></center>' +
                '<input type="hidden" name="pic[]" value="'+picName+'">'+
                '</td>';

            fileObj.parent().parent().before(str);//显示图片
            //添加次数
            var num = (parseInt($('#addLog').attr('num')) + 1);
            $('#addLog').attr('num', num);
            fileObj.prev().html('<center style="color:green">上传成功</center>');//显示信息

            var inputStr = '<input type="hidden" name="picName[]" value="'+picName+'">';

            priDleBtnEven()//加载删除事件
        }
        //执行已经包装好的ajaxFile方法
        ajaxFile('../goods/file/upload', formData, gg);
    });

}

//删除按钮
function priDleBtnEven ()
{
    var name = '.del' + MUST_INPUT_TMP['pic'];

    $(name).on('click', function () {
        var delObj = $(this);
        var picName = $(this).attr('picName')

        $.get('../goods/file/upload?name=' + picName,  function (delData) {
            if (delData) {
                delObj.next().html('删除成功');
                delObj.parent().remove();
                MUST_INPUT_TMP['pic'] -= 1 ;
            }
        });

    });

    $(name).on('mouseout', function () {
        $(this).first().css('color', '');
    });
    //鼠标进入
    $(name).on('mouseover', function () {
        $(this).first().css('color', 'red');
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

        },
        success : function(responseStr) {
            func(responseStr);//回调方法
        },
        error : function(responseStr) {

        }
    });
}

