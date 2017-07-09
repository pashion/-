

    var  SAVE_SEL_ARR = [];//保存选项组
    var  SEL_PRICE_ARR = [];//保存商品选项价格
    var  DEFAULT_PRICE = [];//保存商品价格
    var  TEST_LINK_NUM  = 0;

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
            for (a in head) {


                str += '<dl class="tb-prop clearfix"><dt class="label_name">'+head[a]+'</dt> <dd class="content"> <ul>';
               

                for (i in data) {
                    if (data[i]['headId'] == a ) {

                        var name = 'selBtn' + data[i]['id'];//拼接新名
                        sebBtnName[data[i]['id']] = name;//保存每个选项的ID名

                        str += '<li id="'+name+'" pid="'+a+'" class="'+head[a]+'" sid="'+data[i]['id']+'"><a><label>'+data[i]['name']+'</label></a></li>';
                    }
                }

                str += '</ul> </dd></dl>';
                SAVE_SEL_ARR[a] = 0;
            }

            //写入标签
            $('#goodParSelBox').html(str);
            //设置事件
            for ( a in sebBtnName ) {
                loadSelBtnEven(sebBtnName[a]);
            }

            TEST_LINK_NUM = 0;//重发记录器清零
        },'json');

        //查询选项价格
        $.get('../getgoodSelPrice?gid=' + goodId , function (data) {
            SEL_PRICE_ARR =  data;
        },'json');

    }

    //选项点击处理事件,
    function loadSelBtnEven (name)
    {
        $('#' + name).on('click', function () {


            //样式控制
            var headName = $(this).attr('class');
            console.log(headName);
            $('.' + headName).css('background', '');
            $(this).css('background', 'red');


            //获取属性ID
            var pid = $(this).attr('pid');
            SAVE_SEL_ARR[pid] = $(this).attr('sid');

            //拼接字串
            var sel = '';
            for (a in SAVE_SEL_ARR) {
                sel += '_' + SAVE_SEL_ARR[a];
            }
            var re = new RegExp('^_*');
            var  str = sel.replace(re, '');
            var goodId = $('#goodsId').val();


            //循环查找
            for ( a in SEL_PRICE_ARR) {
                var text = SEL_PRICE_ARR[a]['num_bunch'];
                console.log(str);
                console.log(text);

                if ( text == str) {
                    console.log(123);
                    var price = SEL_PRICE_ARR[a]['price'];//价格数组中获取 价格
                    $('#price').html(price);//写入价格显示
                    $('input[name=num_bunch]').val(text);//写入 input标签
                    $('.stock').html('库存' + SEL_PRICE_ARR[a]['store'] + '件');//显示相应库存
                    throw SynError();
                }
            }
            //回复数据
            $('.priceaa').html(DEFAULT_PRICE['price']);//显示回默认价格
            $('input[name=num_bunch]').val(DEFAULT_PRICE['price']);//默认价格写入标签
            $('.stock').html( DEFAULT_PRICE['stock'] );

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

