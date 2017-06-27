


    $(function () {

        loadInfoEditBtn();//加载总体修改按钮点击事件
        loadGoodsNameSaveBtn();//加载商品名称修改点击事件

        publicTextCloseBen();//加载共用取消按钮点击事件
        pubicReviseBtnEven();//加载共用修改按钮点击事件

        styleEditBtn();//加载风格/区域修改按钮点击事件
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


    //风格/区域修改按钮
    function styleEditBtn()
    {
        //风格
        $('.styleEditBtn').on('click', function () {
            styleAndAreaEdit($(this), 26);
        });

        //区域
        $('.areaEditBtn').on('click', function () {
            styleAndAreaEdit($(this), 27);
        });
    }

    //风格和区域修改事件方法
    function styleAndAreaEdit (obj, tid)
    {
        showLinetBtn(obj);
        $.get('goodsgetstyle?tid=' + tid, function (data) {
            var str = '';
            for (a in data) {
                str += '<input type="radio" ' +
                    'styleName="'+data[a]['name']+'" name="style" value="'+data[a]['id']+'">'+data[a]['name']+'&nbsp;&nbsp;' ;
            }
            var showTextObj = obj.parent().prev().children().first();
            showTextObj.html(str);
        }, 'json');

    }



    //加载名称,价格,库存,描述保存按钮事件
    function loadGoodsNameSaveBtn ()
    {
        //名称
        $('.nameBtnSave').on('click', function ()
        {
            var regExp = '^[a-zA-Z0-9,\u4E00-\u9FA5\uF900-\uFA2D,-|=]{5,40}$';
            var reText = '<span style="color:red;">名称必须是中文,英文,数字,-/=号组成,最少5个字符,长度不能超过40个字符</span>';
            var val = $(this).parent().parent().prev().children().first().next().val();//获取相对内容
            saveBtn( $(this), val, regExp, reText, 'goods');
        });

        //价格
        $('.priceBtnSave').on('click', function  ()
        {
            var regExp = '^[0-9]{1,4}(.[0-9]{2})?$';
            var reText = '<span style="color:red;">价格必须是数字,可以带有2位小数,<br>如果你只有一位小数这样写:12.10</span>';
            var val = $(this).parent().parent().prev().children().first().next().val();//获取相对内容
            saveBtn( $(this), val, regExp, reText, 'price');
        });
        //库存
        $('.stockBtnSave').on('click', function ()
        {
            var regExp = '^[1-9]{1,5}$';
            var reText = '<span style="color:red;">您必须输入数字,并且不能超过99999</span>';
            var val = $(this).parent().parent().prev().children().first().next().val();//获取相对内容
            saveBtn( $(this), val, regExp, reText, 'stockall');
        });

        //描述
        $('.desrBtnSave').on('click', function ()
        {
            var regExp = '^[a-zA-Z0-9,\',\.\u4E00-\u9FA5\uF900-\uFA2D]{5,80}$';
            var reText = '<span style="color:red;">最少输入10个字符,最多输入80个字符,不能换行</span>';
            var val = $(this).parent().parent().prev().children().first().next().val();//获取相对内容
            saveBtn( $(this), val, regExp, reText, 'desr');
        });

        //风格
        $('.sytleBtnSave').on('click', function ()
        {
            var showText =  $(this).parent().parent().prev().children().first();
            var selBtn = showText.children('input:radio:checked');
            var val  = selBtn.val();
            var name = selBtn.attr('styleName');
            saveBtn($(this), val, '', '', 'style', name)//发送数据
        })

        //区域
        $('.areaBtnSave').on('click', function ()
        {
            var showText =  $(this).parent().parent().prev().children().first();
            var selBtn = showText.children('input:radio:checked');
            var val  = selBtn.val();
            var name = selBtn.attr('styleName');
            saveBtn($(this), val, '', '', 'style', name)//发送数据
        })

        //状态
        $('.statuBtnSave').on('click', function ()
        {
            var showText =  $(this).parent().parent().prev().children().first();
            var val = showText.next().val();
            var name = showText.next().find("option:selected").text();
            saveBtn($(this), val, '', '', 'state', name)//发送数据
        });


    }



    //修改请求发送(对象,值,正则,正则规则文本,字段,文本), 如果text不为空,则显示text中的信息,但数据库还是存储val里面的数据
    function saveBtn (obj, val, regExp, reText, field, text)
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
                if (text) {
                    val = text
                }
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






