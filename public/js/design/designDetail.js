

    var TEMP_USER_NAME = "";//保存临时我的用户名
    var COMMENT_PAGE = 1;//页面计数器

    var TEMP_REALY_USER_NAME = "" ; //点击回复时临时保存要回复的用户名
    var TEMP_COMMENT_ID = 0 ; // 点击回复时临时保存要回的评论id

    var NUM = 0;//与生成不同的按钮名


    $(function () {

        //初始化事件
        cmSendEven();//评论发送事件
        getCommentData();//获取方案评论内容
        loadMoreEven();

        //生成用户名
        var id = $('#designID').val();
        var timestamp = Date.parse(new Date());
        TEMP_USER_NAME = id + timestamp;
        $('#username').append('游客:' + TEMP_USER_NAME);

    });

    //发送评论内容
    function cmSendEven ()
    {
        $('#sendCmBtn').on('click', function () {

            //准备数据
            var postData = {
                _token : $('#token').val(),
                comtent : $('#cmContent').val(),
                tempuser : TEMP_USER_NAME,
                did : $('#designID').val(),
                uid : 0,
                page: COMMENT_PAGE,
            }
            //发送数据
            $.post('../sendComment', postData, function (data) {

                $('#commentContent').html('');
                montageHtml(data);  //拼接并且写入

            },'json');

            //清空文本框
            $('#cmContent').val('');
            //页面清零
            COMMENT_PAGE = 0;

        })
    }



    //加载更多
    function loadMoreEven ()
    {
        $('#loadMore').on('click', function () {
            COMMENT_PAGE += 7;
            getCommentData();

        });
    }


    //获取数据
    function getCommentData ()
    {
        var did = $('#designID').val();
        $.get('../getComment?did=' + did + '&page=' + COMMENT_PAGE, function (data) {

            montageHtml(data);//拼接html并且写入页面


        });
    }


    //拼接返回过来的数据
    function montageHtml (data)
    {
        var  newNameArr = [];
        if (data.length == 0) {
            $('#commentContent').append('没有更多评论了');
        }

        //循环评论
        var str = '';
        for (a in  data) {

            NUM += 1;
            var repalyBtnName = 'repalyBtn' + NUM;
            newNameArr[NUM] = repalyBtnName;

            str += '<li class="clearfix"> <div class="comment_Avatar"> <div class="Avatar_bg"></div> ' +
                '<img src="../web/images/tempuser1897df321023210412.png" width="60" height="60" /></div> ' +
                '<div class="comment_info"> ' +
                '<p class="name">游客:  '+data[a]['tempuser']+'<span class="time">'+data[a]['created_at']+'</span> ' +
                '<span><span><a userName="'+data[a]['tempuser']+'" commentId="'+data[a]['id']+'" href="javascript://" class="Reply_link '+repalyBtnName+'">回复</a></span></span>' +
                '<p class="comments">'+data[a]['comtent']+' </p> ';

            //循环遍历评论回复
            for (i in data[a]['repaly'] ) {
                NUM += 1;
                var repalyBtnName = 'repalyBtn' + NUM;
                newNameArr[NUM] = repalyBtnName;

                str += '<div class="reBox">' +
                        '<div class="repalyPro" >' +
                            '<div class="comment_Avatar"> <div class="Avatar_bg"></div> ' +
                            '<img src="../web/images/tempuser1897df321023210412.png" width="60" height="60" /></div>' +
                        '</div>' +
                        '<div class="contentRealy">' +
                            '<div class="repalyTitle">'+data[a]['repaly'][i]['uname']+' 回复 '+data[a]['repaly'][i]['repaly_targe']+'' +
                            '<label  userName="'+data[a]['repaly'][i]['uname']+'" commentId="'+data[a]['id']+'" class="repalyRBtn ' + repalyBtnName + '">回复</label></div>' +
                            '<div>'+data[a]['repaly'][i]['content']+'</div>' +
                        '</div>' +
                    '</div>' +
                    '<span></span>'
            }
            str += '</div></li>';
        }

        $('#commentContent').append(str);

        //循环声明事件
        for (a in newNameArr) {
            loadRepalyBtn(newNameArr[a]);
        }

        return str;
    }

    //加载回复按钮事件
    function loadRepalyBtn (name)
    {
        console.log(name);
        $('.' + name).on('click', function () {

            TEMP_REALY_USER_NAME = $(this).attr('userName');  //临时保存对方用户名
            TEMP_COMMENT_ID = $(this).attr('commentId');    //临时保存评论id

            $('.repalyTextBox').remove();//清除原先的输入文本框
            //拼接文本框
            var  str =  '<div class="repalyTextBox"><textarea id="realyCommentCon" style="width:450px;" name="" id="" cols="100" rows="2"></textarea>' +
                '<button id="submitR" class="btn btn-default btn-sm">提交回复</button><button  class="btn btn-default btn-sm closeR">关闭</button></div>'

            //写入
            $(this).parent().parent().parent().next().after(str);

            //加载事件
            loadCloasReText();//加载关闭按钮事件
            loadSunmitRealyBtn();//记载提交回复按钮

        });
    }

    //回复输入文本框关闭事件
    function loadCloasReText ()
    {
        $('.closeR').on('click', function () {

            $('.repalyTextBox').remove();

        });
    }


    //记载提交回复按钮
    function loadSunmitRealyBtn ()
    {
        $('#submitR').on('click', function () {

            var postData = {
                design_id:  $('#designID').val(),       //方案id
                designcomment_id : TEMP_COMMENT_ID,     //评论ID
                uname : TEMP_USER_NAME,                 //我的用户名
                repaly_targe : TEMP_REALY_USER_NAME,     //对方的用户名
                content : $('#realyCommentCon').val(),   //内容
                _token : $('#token').val()
            }

            console.log(postData);

            $.post('../sendRealyContent', postData, function (data) {

                if (data) {
                    $('#commentContent').html('');
                    montageHtml(data);

                }


            });

        });
    }