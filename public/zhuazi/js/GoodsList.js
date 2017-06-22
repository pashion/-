


    $(function () {

        buttonLoad();
    });


    function buttonLoad ()
    {
        $('.btn.btn-primary.btn-xs').on('click', function () {

            var goodsId =  $(this).attr('data');
            $.get('./goods/'+goodsId, function (data) {

                $('div[role=main]').html(data);

            });

        });
    }

