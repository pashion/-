

    $(function () {

        showGoodParSel();

        $('#aaa').on('click', function () {
            console.log();
        });


    })


    function  showGoodParSel ()
    {
        var goodId = $('#goodId').val();
        alert(goodId);
        $.get('../getgoodSel?gid=' + goodId, function (data) {


            //抽取属性名,ID
            var head = [];
            for (a in data) {
                head[data[a]['headId']] =  data[a]['headName'];
            }

            //拼接数据
            var str = '<table style="width:600px; background:red;">' ;
            for (a in head) {
                str += '<tr><td></td><td>';
                for (i in data) {
                    if (data[i]['headId'] == a ) {

                        var sebBtnName = 'selBtn' + data[i]['id'];

                        str += '<div id="'+sebBtnName+'" class="pull-left btn btn-default cheng '+sebBtnName+'">'+data[i]['name']+'</div>';
                        loadSelBtnEven(sebBtnName);

                    }
                }
                str += '</td></tr>';
            }
            str += '</table>' ;

            //写入标签
            console.log(str);
            $('.goodParSelBox').html(str);

        },'json');
    }


    function loadSelBtnEven (name)
    {
        console.log(name);
        $('.cheng').on('click', function () {

            console.log(13);

            alert();
        });

    }
