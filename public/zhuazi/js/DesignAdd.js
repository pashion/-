

    //初始化
    $(function () {
        loadSubmitEven();//加载提交按钮事件
    })

    //加载提交按钮事件
    function loadSubmitEven ()
    {
        $('#submitBtn').on('click', function () {
            $('#fileSelCase').remove();
        });
    }