


    $(function () {

        buttonLoad();
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

