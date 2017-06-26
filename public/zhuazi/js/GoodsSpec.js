

    //初始化
    $(function () {
        loadKingClick();
    });

    //加载种类按钮点击事件
    function loadKingClick () {

        $('.kindBtn').on('click', function () {

            var btnObj = $(this);   //保存对象
            var id = $(this).attr('kindId'); //获取种类ID
            var tName = $(this).html();


            $.get('goodsSpec/'+id, function (data) {

               var str = '<div style="overflow:hidden;" id="headTable" ><div><h2 style="color:black;">'+tName+' 规格</h2>' +
                   '<div id="headConMig"></div></div>';

               for (var a = 0; a < data.length; a++) {
                   str += '<div  class="headBox"><div class="headText">'+data[a]['name']+'</div>' +
                       '<button type="button"  headId="'+data[a]['id']+'" class="close delBtn" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
               }

               str += '<div style="margin-left:10px; margin-top:15px; float:left;width:600px;" >' +
                   '必填&nbsp;&nbsp;<input type="radio" name="mustFill" value="1" checked>&nbsp;非必填&nbsp;&nbsp;<input type="radio" name="mustFill" value="0">' +
                   '&nbsp;&nbsp;<input id="headInputText" type="text" name="head">' +
                   '<a headTd="'+id+'" class="btn btn-primary btn-xs headAddBtn" >添加</a>' +
                   '<a class="btn btn-default btn-xs closeHeadTable" >关闭</a>' +
                   '</div></div></div>';

                $('#headTable').remove();

                btnObj.parent().append(str);//插入数据
                loadDelHeadBtn();//加载删除按钮事件
                loadAddHeadBtn();//加载添加按钮事件
                $('#headInputText').focus();


            },'json');


        });

    }


    //加载添加按钮
    function loadAddHeadBtn () {

        $('.headAddBtn').on('click', function () {

            //校验
            var val   =  $('#headInputText').val() ;
            var bool =  new RegExp('^[a-zA-Z,/0-9\u4E00-\u9FA5\uF900-\uFA2D]{1,10}$').test(val);
            if (!bool) {
                $('#headConMig').html('<span style="color:red">规格只能由英文中文数字组成,最多10个字符</span>');
                throw SyntaxError();
            }

            //准备数据
            var headTd  =   $(this).attr('headTd');
            var token   =   $('#token').val();
            var mustFill =  $('input:radio:checked').val();

            var postData  = {
                name : val,
                tid  : headTd,
                _token : token,
                must : mustFill
            };

            //发送数据
            $.post('goodsSpec', postData, function (data) {

                if (data) {
                    $('#headInputText').val('');
                    $('.kindBtn[kindId='+headTd+']').click();
                    $('#headConMig').html('<span style="color:green">添加成功</span>');

                } else {
                    $('#headConMig').html('<span style="color:red">添加失败</span>');
                }

            });

        });

        //关闭按钮
        $('.closeHeadTable').on('click', function () {
            $('#headTable').remove();
        });

    }


    //删除按钮
    function loadDelHeadBtn ()
    {

        $('.delBtn').on('click', function () {

            var id = $(this).attr('headId');
            var token = $('#token').val();
            var delBtnObj = $(this);

            var postData = {
                _token:token,
                _method:'DELETE',
            };
            $.post('goodsSpec/' + id, postData, function (data) {

                if (data) {
                    $('#headConMig').html('<span style="color:green">删除成功</span>');
                    delBtnObj.parent().remove();
                } else {
                    $('#headConMig').html('<span style="color:red">删除失败</span>');
                }

            });
    });

    }