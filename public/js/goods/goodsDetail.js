

    var  SAVE_SEL_ARR = [];//保存选项组
    var  SEL_PRICE_ARR = [];//保存商品选项价格
    var  DEFAULT_PRICE = [];//保存商品价格
    var  TEST_LINK_NUM  = 0;

    var SEL_SEl_SEL_ARR = [] ; //保存切割后的选项
    var SEL_CONDITION = []; //

    //初始化方法
    $(function () {

        showGoodParSel();//显示商品选项方法
        loadChaseEven();//加载确认按钮事件
        DEFAULT_PRICE['price'] =  $('#price').html();//保存默认价格
        DEFAULT_PRICE['stock'] =  $('.stock').html();
        addAndSubNumBtn()//商品数量加减按钮

        loadGoodCoordin()//加载配套商品
        loadGoodSYouLick()//加载你细化的商品
        loadAddShopBtnEven();//加载添加购物车按钮
    })


    //遍历商品选项方法
    function  showGoodParSel ()
    {
        var goodId = $('#goodsId').val();
        $.get('../getgoodSel?gid=' + goodId, function (data) {

            if (data.length <= 0 ) {
                $('#isSel').val('A');
            }
            //抽取属性名,ID
            var head = [];
            for (a in data) {
                head[data[a]['headId']] =  data[a]['headName'];

            }

            //拼接数据
            var str = '' ;
            var sebBtnName = [];
            var counter = 0; //位置计数器
            for (a in head) {

                str += '<dl class="tb-prop clearfix"><dt class="label_name">'+head[a]+'</dt> <dd class="content"> <ul>';

                for (i in data) {
                    if (data[i]['headId'] == a ) {

                        var name = 'selBtn' + data[i]['id'];//拼接新名
                        sebBtnName[data[i]['id']] = name;//保存每个选项的ID名
                        str += '<li  id="'+name+'"   ><label selCon="no" parDesi="'+counter+'" pid="'+a+'"  sid="'+data[i]['id']+'" parName="'+head[a]+'" ' +
                            'class="'+head[a]+' hang'+a+' '+name+' selsel" >'+data[i]['name']+'</label></li>';


                    }
                }

                str += '</ul> </dd></dl>';
                SAVE_SEL_ARR[a] = 0;
                counter += 1;
            }

            //写入标签
            $('#goodParSelBox').html(str);

            //设置事件
            for ( a in sebBtnName ) {
                loadSelBtnEven(sebBtnName[a]);
            }

            TEST_LINK_NUM = 0;//重发记录器清零
        },'json');


        //获取选项价格
        $.get('../getgoodSelPrice?gid=' + goodId , function (data) {

            SEL_PRICE_ARR =  data;//存入全局数组

            //切割单个存入全局数据
            for (a in data) {
                var str = data[a]['num_bunch'];
                console.log(str);
                SEL_SEl_SEL_ARR[a] = str.split('_');
            }


        },'json');

    }

    //选项点击处理事件,
    function loadSelBtnEven (name)
    {
        $('.' + name).on('click', function () {


            if ($(this).attr('unlokes') == 'no') {
                return false;
            }

            //获取相关值,以下代码会用到
            var parDesi = $(this).attr('parDesi');//获取位置id
            var sid =  $(this).attr('sid');//获取选项id
            var pid = $(this).attr('pid');//获取选项ID


            //样式控制,
            var headName = $(this).attr('parName');
            $('.' + headName).css('border-color', 'silver');//清除本行所有红框



            //判断正反选择
            var selState = $(this).attr('selCon');//获取状态
            if (selState == 'no') {
                $(this).css('border-color', 'red');
                $('.' + headName).attr('selCon', 'no')
                $(this).attr('selCon', 'yes');
                SAVE_SEL_ARR[pid] = sid;
            } else {
                $(this).css('border-color', 'silver');
                $(this).attr('selCon', 'no');
                SAVE_SEL_ARR[pid] = 0;
                //判断是否没有选择
                var num  = 0 ;
                for (a in  SAVE_SEL_ARR) {
                    num += SAVE_SEL_ARR[a] + num;
                }
                if (num == 0) {
                    $('.selsel').css('color', 'black');
                    return false;
                }
            }

            //抽取相关的价格选项数据
            var selSelArr = [];
            var counter = 0;
            // for (a in SAVE_SEL_ARR) {
            //
            //     if (SAVE_SEL_ARR[a] == 0) {
            //         counter += 1; //计数器+1
            //         continue;
            //     }
            //
            //     //判断抽取保存数组是否为0 ,如果不为0那么就在抽取数组上去遍历查找,并且覆盖抽取数组
            //     if ( selSelArr.length > 0) {
            //
            //         var selSelArrTemp  = [];//新建一个临时数组
            //
            //         for (aa in selSelArr) {
            //
            //             if (SAVE_SEL_ARR[a] == selSelArr[aa][counter]) { //我的非第一位,对应你的非第一位
            //
            //                 selSelArrTemp.push(selSelArr[aa]);//保存到临时数组
            //
            //             }
            //         }
            //
            //         selSelArr = selSelArrTemp;//覆盖最终结果数组
            //
            //     } else {   //否则在全部价格数组中查找数据
            //
            //         for (aa  in  SEL_SEl_SEL_ARR) {
            //
            //             if (SAVE_SEL_ARR[a] == SEL_SEl_SEL_ARR[aa][counter]) { //条件第一位对应数据第一位
            //
            //                 selSelArr.push(SEL_SEl_SEL_ARR[aa]);//存入最终结果数组
            //
            //             }
            //
            //         }
            //
            //     }
            //     counter += 1; //计数器+1
            // }//算法方式  1



            console.log(SAVE_SEL_ARR[parDesi]);

            for (aa  in  SEL_SEl_SEL_ARR) {

                if (sid == SEL_SEl_SEL_ARR[aa][parDesi]) { //条件第一位对应数据第一位

                    selSelArr.push(SEL_SEl_SEL_ARR[aa]);//存入最终结果数组

                }

            }


            console.log('最终数据');
            console.log(selSelArr);

            //设置相关选项样式,关闭其他选项选择
            for (a in SAVE_SEL_ARR) {
                if (a == pid) {
                    continue;
                }
                $('.hang' + a).css('color', 'rgb(213,213,213)').attr('unlokes', 'no');
            }


            //设置样式
            for (a in selSelArr) {
                for (aa in selSelArr[a]) {

                    var name = 'selBtn' + selSelArr[a][aa];//拼接新名
                    $('.'+name).css('color', 'black').attr('unlokes', 'yes');

                }

            }



            //检验串是否完整,如果完整则接下去执行拼接
            for (a in SAVE_SEL_ARR) {
                if (SAVE_SEL_ARR[a] == 0) {
                    return false;
                }
            }


            //拼接字串
            var sel = '';
            for (a in SAVE_SEL_ARR) {
                sel += '_' + SAVE_SEL_ARR[a];
            }
            var re = new RegExp('^_*');
            var str = sel.replace(re, '');
            var goodId = $('#goodsId').val();

            //循环查找
            for ( a in SEL_PRICE_ARR) {
                var text = SEL_PRICE_ARR[a]['num_bunch'];
                if ( text == str) {
                    console.log(123);
                    var price = SEL_PRICE_ARR[a]['price'];//价格数组中获取 价格
                    $('#price').html(price);//写入价格显示
                    $('input[name=num_bunch]').val(text);//写入 input标签
                    $('.stock').html('库存' + SEL_PRICE_ARR[a]['store'] + '件');//显示相应库存
                    throw SyntaxError();
                }
            }

            //回复数据
            $('.priceaa').html(DEFAULT_PRICE['price']);//显示回默认价格
            $('.stock').html( DEFAULT_PRICE['stock'] );//显示默认库存

        });

    }















    //加载立即购买点击事件
    function loadChaseEven ()
    {
        $('#J_LinkBuy').on('click', function () {
            console.log($('#from'));
            $('#from').submit();
        });
    }

    //商品数量加减按钮
    function addAndSubNumBtn ()
    {
        $('#numAdd').on('click', function () {
            var num = parseInt($('#inputNum').val());
            if (num < 999) {
                num += 1 ;
                $('#inputNum').val(num);
            }
        });

        $('#numSub').on('click', function () {
            var num = parseInt($('#inputNum').val());
            if (num > 1) {
                num -= 1 ;
                $('#inputNum').val(num);
            }
        });
    }

    //加载商品配套商品查询事件
    function loadGoodCoordin ()
    {
        var areaID  =   $('#areaID').val();
        $.get('../getgoodSelCoordin?areaID=' + areaID , function (data) {
            var str = ''
            for ( a in data ) {
                str += ' <li><a href="'+data[a]['id']+'"><img  src="../goodsPic/'+data[a]['pic']+'"  width="150px" height="150px"/><span class="Package_price">￥'+data[a]['price']+'</span></a></li>';
            }
            $('#coordin').html(str);


        },'json');
    }

    //获取商品喜好
    function  loadGoodSYouLick ()
    {
        //问题:欠缺喜好算法
        var styleID =   $('#styleID').val();
        $.get('../getgoodSelCoordin?styleID=' + styleID , function (data) {

            var str = ''
            for ( a in data ) {
                str += '<li><a href="'+data[a]['id']+'"><img src="../goodsPic/'+data[a]['pic']+'"  width="145" height="145"/></a></li>';
            }
            $('#youlick').html(str);
        },'json');

    }

    //加载添加购物车按钮事件
    function loadAddShopBtnEven ()
    {
        $('#addShop').on('click', function () {

            $('#from').attr('action', '../shopCart').submit();

        })
    }

