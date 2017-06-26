

    //初始化
    $(function () {
        loadKingClick();
    });

    //加载种类按钮点击事件
    function loadKingClick () {

        $('.kindBtn').on('click', function () {
            var btnObj = $(this);
            var id = $(this).attr('kindId');
            $.get('goodsSpec/'+id, function (data) {
                
               var str = '<div style="overflow:hidden;" id="headTable" >';
               for (var a = 0; a < data.length; a++) {
                   str += '<div  class="headBox"><div class="headText">'+data[a]['name']+'</div>' +
                       '<button type="button"  headId="'+data[a]['id']+'" class="close delBtn" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
               }
               str += '<div style="margin-left:10px; margin-top:15px; float:left;width:600px;" >' +
                   '必填&nbsp;&nbsp;<input type="radio" name="mustFill" value="1" checked>&nbsp;非必填&nbsp;&nbsp;<input type="radio" name="mustFill" value="0">' +
                   '&nbsp;&nbsp;<input id="headInputText" type="text" name="head">' +
                   '<a headTd="'+data[0]['tid']+'" class="btn btn-primary btn-xs headAddBtn" >添加</a></div></div><div id="headConMig"></div></div>';

                $('#headTable').remove();
                btnObj.parent().append(str);

                loadDelHeadBtn();
                loadAddHeadBtn();



            },'json');


        });

    }

    function loadText () {

        $('.headAddBtn').on('click', function () {

        });

    }

    //加载添加按钮
    function loadAddHeadBtn () {

        $('.headAddBtn').on('click', function () {

            var val  = $('#headInputText').val() ;
            var headTd = $(this).attr('headTd');
            var token = $('#token').val();
            var mustFill =  $('input:radio:checked').val();

            console.log(mustFill);

            var postData  = {
                name : val,
                tid  : headTd,
                _token : token,
                must : mustFill
            };


            $.post('goodsSpec', postData, function (data) {

                if (data) {
                    $('#headConMig').html('<span style="color:green">添加成功</span>');
                    $('#headInputText').val('');

                    $('.kindBtn[kindId='+headTd+']').click();

                } else {
                    $('#headConMig').html('<span style="color:red">添加失败</span>');
                }

            });

        });

    }


    //加载关闭按钮
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
                    $('#headConMig').html('<span style="color:red">删除成功</span>');
                    delBtnObj.parent().remove();
                } else {
                    $('#headConMig').html('<span style="color:red">添加失败</span>');
                }

            });
    });

    }