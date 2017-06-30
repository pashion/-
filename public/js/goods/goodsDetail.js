

    var  SAVE_SEL_ARR = [];//保存选项组
    var  SEL_PRICE_ARR = [];//保存商品选项价格
    var  DEFAULT_PRICE = [];//保存商品价格

    $(function () {

        showGoodParSel();

        loadChaseEven();//加载确认按钮事件

        DEFAULT_PRICE =  $('#price').html();//保存默认价格

    })


    function  showGoodParSel ()
    {
        var goodId = $('#goodsId').val();

        $.get('../getgoodSel?gid=' + goodId, function (data) {

            //抽取属性名,ID
            var head = [];
            for (a in data) {
                head[data[a]['headId']] =  data[a]['headName'];
            }

            //拼接数据
            var str = '' ;
            var sebBtnName = [];
            for (a in head) {
                str += '<dl class="tb-prop clearfix"><dt class="label_name">颜色分类</dt> <dd class="content"> <ul>';
                for (i in data) {
                    if (data[i]['headId'] == a ) {

                        var name = 'selBtn' + data[i]['id'];
                        sebBtnName[data[i]['id']] = name;
                        str += '<li id="'+name+'" pid="'+a+'" sid="'+data[i]['id']+'"><a href="#" role="button" tabindex="0" ><span>'+data[i]['name']+'</span></a></li>';

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

        },'json');


        //查询选项价格
        $.get('../getgoodSelPrice?gid=' + goodId , function (data) {

            SEL_PRICE_ARR =  data;

        },'json');




    }


    //选项点击处理事件,
    // 问题:应该加已验证后再发送,而不应该任意点发送查询请求
    //
    function loadSelBtnEven (name)
    {
        $('#' + name).on('click', function () {

            var pid = $(this).attr('pid');

            SAVE_SEL_ARR[pid] = $(this).attr('sid');

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

                if ( text == str) {
                    var price = SEL_PRICE_ARR[a]['price'];
                    $('#price').html(price);
                    $('input[name=num_bunch]').val(text);
                    throw SynError();
                }
            }

            $('.priceaa').html(DEFAULT_PRICE);//显示回默认价格
            $('input[name=num_bunch]').val(DEFAULT_PRICE);//默认价格写入标签


        });

    }


    function loadChaseEven ()
    {
        $('#J_LinkBuy').on('click', function () {

            console.log($('#from'));
            $('#from').submit();
        });

    }