


$(function () {

    loadDesiDelBtn();//加载删除按钮
})


    //加载删除按钮
    function loadDesiDelBtn ()
    {
        $('.desiDel').on('click', function () {

            var desiDelObj = $(this);//保存对象
            //拼接数据
            var postData = {
                _token : $('#token').val(),
                _method : 'DELETE',
                id : $(this).attr('deID')
            }

            //发送请求
            $.post('designAdmin/1', postData , function (data) {

                if (data == 1 ) {
                    //成功后执行
                    $('#conMig').html('<span color="green">删除成功</span>');
                    desiDelObj.parent().parent().remove();
                }

            });
        })
    }



