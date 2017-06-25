

    //初始化
    $(function () {
        loadKingClick();
    });

    //加载按钮点击事件
    function loadKingClick () {

        $('.kindBtn').on('click', function () {

            var btnObj = $(this);
            function getHead (data)
            {

               var str = '<div id="headTable" class="table table-bordered">';

               for (var a = 0; a < data.length; a++) {
                   str += '<div class="table-bordered">'+data[a]['name']+'</div>';
               }


               str += '<tr><td><input type="text" ><a class="btn btn-primary btn-xs" >添加</a></td></tr></div>';

                $('#headTable').remove();
               btnObj.parent().append(str);

            }

            getHeadAjax($(this).attr('kindId'), getHead);

        });

    }



    //获取head头的ajax
    function getHeadAjax (id, func)
    {

        $.get('goodsSpenc/'+id, function (data) {

            func(data);

        },'json');

    }