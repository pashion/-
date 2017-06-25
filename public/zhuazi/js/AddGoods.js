

    var ADD_SEL_PRICE_TR = [] ;     //用于存储用户添加的选项名和选项值,用于生成选项价格表
    var MUST_INPUT_TMP = [];        //必填标签标记,用于点击提交的时候,判断是否正确填入
    var PAR_SEL_TMP = 0 ;           //属性模板添加值,添加一个模块后+1,删除一个模块后-1

    var PAR_NAME_ARR = 0;           //属性名称数组,用于生成--选项价格列表
    var SEL_NAME_VAL_OBJ = 0;       //选项名称和值对象用于生成--选项价格列表

    var PAR_SEL_TMP_ARR = [] ;          //选项标记组
    var PRICE_SEL_TMP = [] ;        //价格标记组


    //初始化
    $(function () {

        MUST_INPUT_TMP['goodName']  = 0;        //如果为1,说明价格通过了验证
        MUST_INPUT_TMP['price']     = 0;        //如果为1,说明价格通过了验证
        MUST_INPUT_TMP['stockAll']  = 0;        //如果为1,说明选择库存通过了验证
        MUST_INPUT_TMP['风格']      = 0;        //如果为1,说明选择了风格
        MUST_INPUT_TMP['区域']      = 0;        //如果为1,说明选择了区域
        MUST_INPUT_TMP['goodKind']  = 0;        //如果为1,说明选择了商品种类
        MUST_INPUT_TMP['pic']       = 0;        //图片标记
        MUST_INPUT_TMP['depict']    = 0;        //描述标记价格标记

        PAR_SEL_TMP_ARR['goodPar']   = 0;        //如果为1,说明添加的商品选项,需要校验是否确定了选项
        PAR_SEL_TMP_ARR['affSel']    = 0;        //如果为1,说明确定了选项

        PRICE_SEL_TMP['addPrice']  = 0;        //如果为1,说明确定了添加了选项价格
        PRICE_SEL_TMP['affPrice']  = 0;        //如果为1,说明确定确认了价格



        select();//加载 下拉框 事件
        fileChang();//加载 选择框改变 事件
        loadEvenAddLog(); //加载 图片添加按钮 事件
        loadParAff();   //加载属性确认按钮
        loadConmitBtn();//加载提交按钮


        loadPriceBlurEven()//商品 名验证
        loadGoodNameBlurEven()////价格验证
        loadStockAllBlurEven()//库存验证
        loadDisStyleAllBlurEven()//类别验证
        loadDesrTextarea()//描述框验证


    });



    //提交按钮事件
    function loadConmitBtn ()
    {
        $('#conmitData').on('click', function () {

            //判断必填选项
            for ( a in MUST_INPUT_TMP) {
                MUST_INPUT_TMP[a]? 1 : errorMig (a) ;
            }


            //判断是否添加了选项
            if (PAR_SEL_TMP_ARR['goodPar'])  {
                PAR_SEL_TMP_ARR['affSel']? 1 : errorMig ('goodSelTr') ;
            }

            //判断是否添加了价格
            if ( PRICE_SEL_TMP['addPrice'] ) {
                PRICE_SEL_TMP['affPrice']? 1 : errorMig ('goodPriceTr') ;
            }

            //验证参数框
            $('#specBox').children().each(function () {

                var bool =  parseInt($(this).attr('tmp'));

                if (bool) {
                    errorMig("goodsSpecTr");
                }

            });


            $('#formCon').submit();
        });
    }




    //错误处理
    function errorMig (id)
    {
        $('#'+id).attr('class', 'bg-danger');

        throw SyntaxError();
    }



    //加载--商品名称框改变事件, 校验
    function loadGoodNameBlurEven ()
    {
        $('input[name=goodName]').on('input porpertychange', function () {
            var str = '<span>名称必须是中文,英文,数字,-/=号组成,最少5个字符,长度不能超过40个字符</span>';
            var bool =  new RegExp('^[a-zA-Z0-9,\u4E00-\u9FA5\uF900-\uFA2D,-|=]{5,40}$').test($(this).val());
            //调用样式方法
            YorNStyle($(this), bool, str);
            bool?MUST_INPUT_TMP['goodName'] = 1:MUST_INPUT_TMP['goodName'] = 0;
        });
    }

    //加载--商品价格框改变事件, 校验
    function loadPriceBlurEven ()
    {
        $('input[name=price]').on('input porpertychange', function () {
            var str = '<span>价格必须是数字,可以带有2位小数,<br>如果你有一位小数必须按照这样的样式写:12.10</span>';
            var bool =  new RegExp('^[0-9]{1,4}(.[0-9]{2})?$').test($(this).val());
            //调用样式方法
            YorNStyle($(this), bool, str);
            bool?MUST_INPUT_TMP['price'] = 1:MUST_INPUT_TMP['price'] = 0;
        });
    }

    //加载---库存--改变事件, 校验
    function loadStockAllBlurEven ()
    {
        $('input[name=stockAll]').on('input porpertychange', function () {
            var str = '<span>您必须输入数字,并且不能超过99999</span>';
            var bool =  new RegExp('^[1-9]{1,5}$').test($(this).val());
            //调用样式方法
            YorNStyle($(this), bool, str);
            bool?MUST_INPUT_TMP['stockAll'] = 1:MUST_INPUT_TMP['stockAll'] = 0;
        });
    }

    //加载---单选框--改变事件, 校验
    function loadDisStyleAllBlurEven ()
    {
        $('.disStyle').on('click', function () {
            var id = $(this).attr('name');
            $('#'+id).attr('class', 'bg-success');
            MUST_INPUT_TMP[id] = 1;
        });
    }


    //加载描述框验证
    function loadDesrTextarea ()
    {
        $('.desr').on('input porpertychange', function () {
            var str = '<span>最少输入10个字符,最多输入80个字符,不能换行</span>';
            var bool =  new RegExp('^[a-zA-Z0-9,\',\.\u4E00-\u9FA5\uF900-\uFA2D]{5,80}$').test($(this).val());
            //调用样式方法
            YorNStyle($(this), bool, str);
            bool?MUST_INPUT_TMP['depict'] = 1:MUST_INPUT_TMP['depict'] = 0;
        });
    }

    //正确或错误样式
    function  YorNStyle (obj, bool, mig)
    {
        if (!bool) {
            obj.parent().next().html(mig);
            obj.parent().parent().attr('class', 'bg-danger');
        } else {
            obj.parent().next().html('可以使用');
            obj.parent().parent().attr('class', 'bg-success');
        }
    }


// ======================================================图片上传预览=======================================================

    //加载 图片添加按钮 事件
    function loadEvenAddLog ()
    {
        $('#addLog').on('click', function () {
            var num = parseInt( $(this).attr('num') ); //转换数据类型
            if(num >= 5){ //判断有多少张图片
                $(this).next().html('<center>最多只能添加5展示张图片</center>');
                return false;
            }
            $(this).parent().children('.fileUp').click(); //触发点击事件


        });
    }

    //选择框改变事件
    function fileChang ()
    {
        $('.fileUp').on('change', function () {

            var fileObj = $(this);
            var formData = new FormData();

            //准备上传数据,使用HTNL5新对象formData,保存数据
            formData.append("image", $(this)[0].files[0]);
            formData.append("name", 'image' );
            formData.append('_token', $('#token').val());

            //准备回调方法,这里写你获取到上传结果,0 为失败,获取到 文件名 为成功
            function gg (picName) {
                if(picName  == '' ){
                    fileObj.prev().html('<center style="color:red">上传失败</center>');
                    return falses;
                }
                MUST_INPUT_TMP['pic'] +=1;//标记点解了添加按钮
                //拼接字符串
                var str  = '<td>' +
                    '<div sytle="margin:10px;">' +
                    '<img width="130" height="130" class="img-thumbnail" src="file/reducepic?name=tempPicDir/'+picName+'">' +
                    '</div>' +
                    '<center  style="color:green">上传成功</center>' +
                    '<center picName="'+picName+'" class="del'+MUST_INPUT_TMP['pic']+'" ><label>删除</label></center>' +
                    '<input type="hidden" name="pic[]" value="'+picName+'">'+
                    '</td>';

                fileObj.parent().parent().before(str);//显示图片
                //添加次数
                var num = (parseInt($('#addLog').attr('num')) + 1);
                $('#addLog').attr('num', num);
                fileObj.prev().html('<center style="color:green">上传成功</center>');//显示信息

                var inputStr = '<input type="hidden" name="picName[]" value="'+picName+'">';
                $('#pic').attr('class', 'bg-success');//改变颜色



                priDleBtnEven()//加载删除事件


            }

            //执行已经包装好的ajaxFile方法
            ajaxFile('file/upload', formData, gg);

        });

    }

    //删除按钮
    function priDleBtnEven ()
    {
        var name = '.del' + MUST_INPUT_TMP['pic'];

        $(name).on('click', function () {
            var delObj = $(this);
            var picName = $(this).attr('picName');
            $.get('file/upload?name=' + picName,  function (delData) {
                if (delData) {
                    delObj.next().html('删除成功');
                    delObj.parent().remove();
                    MUST_INPUT_TMP['pic'] -= 1 ;
                    if ( !MUST_INPUT_TMP['pic']) {
                        $('#pic').attr('class', 'bg-danger');
                    }

                }
            });

        });

        $(name).on('mouseout', function () {
            $(this).first().css('color', '');
        });
        //鼠标进入
        $(name).on('mouseover', function () {
            $(this).first().css('color', 'red');
        });

    }

    //ajax文件上传方法,默认post上传,(地址, formData对象, 回调方法(data))
    function ajaxFile (url, formData, func)
    {
        $.ajax({
            url : url,
            type : 'POST',
            data : formData,
            // 告诉jQuery不要去处理发送的数据
            processData : false,
            // 告诉jQuery不要去设置Content-Type请求头
            contentType : false,
            beforeSend:function(){

            },
            success : function(responseStr) {
                func(responseStr);//回调方法
            },
            error : function(responseStr) {

            }
        });
    }



//==========================================属性添加=========================================

    //====================================================================================================================下拉框事件
    function select ()
    {
        $('.sele').on('change', function () {

            var num =  $(this).val();//获取自身的值
            var seleObj =  $(this);//保存对象

            //查询数据库
            $.get('../goodsType?id=' + num, function (data) {


                var selStr = '<td><select style="width:100px;" class="select2_group form-control parHead">' +
                    '<option>请选择</option>';
                for(var a = 0  ; a < data.length ; a++){
                    selStr += "<option value='"+data[a]['id']+"'>"+data[a]['name']+"</option>";
                }
                selStr += "</select><td>";

                $('#goodKind').attr('class', 'bg-danger');//修改颜色

                seleObj.parent().nextAll().remove();//删除后面所有标签
                seleObj.parent().after(selStr);//插入
                loadParHead();//加载后面一个选择框的事件

                //清除之前的设置
                $('.selKind').html('');//清空--选项种类
                $('.selTableTd').html('');//清空价格选择按钮
                $('.spec').html('');//清空--规格参数
                $('#parTable').html('');//清空--属性选择表
                $('.parEdit').css('display', 'none');//隐藏修改按钮
                $('.parAff').css('display', 'none');//隐藏切断按钮


                MUST_INPUT_TMP['goodKind'] = 0 ; //种类选项标记


            },'json');
        });
    }
//========================================================================================================================下拉框2事件
    function loadParHead ()
    {
        $('.parHead').on('change', function () {

            var num =  $(this).val();//获取自身的值
            var seleObj =  $(this);//保存对象

            //查询数据库
            $.get('../goodsSpenc/' + num, function (data) {

                if(data == ''){
                    return false;
                }

                var selStr = '<td><select style="width:200px;" class="select2_group form-control seleKind">' +
                    '<option>请选择</option>';
                for(var a = 0  ; a < data.length ; a++){
                    selStr += "<option value='"+data[a]['id']+"'>"+data[a]['name']+"</option>";
                }
                selStr += '</select><td><td><a class="btn btn-default btn-sm addPar">添加</a><span></span></td>' +
                    '<input type="hidden" name="kind" value="'+num+'">';


                MUST_INPUT_TMP['goodKind'] = 1 ; //添加必选标记

                $('#goodKind').attr('class', 'bg-success');//修改--种类--颜色
                $('#goodParTr').attr('class', 'bg-success');//修改--属性--颜色
                $('#goodSelTr').attr('class', 'bg-success');//修改--选项--颜色
                $('#goodPriceTr').attr('class', 'bg-success');//修改--价格--颜色


                //清除之前样式
                $('.selKind').html('');//清空位置
                $('.selKind').html(selStr);//写入数据
                $('.selTableTd').html('');//清空价格选择按钮
                $('.spec').html('');//清空--规格参数
                $('#parTable').html('');//清空--属性选择表
                $('.parEdit').css('display', 'none');//隐藏修改按钮
                $('.parAff').css('display', 'none');//隐藏切断按钮

                 specSel(data);//加载-规格列表-事件
                 addBut();//加载 "添加" 按钮事件


            },'json');
        });

    }


//========================================================================================================================加载--添加--按钮
    function addBut ()
    {
        //点击事件
        $('.addPar').on('click', function () {



            var id = $('.seleKind').val();//获取选中的值
            var name= $(".seleKind option:selected").text();//获取选中的文本




            $(this).next().html('');
            //检验是否合法 选项
            if (name ==  '请选择') {
                $(this).next().html("<td style='color:red;'>不能选择该选项</td>");
                throw SyntaxError();
            }

            //检验是否已经添加该值
            var isPar  =  '';
            $('td[class=par]').each(function () {
                if($(this).attr('val') == id ){
                    isPar = 1;
                }
            });
            if( isPar == 1 ) {
                $(this).next().html("<td style='color:red;'>不能添加同样的属性</td>");
                return false
            }


            PAR_SEL_TMP += 1 ;//点了添加按钮的标记,别处有用到勿删

            console.log(PAR_SEL_TMP_ARR['goodPar']);
            PAR_SEL_TMP_ARR['goodPar'] = 1 ;  //标记点击了添加选项按钮

            console.log(PAR_SEL_TMP_ARR['goodPar']);
            //装备字符
            var str  = '' ;
            str += "<tr><td width='10%' class='par' val='"+id+"'>"+name+" </td>" +
                "<td width='40%' class='parSelTd'></td>";
            str += '<td class="addSelCon"><input style="width:100px;" type="text" class="pull-left form-control parInput" placeholder="输入选项名">';
            str += '<a class="pull-left btn btn-default btn-sm addParSel">添加选项</a>';
            str += '<a class="pull-left btn btn-default btn-sm addParPic">添加图片</a>';
            str += '<a class="pull-left btn btn-default btn-sm addParCel'+PAR_SEL_TMP+'">取消</a></td>';
            str += '<tr>';

            $('#parTable').append(str);//添加html
            $('#goodSelTr').attr('class','');//修改--选项--颜色
            $('.parAff').css('display', 'block');//显示隐藏按钮

            selBut();//加载--添加选项--按钮事件
            cancel(PAR_SEL_TMP);//加载--取消--按钮事件
            CKECK_PAR_AFF = 1;//判断是否添加了选项的标记

        });
    }

//=========================================================================================================================加载--添加选项--按钮
    function  selBut ()
    {
        $('.addParSel').on('click', function () {

            var trChObj = $(this).parent().parent().children();//获取th对象子对象集合

            var val = trChObj.eq(2).children('input').val();//获取文本框值
            trChObj.eq(2).children('input').val('');
            trChObj.eq(2).children('input').focus();
            var pid = trChObj.eq(0).attr('val'); //获取选项父id

            if(val == ''){
                var val = trChObj.eq(2).children('input');
                return false;
            }

            var num = ( parseInt( $('.parAff').attr('data') ) + 1 );//选项值+1
            $('.parAff').attr('data', num);


            var str  = '<span class="tag input-sm" selName="'+val+'" selVal="'+num+'">' +
                '<span class="pull-left" >'+val+'</span>&nbsp;&nbsp;' +
                '<label class="pull-right parDel" >X</label>' +
                '<input type="hidden" name="par['+pid+']['+num+']" value="'+val+'"></span>';//拼接表单


            trChObj.eq(1).append(str);//写入td标签

            parDelBut();//加载选项删除按钮事件

            $(this).parent().parent().attr('class', 'bg-success');//修改--选项--颜色

        });
    }

//=========================================================================================================================加载--属性确认--按钮
    function  loadParAff ()
    {
        $('.parAff').on('click', function () {          //确认按钮点击事件

            var parName = [];//属性名数组
            var SelNameVal = [];//选项值\名数组
            var isParNull = '1';
           $('.parSelTd').each(function () {                   //循环承载选项的td表格
               var parVal = $(this).prev().attr('val');        //获取到属性值
               parName[parVal] = $(this).prev().html();        //获取属性名

               var arr = [];
               $(this).children().each(function (){            //循环遍历选项
                    var selVal = $(this).attr('selVal');       //获取选项值
                    var selName =  $(this).attr('selName')     //获取选项名
                    arr[selVal] = selName;
               });

               SelNameVal[parVal] = arr;              //写入数组

           });


            //判断是否为空
            $(this).next().html('');
            if(SelNameVal[1] == 0)  {
                $(this).next().html('选项不能为空');
                return false;
            }

            $(this).css('display', 'none');//隐藏
            $('.parEdit').css('display', 'block');//显示

            loseParSel('none');//失效所有选项
            loadParEditBtn();//加载属性修改按钮

            PAR_NAME_ARR = parName; //保存,用于生成价格列表
            SEL_NAME_VAL_OBJ = SelNameVal;//保存,用于生成价格列表

            // createSelTable(parName, SelNameVal);//调用方法生成表格

            $('#goodSelTr').attr('class', 'bg-success');//修改--选项--颜色


            PAR_SEL_TMP_ARR['affSel'] = 1 ; //属性选项确定标记

            var strBtn = '<a class="pull-left btn btn-default btn-sm addSelPrice">添加选项价格</a>'
            $('.selTableTd').append(strBtn);
            loadAddSelPriceEven();//记载添加价格按钮

        });
    }

    //记载添加价格按钮
    function loadAddSelPriceEven ()
    {
        $('.addSelPrice').on('click', function () {
            ADD_PRICE_TMP = 1 ;//添加了价格的标记
            PRICE_SEL_TMP['addPrice'] = 1 ; //添加了价格的标记
            createSelTable(PAR_NAME_ARR, SEL_NAME_VAL_OBJ);

        });
    }

//========================================================================================================================控制属性添加按钮,显示\隐藏
    function loseParSel (way)
    {
        $('.addSelCon').css('display',way);//隐藏相关控件
        $('.parDel').css('display', way); //X框
        $('.addPar').css('display', way);  //添加
    }



//========================================================================================================================加载--修改--按钮
    function  loadParEditBtn ()
    {
        $('.parEdit').on('click', function () {

            $(this).css('display', 'none'); //修改按钮隐藏
            $('.parAff').css('display', 'block');//确认按钮显示
            $('.selTableTd').html('');//清空价格列表
            loseParSel('block');//显示相关按钮
            $('.parDel').css('display', 'block');

            PRICE_SEL_TMP['addPrice'] = 0 ; //添加价格标记
            PRICE_SEL_TMP['affPrice'] = 0 ; //确定价格的标记

            PAR_SEL_TMP_ARR['affSel'] = 0 ;     //属性选项确定标记

        });
    }


//========================================================================================================================用于生成选项价格表
    function createSelTable (parName, SelNameVal)
    {

        //遍历属性名
        var str = '<table id="priceTable"><tr>';
        for ( a in parName) {
            str += '<td>'+parName[a]+'</td>';
        }
        str +='<td width="40">价格</td><td width="40">库存</td></tr>';

        str += selTableTr(SelNameVal) ;

        str += '</table>';

        str += '<span id="inputBox"></span>'

        ADD_SEL_PRICE_TR = selTableTr(SelNameVal);//存入全局变量供添加按钮使用

        $('.selTableTd').html('');//清空td表格
        $('.selTableTd').append(str);//吧table写入td

        var btnStr = '<table><tr><td>' +
            '<a style="width:120px;" class="btn btn-default btn-sm addPriceSel ">添加</a>' +
            '</td><td>' +
            '<a style="display:none;width:120px;" class="btn btn-default btn-sm revise">修改</a>' +
            '<a style="width:120px;" class="btn btn-default btn-sm affPrice">确定价格</a></td><td></span><span class="migPrice">' +
            '</td></tr></table>';

        $('.selTableTd').append(btnStr);

        loadAffPrice()//加载--确定价格--事件
        loadAddSelPriceBtn() //加载选项--添加--按钮事件
        LoaddelPriceSel();//加载价格--删除--事件
    }
//========================================================================================================================价格列表--添加--按钮
    function loadAddSelPriceBtn ()
    {
        $('.addPriceSel').on('click', function () {
            $('#priceTable').append(ADD_SEL_PRICE_TR);
            LoaddelPriceSel();//加载价格--删除--事件
        });

    }

//========================================================================================================================加载--确定价格--按钮事件
    function loadAffPrice ()
    {
        $('.affPrice').on('click', function () {

            if (!$('#priceTable').children('tbody').children().is('.selSelPriceTr')) {
                $('.migPrice').html('<span class="mig" style="color:red">请添加选项</span>');
                throw SyntaxError();
            }

            var affPriceObj  =  $(this); //获取按钮对象
            var num1 = 0; //计数器
            var selData = []; //存储所有
            var checkSel = [];
            $('.migPrice').html(''); //清空信息栏

            $('.selSelPriceTr').each(function () {  //遍历TR

                var data = [] ; //存储一行的所有数据
                var numStrArr = []; //存储选项号码串
                var selStrArr = [];//存储选项字符串
                var isnNull = 0;//判断标记
                var num = 0 ;
                $(this).children().each(function () { //遍历TD
                    if( $(this).children().is('.selPrice')  ) {
                        var val = $(this).children('.selPrice').val();
                        if( val == '' ){
                            isnNull = 1;
                            return false;
                        }
                        data['price'] = val ;//存储价格
                    }

                    if( $(this).children().is('.selKu')  ) {
                        var val =  $(this).children('.selKu').val()
                        if (val == '') {
                            isnNull = 1;
                            return false;
                        }
                        data['ku'] = val ;//存储库存
                    }

                    if ( $(this).children().is('select')  ) {

                        numStrArr[num] = $(this).children('select').val();//存储库存
                        selStrArr[num] = $(this).children().find("option:selected").text();//存储库存

                    }
                    num += 1 ;
                });

                //判断数据是否合法
                if (isnNull) {
                    $('.migPrice').html('<span class="mig" style="color:red">存在空的价格或库存,价格或库存不能为空</span>');
                    throw SyntaxError('价格或库存不能为空');
                    $('#goodPriceTr').attr('class', 'bg-danger');
                    return false;
                }


                //拼接数据
                var numStr = numStrArr.join('_');//拼接号码字串
                var selStr = selStrArr.join('_');//拼接字符字串

                data['numStr'] = numStr;        //写入行数据组,字符串
                data['selStr'] = selStr;        //写入行数据组,号码串

                //判断是否已经存同样的选项组
                if (!checkSel.indexOf(selStr)) {
                    $('.migPrice').html('<span class="mig" style="color:red">不能存在同样的选项组</span>');
                    $('#goodPriceTr').attr('class', 'bg-danger');
                    throw SyntaxError();
                }

                checkSel[num1] = selStr;//把字串写入整齐数据组,该组只有但一个拼接字串,:红_小_中
                selData[num1] = data;//写入整体数据组
                num1 +=1;

            });

            var str = '' ; //装载input标签
            for( a in selData){

                str += '<input type="hidden" name="selPrice['+selData[a]['selStr']+'][]" value="'+selData[a]['price']+'">' +
                    '<input type="hidden" name="selPrice['+selData[a]['selStr']+'][]" value="'+selData[a]['ku']+'">' +
                    '<input type="hidden" name="selPrice['+selData[a]['selStr']+'][]" value="'+selData[a]['numStr']+'">' +
                    '<input type="hidden" name="selPrice['+selData[a]['selStr']+'][]" value="'+selData[a]['selStr']+'">';
            }

            $('.selTableTd').append(str);//写入td表格内部

            priceBtnCancel('none');//隐藏按钮
            $('.revise').css('display', 'block');//显示价格修改按钮
            loadRevisePriceBtn();//加载价格列表--修改--按钮

            PRICE_SEL_TMP['affPrice'] = 1 ; //价格标记
            $('#goodPriceTr').attr('class', 'bg-success');

        });

    }


//========================================================================================================================隐藏相关按钮
    function priceBtnCancel (way)
    {
        $('.parEdit').css('display', way);//隐藏属性修改按钮
        $('.addPriceSel').css('display', way);//隐藏属性添加按钮
        $('.affPrice').css('display', way);//隐藏属性添加按钮
        $('.delPriceSel').css('display', way);//隐藏属性添加按钮
    }


//========================================================================================================================价格列表--修改--按钮
    function loadRevisePriceBtn ()
    {
        $('.revise').on('click', function () {
            priceBtnCancel('block');//显示相关按钮
            $('#inputBox').html('');//清空input标签
            $(this).css('display', 'none');
            ADD_PRICE_TMP = 0 ;//添加价格标记

            PRICE_SEL_TMP['affPrice'] = 0 ;//确定价格标记
        });
    }


//========================================================================================================================价格选项的添加行html
    function selTableTr (SelNameVal)
    {
        //循环拼接选项
        var str = '<tr class="selSelPriceTr">';
        for ( a in SelNameVal ) {
            str +='<td><select  class="select2_group form-control">';

            for( b in SelNameVal[a] ){
                str += '<option value="'+b+'">'+SelNameVal[a][b]+'</option>'
            }

            str +='</select></td>';
        }
        str  += '<td><input style="width:70px;" class="date-picker form-control col-md-7 col-xs-12 selPrice" required="required" type="text"></td>' +
            '<td><input style="width:70px;" class="date-picker form-control col-md-7 col-xs-12 selKu" required="required" type="text"></td>' +
        '<td><a style="width:60px;" class="btn btn-default btn-sm delPriceSel">删除</a></td></tr>';




        return str ;

    }


//========================================================================================================================加载--添加图片-按钮事件
    function loadAddParPic ()
    {
        $('.addParPic').on('click', function () {

            var addParPicObj = $(this);
            addParPicObj.next().click();

        });

    }


//========================================================================================================================加载--选项删除按钮事件
    function parDelBut ()
    {
        $('.parDel').on('click', function () {
            $(this).parent().remove();
        });
    }

//========================================================================================================================加载--取消--按钮事件
    function cancel (tmp)
    {
        $('.addParCel'+tmp ).on('click', function () {

            PAR_SEL_TMP -= 1;
            $(this).parent().parent().remove();

            if (!PAR_SEL_TMP) {
                $('.parAff').css('display', 'none');
                $('#goodSelTr').attr('class', 'bg-success');//修改--选项--颜色
                PAR_SEL_TMP_ARR['goodPar'] = 0 ;
            }

        });
    }

//删除选项价格
    function LoaddelPriceSel ()
    {
        $('.delPriceSel').on('click', function () {
            $(this).parent().parent().remove();
        });
    }
//========================================================================================================================加载-规格列表-事件
    function specSel (dataObj)
    {

        var  str = '<sapn style="color:red;">红色选项为必填选项,  多项值请用"/"号分割</sapn><br><div id="specBox">';

        for (var a = 0 ; a < dataObj.length ; a++) {

            var cssType = 'pull-left bg-success';
            if (dataObj[a]['must']) {
                cssType = 'pull-left bg-danger';
            }
            str +="<div style='margin:2px; padding:7px' tmp='"+dataObj[a]['must']+"' class='specTextBox "+cssType+"'>" +
                "<div style='font-size:15px;'>"+dataObj[a]['name']+"</div>" +
                "<div class='pull-left'><input style='width:120px;' class='specText form-control col-md-7 col-xs-12 ' type='text' name='specArr[]["+dataObj[a]['id']+"]' >" +
                "</div></div>";
        }
        str += '</div>';

        $('#spec').html(str);

        loadSpecTextEven();//加载文本框事件

    }

    //加载文本框事件
    function loadSpecTextEven ()
    {
        $('.specText').on('blur', function () {
            var bool  = new RegExp('^[a-zA-Z0-9,.:/;*()@]{1,40}').test($(this).val());
            if (bool) {
                $(this).parent().parent().attr({'tmp': 0, 'class': 'pull-left bg-success'});
            } else {
                $(this).parent().parent().attr({'tmp': 1, 'class': 'pull-left bg-danger'});
            }
        });
    }


