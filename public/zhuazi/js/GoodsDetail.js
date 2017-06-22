


    $(function () {
        priBut();//加载修改按钮
        seveBut();//保存按钮
    });


    //价格修改按钮
    function priBut ()
    {

        $('.edit').on('click', function () {

            var th = $(this).parent().parent().css('background', 'rgb(242,222,222)');

            var hand = th.children().eq(0).html();
            var  td  =  "<input  type='text' class='form-control' name='bunch_name' value="+hand+">";
            th.children().eq(0).html(td);

            var hand = th.children().eq(1).html();
            var  td  =  "<input style='width:100px;' class='form-control' type='text' name='price' value="+hand+">";
            th.children().eq(1).html(td);

            var hand = th.children().eq(2).html();
            var  td  =  '<input type="text" class="form-control" id="inputPassword"  value='+hand+'>';
            var  td  =  "<input style='width:100px;' class='form-control' type='text' name='price' value="+hand+">";
            th.children().eq(2).html(td);

            $(this).css('display','none').next().css('display','none').next().css('display','block').next().css('display','block');

        });

    }

    function seveBut ()
    {
        $('.seva').

    }