


$(function () {

    loadDesiDelBtn();//加载删除按钮
})

function loadDesiDelBtn ()
{

    $('.desiDel').on('click', function () {
        var desiDelObj = $(this);

        console.log();
        var postData = {
            _token : $('#token').val(),
            _method : 'DELETE',
            id : $(this).attr('deID')
        }

        var deID =
        $.post('designAdmin/1', postData , function (data) {
            if (data == 1 ) {
                $('#conMig').html('<span color="green">删除成功</span>');
                desiDelObj.parent().parent().remove();
            }
        });

    })

}