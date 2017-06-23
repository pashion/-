

    var ADD_SEL_PRICE_TR = [] ;     //用于存储用户添加的选项名和选项值,用于生成选项价格表

    var CKECK_PRICE_AFF = 0;        //如果确认了价格选项,这个标志值会=1
    var CKECK_PAR_AFF = 0;          //如果添加了属性选项模块那么,这个标准值等于1

    var PAR_SEL_TMP = 0 ;           //属性模板添加值,添加一个模块后+1,删除一个模块后-1

    //初始化
    $(function () {

        select();//加载 下拉框 事件
        fileChang();//加载 选择框改变 事件
        loadEvenAddLog(); //加载 图片添加按钮 事件
        loadParAff();   //加载属性确认按钮

        loadConmitBtn();//加载提交按钮


    });


    //提交按钮事件
    function loadConmitBtn ()
    {
        $('#conmitData').on('click', function () {

            console.log(CKECK_PAR_AFF);
            console.log(CKECK_PRICE_AFF);
            if (CKECK_PAR_AFF) {
                if (!CKECK_PRICE_AFF) {
                    $('#submitMig').html('<span style="font-size:15px; color:red;">请先确定选项价格</span>');
                    throw SyntaxError('');
                }
            }


            $('#formCon').submit();
        });
    }



    function checkGoodsName (name)
    {

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
                //拼接字符串
                var str  = '<td>' +
                    '<div sytle="margin:10px;">' +
                    '<img width="130" height="130" class="img-thumbnail" src="../tempPicDir/'+picName+'">' +
                    '</div>' +
                    '<center  style="color:green">上传成功</center>' +
                    '<center class="del" ><label>删除</label></center>' +
                    '<input type="hidden" name="pic[]" value="'+picName+'">'+
                    '</td>';

                fileObj.parent().parent().before(str);//显示图片
                //添加次数
                var num = (parseInt($('#addLog').attr('num')) + 1);
                $('#addLog').attr('num', num);
                fileObj.prev().html('<center style="color:green">上传成功</center>');//显示信息

                var inputStr = '<input type="hidden" name="picName[]" value="'+picName+'">';


                //为新添加的删除按钮设置事件
                var tdObj  = fileObj.parent().parent().prev();
                var delBut = tdObj.children(".del");//选中上一个td中的'删除按钮'
                //点击事件
                delBut.on('click', function () {
                    $.get('file/upload?name=' + picName,  function (delData) {
                        if (delData) {
                            tdObj.next().children().first().children('.mig').html('删除成功');
                            tdObj.remove();
                        }
                    });

                });
                //鼠标离开
                delBut.on('mouseout', function () {
                    delBut.first().css('color', '');
                });
                //鼠标进入
                delBut.on('mouseover', function () {
                    delBut.first().css('color', 'red');
                });

            }

            //执行已经包装好的ajaxFile方法
            ajaxFile('file/upload', formData, gg);

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
                console.log("正在进行，请稍候");
            },
            success : function(responseStr) {
                func(responseStr);//回调方法
            },
            error : function(responseStr) {
                console.log("error");
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

                seleObj.parent().nextAll().remove();//删除后面所有标签
                seleObj.parent().after(selStr);//插入
                loadParHead();//加载后面一个选择框的事件



                $('.selKind').html('');//清空--选项种类
                $('.selTableTd').html('');//清空价格选择按钮
                $('.spec').html('');//清空--规格参数
                $('#parTable').html('');//清空--属性选择表

                $('.parEdit').css('display', 'none');//隐藏修改按钮
                $('.parAff').css('display', 'none');//隐藏切断按钮


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

                var selStr = '<td><select style="width:200px;" class="select2_group form-control seleKind">';
                for(var a = 0  ; a < data.length ; a++){
                    selStr += "<option value='"+data[a]['id']+"'>"+data[a]['name']+"</option>";
                }
                selStr += '</select><td><td><a class="btn btn-default btn-sm addPar">添加</a><span></span></td>' +
                    '<input type="hidden" name="kind" value="'+num+'">';


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


            //检验是否已经添加该值
            var isPar  =  '';
            $('td[class=par]').each(function () {
                if($(this).attr('val') == id ){
                    isPar = 1;
                }
            });
            if( isPar == 1 ) {
                $(this).next().html("<td>不能添加同样的属性</td>");
                return false
            }

            //装备字符
            var str  = '' ;
            str += "<tr><td width='10%' class='par' val='"+id+"'>"+name+" </td>" +
                "<td width='50%' class='parSelTd'></td>";
            str += '<td><input style="width:100px;" type="text" class="form-control parInput" placeholder="输入选项名"></td>';
            str += '<td><a class="btn btn-default btn-sm addParSel">添加选项</a></td>';
            str += '<td><a class="btn btn-default btn-sm addParPic">添加图片</a>' +
                '<input type="file" style="display:none;" class="selParPic"></td>';
            str += '<td><a class="btn btn-default btn-sm addParCel">取消</a></td>';
            str += '<tr>';



            $('#parTable').append(str);




            $('.parAff').css('display', 'block');

            PAR_SEL_TMP += 1 ;

            selBut();//加载--添加选项--按钮事件
            cancel();//加载--取消--按钮事件

            CKECK_PAR_AFF = 1;//判断是否添加了选项的标记

        });
    }

//=========================================================================================================================加载--添加选项--按钮
    function  selBut ()
    {
        $('.addParSel').on('click', function () {

            var trChObj = $(this).parent().parent().children();//获取th对象子对象集合

            var val = trChObj.eq(2).children('input').val();//获取文本框值
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

        });
    }


//=========================================================================================================================加载--属性确认--按钮
    function  loadParAff ()
    {
        $('.parAff').on('click', function () {          //确认按钮点击事件

            var parName = [];//属性名数组
            var SelNameVal = [];//选项值\名数组
            var isParNull = '1';
           $('.parSelTd').each(function () {                    //循环承载选项的td表格
                var parVal = $(this).prev().attr('val');        //获取到属性值
               parName[parVal] = $(this).prev().html();         //获取属性名

               var arr = [];
               $(this).children().each(function (){             //循环遍历选项
                    var selVal = $(this).attr('selVal');        //获取选项值
                    var selName =  $(this).attr('selName')     //获取选项名
                    arr[selVal] = selName;
               });

               SelNameVal[parVal] = arr;              //写入数组

           });

           console.log(SelNameVal);

            //判断是否为空
            $(this).next().html('');
            if(SelNameVal[1] == 0)  {
                $(this).next().html('选项不能为空');
                return false;
            }

            $(this).css('display', 'none');
            $('.parEdit').css('display', 'block');

            loseParSel('none');//失效所有选项
            loadParEditBtn();//加载属性修改按钮
            createSelTable(parName, SelNameVal);//调用方法生成表格


        });
    }


//========================================================================================================================控制属性添加按钮,显示\隐藏
    function loseParSel (way)
    {

        $('.parDel').css('display', way); //X框
        $('.parInput').css('display', way);//输入框
        $('.addParSel').css('display', way);//添加选项
        $('.addParPic').css('display', way);//添加图片
        $('.addParCel').css('display', way);//取消
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
                    return false;
                }
                if (isnNull == 2) {
                    $('.migPrice').html('<span class="mig" style="color:red">价格或库存 不能存在字符</span>');
                    throw SyntaxError('价格或库存不能为空');
                }


                //拼接数据
                var numStr = numStrArr.join('_');//拼接号码字串
                var selStr = selStrArr.join('_');//拼接字符字串

                data['numStr'] = numStr;        //写入行数据组,字符串
                data['selStr'] = selStr;        //写入行数据组,号码串

                //判断是否已经存同样的选项组
                if (!checkSel.indexOf(selStr)) {
                    $('.migPrice').html('<span class="mig" style="color:red">不能存在同样的选项组</span>');
                    throw SyntaxError();
                }

                console.log(checkSel);

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

            CKECK_PRICE_AFF = 1;//确认价格按钮标记

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
    function cancel ()
    {
        $('.addParCel').on('click', function () {
            PAR_SEL_TMP -= 1;
            $(this).parent().parent().remove();

            if (!PAR_SEL_TMP) {
                $('.parAff').css('display', 'none');
            }
            // console.log($(this).parent().parent());
            // console.log($('#parTable').children('tbody').children())
            // if () {
            //     $('.parAff').css('display', 'none');
            // }
        });
    }


    function LoaddelPriceSel ()
    {
        $('.delPriceSel').on('click', function () {
            $(this).parent().parent().remove();
        });
    }



//========================================================================================================================加载-规格列表-事件
    function specSel (dataObj)
    {
        var str = '<tr>';
        for(var a = 0 ; a < dataObj.length ; a++){

            str +="<td width='40'>"+dataObj[a]['name']+"</td>";
            str += "<td>&nbsp&nbsp" +
                "<input style='width:100px;' class='form-control col-md-7 col-xs-12' type='text' name='specArr[]["+dataObj[a]['id']+"]' >" +
                "&nbsp&nbsp</td>";


    }
        str += '</tr>';

        $('#spec').html(str);

    }

