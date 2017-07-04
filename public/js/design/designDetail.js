

    var TEMP_USER_NAME = "";

    $(function () {

        var id = $('#designID').val();
        var timestamp = Date.parse(new Date());
        TEMP_USER_NAME = id + timestamp;
        $('#username').append('游客:' + TEMP_USER_NAME);

        cmSendEven();//评论发送事件

    });


    //发送评论内容
    function cmSendEven ()
    {
        $('#sendCmBtn').on('click', function () {


            var postData = {
                _token : $('#token').val(),
                comtent : $('#cmContent').val(),
                tempuser : TEMP_USER_NAME,
                did : $('#designID').val(),
                uid : 0
            }


            $.post('../sendComment', postData, function (data) {

                $('.commentNum').html('评论条数');

                if (!data) {
                    $('#commentContent').html('还没有评论奥,快来添加评论吧!!');
                    return false ;
                }

                var str = '';
                for (a in  data) {
                 str += '<li class="clearfix"> <div class="comment_Avatar"> <div class="Avatar_bg"></div> ' +
                    '<img src="../web/images/tempuser1897df321023210412.png" width="60" height="60" /></div> ' +
                    '<div class="comment_info"> ' +
                    '<p class="name">游客:  '+data[a]['tempuser']+'<span class="time">'+data[a]['created_at']+'</span> <a href="#" class="Reply_link">回复</a></p> ' +
                '<p class="comments">'+data[a]['comtent']+' </p></div> </li>'
                }



                $('#commentContent').html(str);

            },'json');

            $('#cmContent').val('');

        })
    }

