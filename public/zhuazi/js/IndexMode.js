

    $(function () {

        modeAddBtn();//模板添加按钮
        showModeList();

    });


//获取模块列表
    function showModeList ()
    {
        $.get('getModeList', function (data) {
            var str = '<tr><td>标题</td><td>模板文件名</td><td>商品id</td></tr>';
            for(a in data){
                str += '<tr><td>'+data[a]['modeName']+'</td><td>'+data[a]['file_name']+'</td><td>'+data[a]['gid_bunch']+'</td></tr>';
            }
            $('#modeTable').html(str);
        });
    }


    //模板添加按钮
    function modeAddBtn ()
    {
        $('.modeAdd').on('click', function () {
            var str = '<tr>' +
                '<td><input     type="text" class="titleName"></td>' +
                '<td><input     type="text" class="goodsID"></td>' +
                '<td><input     type="text" class="modeName"></td>' +
                '<td><button id="saveModeInfo" type="button" class="btn btn-primary btn-sm">保存</button></td>' +
                '</tr>';
            $('#modeTable').append(str);
            $(this).css('display', 'none');
            saveBtnEven();
        });

    }

    //保存按钮
    function  saveBtnEven ()
    {
        $('#saveModeInfo').on('click', function () {
            var post = {
                modeName : $('.titleName').val(),
                gid_bunch : $('.goodsID').val(),
                file_name : $('.modeName').val(),
                _token : $('#token').val(),
            }
            $.post('postModeCon', post, function (data) {
                if (data) {
                    $('#modMig').html('添加成功');
                }
            }, 'json');

            $('#modeAdd').css('display', 'block');
            $('#cancel').css('display', 'none');
            $(this).parent().parent().remove();
            showModeList();
        });
    }