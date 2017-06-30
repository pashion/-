

    var  SAVE_SEL_ARR = [];

    $(function () {

        showGoodParSel();

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
    }


    //选项点击处理事件,
    // 问题:应该加已验证后再发送,而不应该任意点发送查询请求
    //
    function loadSelBtnEven (name)
    {
        $('#' + name).on('click', function () {

            console.log(SAVE_SEL_ARR);

            var pid = $(this).attr('pid');

            SAVE_SEL_ARR[pid] = $(this).attr('sid');

            var selStr = SAVE_SEL_ARR.join('_');

            console.log(selStr);

            var  re =  new RegExp('^_*')

            var sel =  selStr.replace(re,'');

            var goodId = $('#goodsId').val();

            $.get('../getgoodSelPrice?sel=' + sel +'&gid=' + goodId , function (data) {



            });

        });

    }
