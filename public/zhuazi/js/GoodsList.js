



    $(function () {
        buttonLoad();//加载进入按钮事件
        loadGoodsDelEven();//加载删除按钮事件
        loadGoodEditEven();//加载编辑按钮
    });


    function buttonLoad ()
    {
        $('.goodsSingle').on('click', function () {

            var goodsId =  $(this).attr('goodId');
            $.get('./goods/'+goodsId, function (data) {

                $('div[role=main]').html(data);

            });

        });
    }


    //加载删除按钮事件
    function loadGoodsDelEven ()
    {
        $('.goodsDel').on('click', function () {

            var goodsDelObj = $(this);
            //准备数据
            var postData = {
                _token : $('#token').val(),
                _method : 'DELETE',
                id : $(this).attr('data-id')
            }

            //发送请求
            $.post('goods/1', postData , function (data) {

                if (data == 1) {
                    goodsDelObj.parent().parent().remove();
                    $('conMig').html('<span color="green">删除成功</span>');
                }
            });

        })
    }

    //加载编辑按钮
    function loadGoodEditEven ()
    {
        $('.goodEdit').on('click', function () {

            var id  = $(this).attr('data-id');
            $('.goodEdit').css('display', 'none'); //隐形按钮
            var str = '<button id="saveBtn" data-id="'+id+'" type="button" class="btn btn-default">保存</button>';//显示按钮
            $(this).after(str);//添加按钮
            var  trObj  =  $(this).parent().parent();//获取父类对象

            //转换名称
            var val =  trObj.children().eq(2).html();
            var str = '<input id="goodsName" type="text" class="form-control" value="'+val+'">';
            var val =  trObj.children().eq(2).html(str);

            //转换价格
            var val =  trObj.children().eq(4).html();
            var str = '<input id="price" type="text" class="form-control" value="'+val+'">';
            var val =  trObj.children().eq(4).html(str);

            //转换描述
            var val =  trObj.children().eq(5).html();
            var str = '<input id="desr" type="text" class="form-control" value="'+val+'">';
            var val =  trObj.children().eq(5).html(str);

            //转换状态
            var str = '<select id="state" tableName="type" style="width:100px;" class="select2_group form-control sele">' +
                '<option value="0">在售</option>' +
                '<option value="1">下架</option>' +
                '<option value="2">失效</option>' +
                '<option value="3">缺货</option>' +
                '<select>';
            var val =  trObj.children().eq(6).html(str);


            loadSaveBtn();//加载保存按钮
        });
    }


    //加载保存按钮
    function  loadSaveBtn ()
    {
        $('#saveBtn').on('click', function () {


            //检验名称
            var bool =  new RegExp('^[a-zA-Z0-9,\u4E00-\u9FA5\uF900-\uFA2D,-|=]{5,40}$').test($('#goodsName').val());
            if (!bool) {
                $('#conMig').html('<span style="color: red">名称必须是中文,英文,数字,-/=号组成,最少5个字符,长度不能超过40个字符</span>');
                throw SyntaxError();
            }

            //校验价格
            var bool =  new RegExp('^[0-9]{1,4}(.[0-9]{2})?$').test( $('#price').val() );
            if (!bool) {
                $('#conMig').html('<span style="color: red">价格必须是数字,可以带有2位小数,<br>如果你有一位小数必须按照这样的样式写:12.10</span>');
                throw SyntaxError();
            }

            //校验描述
            var bool =  new RegExp('^[a-zA-Z0-9,\',\.\u4E00-\u9FA5\uF900-\uFA2D]{5,80}$').test($('#desr').val());
            if (!bool) {
                $('#conMig').html('<span style="color: red">最少输入10个字符,最多输入80个字符,不能换行</span>');
                throw SyntaxError();
            }

            //拼接数据
            var postData = {
                _token : $('#token').val(),
                goods : $('#goodsName').val(),
                price : $('#price').val(),
                desr  :  $('#desr').val(),
                state : $('#state').find('option:selected').val(),
                id : $(this).attr('data-id'),
            }

            var saveBtnObj =  $(this);
            //发送请求
            $.post('summaryGoodsEdit', postData, function (data) {
                if (data == 1) {
                    $('.goodEdit').css('desiplay', 'bo');

                    //显示原按钮组
                    $('.goodEdit').css('display', 'block'); //隐形按钮

                    //数据转换
                    var  trObj  =  saveBtnObj.parent().parent();//获取父类对象
                    console.log(trObj);
                    var val =  trObj.children().eq(2).html(postData['goods']);
                    var val =  trObj.children().eq(4).html(postData['price']);
                    var val =  trObj.children().eq(5).html(postData['desr']);

                    var str = '';
                    switch (postData['state']) {
                        case '0':  str = '<button type="button" class="btn btn-success">在售</button>'; break;
                        case '1':  str = '<button type="button" class="btn btn-danger">下架</button>';  break;
                        case '2':  str = '<button type="button" class="btn btn-default">失效</button>'; break;
                        case '3':  str = '<button type="button" class="btn btn-warning">缺货</button>'; break;
                    }
                    var val =  trObj.children().eq(6).html(str);


                    saveBtnObj.remove();
                }
            })

        })
    }








