


    var SAVE_SEL_ADD_CON = []; //存储选项添加按钮操作值
    var SAVE_SEL_DEL_CON = []; //存储选项删除按钮操作值

    var NUM = 0; //计数器.用于创建不同样的删除选项按钮名

    $(function () {

        loadInfoEditBtn();//加载总体修改按钮点击事件
        loadGoodsNameSaveBtn();//加载商品名称修改点击事件

        publicTextCloseBen();//加载共用取消按钮点击事件
        pubicReviseBtnEven();//加载共用修改按钮点击事件

        styleEditBtn();//加载风格/区域修改按钮点击事件

        loadAddEditGoodPic();//加载图片添加按钮
        picDelEven('.delPicBtn');//加载图片删除按钮


        getGoodSelInfo();//获取选项数据0

        createConBox()//创建编辑框架1
        loadEditGoodsSel()//加载--修改商品选项按钮2
        loadAddParBtn()//加载--添加属性按钮3
        loadParEditConcelBtn()//加载--属性取消按钮4

        loadAffParEditBtn()//加载--确定按钮5


    });



    //获取商品选项信息,并添加到指定位置
    function getGoodSelInfo ()
    {
        var  goodId = $('#goodsID').attr('data');
        $.get('goods/' + goodId +'/edit', function (data) {

            //声明一个数字用于抽取装载,属性名
            var headName = [];
            for (a in data) {
                headName[data[a]['headId']] = data[a]['headName'];
            }
            //拼接html
            var str = '<table id="">';
            for (a in headName) {
                str  += '<tr class="oriParSelTr" dataId="'+a+'" name="'+headName[a]+'">' +
                    '<td style="font-size:15px;">'+headName[a]+'</td> <td><div style="margin:10px">';
                for (aa in data ) {
                    if (data[aa]['headId'] == a) {
                        str += '<div class="pull-left btn btn-default"><a data="'+headName[a]+'" class="pull-left selOriContent">'+data[aa]['name']+'<a></div>';
                    }
                }
                str +='</div></td><td class="selConTd"></td> </tr>';
            }
            str += '</table>';

            //添加到指定标签位置
            $('#selTable').html(str);

        },'json');

    }


    //确定按钮
    function loadAffParEditBtn ()
    {
        $('#affParEditBtn').on('click', function () {

            alert();
            //判断组内是否为空
            if (SAVE_SEL_ADD_CON.length == 0 & SAVE_SEL_DEL_CON.length == 0 ) {
                throw SyntaxError();
            }
            //循环对消两个数组中的重复值
            for ( i in SAVE_SEL_ADD_CON ) {

                //问题1,因为对消完第一次后,对消数组已经发生改变,所以第二次对消另外一个对象的时候,就无法对消
                //问题2:调用的方法使用的键值a与目前的键值a发生重叠改变

                //对比返回add数组中不重复值,
                var aa = SAVE_SEL_ADD_CON[i];
                SAVE_SEL_ADD_CON[i] =  delTouArrRepat(SAVE_SEL_DEL_CON[i], SAVE_SEL_ADD_CON[i]);
                SAVE_SEL_DEL_CON[i] =  delTouArrRepat(aa, SAVE_SEL_DEL_CON[i]);
            }

            //准备数据
            var postData = {
                _method : 'PUT',
                _token :  $('#token').val(),
                addSelData : SAVE_SEL_ADD_CON,
                delSelData : SAVE_SEL_DEL_CON,
                goodsCon : 'editSel',
                gid : $('#goodsID').attr('data')
            }

            //发送请求
            $.post('goods/1', postData, function (data) {
                if (!data) {
                    alert();
                    SAVE_SEL_ADD_CON.splice(0,SAVE_SEL_ADD_CON.length);
                    SAVE_SEL_DEL_CON.splice(0,SAVE_SEL_DEL_CON.length);
                    getGoodSelInfo();//获取选项数据0
                    $('#parEditConcelBtn').click(); //关闭控制面板
                }
            });



        });



    }

    //判断是否存在Kye值
    function isKey (text,arr)
    {
        for(k in arr){
            if(k == text){
                return arr[k] ;
            }
        }
        return false;
    }

    //用于保存操作值,保存对选项值的操作(属性值, 选项内容, 保存数组数组)
    function saveAddCon (par, sel, saveArr)
    {
        //判断属性是否在数组里面
        if ( isKey(par, saveArr) ) {
            saveArr[par].push(sel) ;
        } else {
            saveArr[par] = [];
            saveArr[par].push(sel);
        }
        console.log(saveArr);
    }


    //两个数组对比,返回数组2中不重复值
    function delTouArrRepat (arr1, arr2)
    {
        var temp = [];
        var tempSvae = [];
        for ( a  in arr1 ) {
            temp[arr1[a]] = true;
        }
        for ( a in arr2) {
            if (!temp[arr2[a]]) {
                if (arr2[a] != null) {
                    tempSvae.push(arr2[a]);
                }
            }
        }
        return tempSvae;
    }





    //=========================================================================================================================选项控制器

    //创建控制盒子
    function createConBox ()
    {
        //拼接标签
        var str = ' <button id="editGoodsSel" type="button" class="btn btn-default btn-sm ">修改商品选项</button>' +
            '<div id="parSelConBox">' +
                '<div id="parSelToolBtnBox">' +
                '<select name="" id="selList"></select>' +
                ' <button id="parAddBtn" id="addGoodsPar" type="button" class="btn btn-default btn-sm ">添加属性</button>' +
                ' <button id="parEditConcelBtn" type="button" class="btn btn-default btn-sm ">取消</button>' +
                '<span id="parSelConMig"></span>' +
                ' <button id="affParEditBtn" type="button" class="btn btn-default btn-sm pull-right">确定</button>' +
                '</div>' +
                '<table id="parSelConTable" class="parSelEditTable table table-striped">' +
                 '' +
                '<tr>' +
                    '<th width="10%">属性</th><th width="50%">选项</th><th>操作</th>' +
                '</tr>' +

                '</table>' +
            '</div>';

        //写入
        $("#goodsSelConMaxBox").append(str);

        return str;
    }


    //填充控制器
    function paddContent ()
    {
        $('.oriParSelTr').each(function () {
            var str = '';
            var val =   $(this).attr('dataId');
            var name =  $(this).attr('name');

            //拼接名字
            var selDddBtnName = 'selDddBtn' + val;//生成指定添加按钮名
            var selDelBtnName = 'selDelBtn' + val;//生成指定删除按钮名

            str += '<tr class="marParSelTr" data="'+val+'">' +
                '<td>'+name+'</td><td>';

            var cancelBtnNameArr  = [] ;//用于保存新删除选项按钮名,给下放遍历设置事件
            $(this).contents().find('.selOriContent').each(function () {

                var text = $(this).html();
                //创建新名称
                NUM += 1;
                var selCancelBtnName = 'sC'+ NUM;
                //拼接标签
                str  += ' <div style="overflow:hidden;" class="pull-left btn btn-default">' +
                    '<a class="pull-left selContent">'+text+'<a>' +
                    '<div id="'+selCancelBtnName+'" pid="'+val+'"  data = "'+text+'" class="pull-left selClose">' +
                    '&nbsp;&nbsp;X</div></div>';

                //存储名字
                cancelBtnNameArr.push(selCancelBtnName);
            });

            str+= '</td>' +
                '<td  class="selConTd">' +
                '<input type="text">' +
                ' <button type="button" pid="'+val+'" class="btn btn-default btn-sm '+selDddBtnName+'">添加</button>' +
                '<button type="button" class="btn btn-default btn-sm '+selDelBtnName+'">删除</button><span></span>' +
                '</td></tr>';

            //添加入表格
            $('#parSelConTable').append(str);

            //加载事件
            loadSelAddBtn(selDddBtnName);
            loadSelDelBtn(selDelBtnName);

            //循环设置事件
            for ( a in cancelBtnNameArr ) {
                loadSelDel(cancelBtnNameArr[a]);
            }

        });


    }


    //修改按钮事件
    function loadEditGoodsSel ()
    {
        $('#editGoodsSel').on('click', function () {

            $(this).css('display', 'none');//隐形---修改商品选项
            $('#parSelConBox').css('display', 'block');//显示相关控件

            //获取ID
            var tid = $('#goodsKindText').attr('data');

            //发送请求获取规格数据
            $.get('goodsSpec/' + tid, function (data) {

                var str = '';
                for (a in data) {
                    str += '<option value="'+data[a]['id']+'">'+data[a]['name']+'</option>';
                }
                $('#selList').html(str);

            }, 'json');


            paddContent()//填充原有值

        });
    }



    //添加属性--按钮
    function loadAddParBtn ()
    {
        $('#parAddBtn').on('click', function () {

            //获取值
            var name = $('#selList').find('option:selected').text();
            var val = $('#selList').val();  //

            //循环验证
            $('.marParSelTr').each(function () {
                var id = $(this).attr('data');
                if (id == val) {
                    $('#parSelConMig').html('已有属性不能重复添加')
                    throw EtytaxError();
                }
            });

            //生成名字
            var selDddBtnName = 'selDddBtn' + val;//生成指定添加按钮名
            var selDelBtnName = 'selDelBtn' + val;//生成指定删除按钮名

            //拼接标签
            var str = '<tr class="marParSelTr" data="'+val+'">' +
                '<td>'+name+'</td>' +
                '<td></td>' +
                '<td  class="selConTd">' +
                '<input type="text">' +
                ' <button type="button" pid="'+val+'" class="btn btn-default btn-sm '+selDddBtnName+'">添加</button>' +
                '<button type="button" class="btn btn-default btn-sm '+selDelBtnName+'">删除</button><span></span>' +
                '</td>' +
                '</tr>';

            //添加标签
            $('#parSelConTable').append(str);

            loadSelAddBtn(selDddBtnName);
            loadSelDelBtn(selDelBtnName);


        });
    }


    //取消按钮按钮
    function loadParEditConcelBtn ()
    {
        $('#parEditConcelBtn').on('click', function () {
            $('.marParSelTr').remove();
            $('#parSelConBox').css('display', 'none');//显示相关控件
            $('#editGoodsSel').css('display', 'block');//隐形---修改商品选项
        });
    }

    //确定数据按钮
    function loadParEditAffBtn ()
    {

    }

    //添加选项按钮
    function loadSelAddBtn (name)
    {
        $('.'+name).on('click', function () {

            //获取内容
            var val = $(this).prev().val();
            var addBtnObj = $(this);

            NUM += 1;
            var selCancelBtnName = 'sC'+ NUM;//创建新名称

            //验证输入内容
            bool = new   RegExp('^[a-zA-Z0-9,\u4E00-\u9FA5\uF900-\uFA2D,-|=]{1,40}$').test(val);
            if (!bool) {
                addBtnObj.next().next().html('名称不符合规则');
                throw EyntaxError();
            }

            //验证是否重复
            $(this).parent().prev().contents().find('.selContent').each(function () {
                var  text =  $(this).html();
                if (text == val) {
                    addBtnObj.next().next().html('不能提交相同的值');
                    throw SyntaxError();
                }
            });

            parId =  $(this).attr('pid');
            //拼接标签,写入文本,写入商品属性ID给,pid属性
            var str  = ' <div class="pull-left btn btn-default">' +
                '<a class="pull-left selContent">'+val+'<a>' +
                '<div id="'+selCancelBtnName+'" style="display:block;" pid="'+parId+'" data = "'+val+'" class="pull-left selClose">' +
                '&nbsp;&nbsp;X</div></div>';//拼接表单

            //写入标签
            $(this).parent().prev().append(str);

            //加载按钮
            loadSelDel(selCancelBtnName);

            //保存--添加操作
            saveAddCon(parId, val, SAVE_SEL_ADD_CON);

        });
    }


    //属性删除按钮
    function loadSelDelBtn (name)
    {
        $('.' + name).on('click', function () {
            $(this).parent().prev().contents().find('.selClose').click();
            $(this).parent().parent().remove();

        });
    }

    //选项删除
    function loadSelDel  (name)
    {
        $('#'+ name ).on('click', function () {
            $(this).parent().parent().remove();
            var val = $(this).attr('data');
            var parId = $(this).attr('pid');
            saveAddCon(parId, val, SAVE_SEL_DEL_CON);//存储删除数据
        });

    }












    //================================================================================图片处理=================================================
    //加载图片添加按钮
    function loadAddEditGoodPic()
    {
        $('.addEditGoodPic').on('click', function () {
            $('#addPicFile').click();
        });

        //点击事件
        $('#addPicFile').on('change', function () {

            console.log( $('.picBox'));

            console.log($('.picBox').children().length);
            if ($('.picBox').children().length >= 5) {
                $('#picConMig').html('<span style="color:red;">展示图片最多5张</span>');
                throw SyntaxError();
            }

            var fileObj = $(this);
            var formData = new FormData(); //创建表单对象
            var goodId = $('#goodsID').attr('data');

            //准备上传数据,使用HTNL5新对象formData,保存数据
            formData.append("image", $(this)[0].files[0]); //获取图片数据
            formData.append('_token', $('#token').val());
            formData.append('conMode', 1);
            formData.append('id', goodId);

            //回调方法
            function gg  (data) {

                if (data.length == 36) {
                    $('#picConMig').html('<span style="color:green;">添加成功</span>');
                    var name = data.substr(0, 6);
                    var str = '<div class="onPicBox"> ' +
                        '<div  class="picDelBox"><label class="delPicBtn '+name+'" picName="'+data+'" >删除</lable></div> ' +
                        '<div  class="picDiv"><img src="goodsPic/'+data+'" alt="..." class="img-thumbnail"> ' +
                        '</div> </div>';
                    $('.picBox').prepend(str);
                    picDelEven('.'+name);
                }
            }
            // 准备回调方法,这里写你获取到上传结果,0 为失败,获取到 文件名 为成功
            ajaxFile('goods/file/upload', formData, gg);
        });
    }
    //图片删除按钮
    function picDelEven (btnName)
    {
        $(btnName).on('click', function () {

            var name = $(this).attr('picName');
            var goodId = $('#goodsID').attr('data');
            var url = 'goods/file/upload?name='+name+'&conMode=1&goodId='+goodId;
            var delPicBtnObj = $(this);

            //发送
            $.get(url, function (data) {
                if (data == 2) {
                    delPicBtnObj.parent().parent().remove();
                    $('#picConMig').html('<span style="color:green;">删除成功</span>');
                } else {
                    $('#picConMig').html('<span style="color:red;">删除失败</span>');
                }
            });
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

//=================================================================基础信息修改


    //显示修改按钮
    function loadInfoEditBtn ()
    {
        //大修改按钮事件
        $('#infoEditBtn').on('click', function () {
            $('.editBtnMinBox').css('display', 'block');//显示修改按钮
            $(this).css('display', 'none');
            $('#infoEditBtnAff').css('display', 'block');
        });

        //设置确定按钮点击事件
        $('#infoEditBtnAff').on('click', function () {
            $('.editBtnMinBox').css('display', 'none');
            $(this).css('display', 'none');
            $('#infoEditBtn').css('display', 'block');
        });
    }


    //风格/区域修改按钮
    function styleEditBtn()
    {
        //风格
        $('.styleEditBtn').on('click', function () {
            styleAndAreaEdit($(this), 26);
        });

        //区域
        $('.areaEditBtn').on('click', function () {
            styleAndAreaEdit($(this), 27);
        });
    }

    //风格和区域修改事件方法
    function styleAndAreaEdit (obj, tid)
    {
        showLinetBtn(obj);
        $.get('goodsgetstyle?tid=' + tid, function (data) {
            var str = '';
            for (a in data) {
                str += '<input type="radio" ' +
                    'styleName="'+data[a]['name']+'" name="style" value="'+data[a]['id']+'">'+data[a]['name']+'&nbsp;&nbsp;' ;
            }
            var showTextObj = obj.parent().prev().children().first();
            showTextObj.html(str);
        }, 'json');

    }



    //加载名称,价格,库存,描述保存按钮事件
    function loadGoodsNameSaveBtn ()
    {
        //名称
        $('.nameBtnSave').on('click', function ()
        {
            var regExp = '^[a-zA-Z0-9,\u4E00-\u9FA5\uF900-\uFA2D,-|=]{5,40}$';
            var reText = '<span style="color:red;">名称必须是中文,英文,数字,-/=号组成,最少5个字符,长度不能超过40个字符</span>';
            var val = $(this).parent().parent().prev().children().first().next().val();//获取相对内容
            saveBtn( $(this), val, regExp, reText, 'goods');
        });

        //价格
        $('.priceBtnSave').on('click', function  ()
        {
            var regExp = '^[0-9]{1,4}(.[0-9]{2})?$';
            var reText = '<span style="color:red;">价格必须是数字,可以带有2位小数,<br>如果你只有一位小数这样写:12.10</span>';
            var val = $(this).parent().parent().prev().children().first().next().val();//获取相对内容
            saveBtn( $(this), val, regExp, reText, 'price');
        });
        //库存
        $('.stockBtnSave').on('click', function ()
        {
            var regExp = '^[1-9]{1,5}$';
            var reText = '<span style="color:red;">您必须输入数字,并且不能超过99999</span>';
            var val = $(this).parent().parent().prev().children().first().next().val();//获取相对内容
            saveBtn( $(this), val, regExp, reText, 'stockall');
        });

        //描述
        $('.desrBtnSave').on('click', function ()
        {
            var regExp = '^[a-zA-Z0-9,\',\.\u4E00-\u9FA5\uF900-\uFA2D]{5,80}$';
            var reText = '<span style="color:red;">最少输入10个字符,最多输入80个字符,不能换行</span>';
            var val = $(this).parent().parent().prev().children().first().next().val();//获取相对内容
            saveBtn( $(this), val, regExp, reText, 'desr');
        });

        //风格
        $('.sytleBtnSave').on('click', function ()
        {
            var showText =  $(this).parent().parent().prev().children().first();
            var selBtn = showText.children('input:radio:checked');
            var val  = selBtn.val();
            var name = selBtn.attr('styleName');
            saveBtn($(this), val, '', '', 'style', name)//发送数据
        })

        //区域
        $('.areaBtnSave').on('click', function ()
        {
            var showText =  $(this).parent().parent().prev().children().first();
            var selBtn = showText.children('input:radio:checked');
            var val  = selBtn.val();
            var name = selBtn.attr('styleName');
            saveBtn($(this), val, '', '', 'style', name)//发送数据
        })

        //状态
        $('.statuBtnSave').on('click', function ()
        {
            var showText =  $(this).parent().parent().prev().children().first();
            var val = showText.next().val();
            var name = showText.next().find("option:selected").text();
            saveBtn($(this), val, '', '', 'state', name)//发送数据
        });


    }



    //修改请求发送(对象,值,正则,正则规则文本,字段,文本), 如果text不为空,则显示text中的信息,但数据库还是存储val里面的数据
    function saveBtn (obj, val, regExp, reText, field, text)
    {
        obj.parent().next().html('');//清空显示信息
        var bool = RegExp(regExp).test(val);
        //判断返回信息
        if  (!bool) {
            obj.parent().next().html('<span style="color:red;">'+reText+'</span>');//显示信息
            throw SyntexError();
        }
        var showText = obj.parent().parent().prev().children().first();
        //回调方法
        function func (data)
        {
            if (data) {
                obj.next().click();
                if (text) {
                    val = text
                }
                showText.html(val);
                obj.parent().next().html('<span style="color:green;">修改成功</span>');//显示信息
            } else {
                obj.parent().next().html('<span style="color:red;">修改失败</span>');
            }
        }
        //发送请求
        editAjax('goods', field, val, func);
    }



    //修改按钮显示相关
    function pubicReviseBtnEven ()
    {
        $('.nameBtn').on('click', function () {
            showLinetBtn($(this));//显示相关按钮
            var  showTextObj =  $(this).parent().prev().children().first();
            var val = showTextObj.html();
            showTextObj.next().val(val).css('display', 'block');
            showTextObj.html('');
        });
    }

    //取消按钮显示相关
    function publicTextCloseBen ()
    {
        $('.btnCancle').on('click', function () {
            noneLineBtn($(this));
            var  showTextObj =  $(this).parent().parent().prev().children().first();
            var val = showTextObj.next().val();
            showTextObj.next().css('display', 'none');
            showTextObj.html(val);
        });
    }

    //修改显示相关按钮
    function showLinetBtn (obj)
    {
        obj.next().css('display', 'block');
        obj.css('display', 'none');
        $('#infoEditBtnAff').css('display', 'none');
    }

    //取消隐藏相关按钮
    function noneLineBtn (obj)
    {
        obj.parent().css('display', 'none');
        obj.parent().prev().css('display', 'block');
        $('#infoEditBtnAff').css('display', 'block');
    }

    //请求ajax
    function editAjax (table, field, content, func)
    {
        var postData = {
            _token : $('#token').val(),
            _method : 'PUT',
            field  : field,
            table : table,
            content : content,
        };
        var goodsID = $('#goodsID').attr('data');//获取商品id
        //送请求
        $.post('goods/' + goodsID, postData, function (data) {
            func(data);
        });
    }






