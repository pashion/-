


    $(function () {

        loadInfoEditBtn();//加载总体修改按钮事件
        loadGoodsNameSaveBtn();//加载商品名称修改事件

        publicTextCloseBen();//加载共用取消按钮事件
        pubicReviseBtnEven();//加载共用修改按钮事件

        styleEditBtn();//加载风按钮修改事件
    });

    //显示修改按钮
    function loadInfoEditBtn ()
    {
        //大修改按钮事件
        $('#infoEditBtn').on('click', function () {
            $('.editBtnMinBox').css('display', 'block');//显示修改按钮
            $(this).css('display', 'none');
            $('#infoEditBtnAff').css('display', 'block');
        });

        //设置确定按钮点击事件
        $('#infoEditBtnAff').on('click', function () {
            $('.editBtnMinBox').css('display', 'none');
            $(this).css('display', 'none');
            $('#infoEditBtn').css('display', 'block');
        });
    }

    function styleEditBtn()
    {
        $('.styleEditBtn').on('click', function () {

            $.get('goodsgetstyle?tid=' + 1 , function (data) {



            });

        });
    }



    //加载名称,价格,库存,描述保存按钮事件
    function loadGoodsNameSaveBtn ()
    {
        //名称
        $('.nameBtnSave').on('click', function () {
            var regExp = '^[a-zA-Z0-9,\u4E00-\u9FA5\uF900-\uFA2D,-|=]{5,40}$';
            var reText = '<span style="color:red;">名称必须是中文,英文,数字,-/=号组成,最少5个字符,长度不能超过40个字符</span>';
            var val = $(this).parent().parent().prev().children().first().next().val();//获取相对内容
            saveBtn( $(this), val, regExp, reText, 'goods');
        });

        //价格
        $('.priceBtnSave').on('click', function  () {
            var regExp = '^[0-9]{1,4}(.[0-9]{2})?$';
            var reText = '<span style="color:red;">价格必须是数字,可以带有2位小数,<br>如果你只有一位小数这样写:12.10</span>';
            var val = $(this).parent().parent().prev().children().first().next().val();//获取相对内容
            saveBtn( $(this), val, regExp, reText, 'price');
        });
        //库存
        $('.stockBtnSave').on('click', function () {

            var regExp = '^[1-9]{1,5}$';
            var reText = '<span style="color:red;">您必须输入数字,并且不能超过99999</span>';
            var val = $(this).parent().parent().prev().children().first().next().val();//获取相对内容
            saveBtn( $(this), val, regExp, reText, 'stockall');

        });

        //描述
        $('.desrBtnSave').on('click', function () {

            var regExp = '^[a-zA-Z0-9,\',\.\u4E00-\u9FA5\uF900-\uFA2D]{5,80}$';
            var reText = '<span style="color:red;">最少输入10个字符,最多输入80个字符,不能换行</span>';
            var val = $(this).parent().parent().prev().children().first().next().val();//获取相对内容
            saveBtn( $(this), val, regExp, reText, 'desr');

        });


    }

    //修改请求发送(对象,值,正则,正则规则文本,字段)
    function saveBtn (obj, val, regExp, reText, field)
    {
        obj.parent().next().html('');//清空显示信息
        var bool = RegExp(regExp).test(val);
        //判断返回信息
        if  (!bool) {
            obj.parent().next().html('<span style="color:red;">'+reText+'</span>');//显示信息
            throw SyntexError();
        }
        var showText = obj.parent().parent().prev().children().first();
        //回调方法
        function func (data)
        {
            if (data) {
                obj.next().click();
                showText.html(val);
                obj.parent().next().html('<span style="color:green;">修改成功</span>');//显示信息
            } else {
                obj.parent().next().html('<span style="color:red;">修改失败</span>');
            }
        }
        //发送请求
        editAjax('goods', field, val, func);
    }



    //修改按钮显示相关
    function pubicReviseBtnEven ()
    {
        $('.nameBtn').on('click', function () {
            showLinetBtn($(this));//显示相关按钮
            var  showTextObj =  $(this).parent().prev().children().first();
            var val = showTextObj.html();
            showTextObj.next().val(val).css('display', 'block');
            showTextObj.html('');
        });
    }

    //取消按钮显示相关
    function publicTextCloseBen ()
    {
        $('.btnCancle').on('click', function () {
            noneLineBtn($(this));
            var  showTextObj =  $(this).parent().parent().prev().children().first();
            var val = showTextObj.next().val();
            showTextObj.next().css('display', 'none');
            showTextObj.html(val);
        });
    }

    //修改显示相关按钮
    function showLinetBtn (obj)
    {
        obj.next().css('display', 'block');
        obj.css('display', 'none');
        $('#infoEditBtnAff').css('display', 'none');
    }

    //取消隐藏相关按钮
    function noneLineBtn (obj)
    {
        obj.parent().css('display', 'none');
        obj.parent().prev().css('display', 'block');
        $('#infoEditBtnAff').css('display', 'block');
    }

    //请求ajax
    function editAjax (table, field, content, func)
    {
        var postData = {
            _token : $('#token').val(),
            _method : 'PUT',
            field  : field,
            table : table,
            content : content,
        };
        var goodsID = $('#goodsID').attr('data');//获取商品id
        //送请求
        $.post('goods/' + goodsID, postData, function (data) {
            func(data);
        });
    }






