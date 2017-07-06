function del($id,$obj,$url){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'DELETE',
        url: $url + $id,
        data: {id: $id},
        success:function(data){
        	console.log(data);
            if(data > 0){
                alert('删除成功');
                $($obj).parent().parent().remove();
            }else{
                alert(data);
                alert('删除失败');
            }
        }
    });
}




// 文章封面修改触发ajax
function cover_upload($url){

    console.log('测试1');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //实例化一个FormData对象,该对象可用来存储文件类型数据来通过ajax传输
    var formData = new FormData();
    //获取文件的数据
    var js_file = document.getElementById('inputId').files[0];
    //将文件数据写入formData对象的一个键内,相当于数组形式
    formData.append("file",js_file); //获取图片数据

    $.ajax({
        type: 'POST',
        url: $url + 'public/Article/ajax' ,
        data: formData,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            // console.log(data);
            var Nul = $.trim(data);
            var mydate = new Date();
            var year = mydate.getFullYear(); //获取完整的年份(4位,1970-????)
            var month = mydate.getMonth() + 1; //获取当前月份(0-11,0代表1月)
            if(month < 10){
                month = '0' + month;
            }
            var day = mydate.getDate(); //获取当前日(1-31)
            var date = year + '-' + month + '-' +day;//拼接日期
            $('#cover').val(data);
            $('#coverpath').val('/public/uploads/cover/'+date);
            $('#show>img').remove();
            $('#show').append(" <img src='" + $url + "public/uploads/cover/" + date + '/t_'+Nul+"'>");
        },
    });
}



//goods_list分类遍历触发
/*
*二级分类下先准备一个div布局,各二级分类下有各自的div块,当二级分类被触发时,传递该分类的id给ajax查询数据库,返回该tid(父id)对应的数据,得到子分类名拼接返回给前台,各二级数据之间互不干扰
*/

$(document).on('click','.filter_link a',function(){
    // console.log($obj);
    // console.log($id);
    //获取点击的a对象,里面绑定需要的参数值:tid,sid,level,myself
    var obj = $(this);
    //tid为该对象的父类
    var tid = obj.attr('tid');
    //sid为该对象的id
    var sid = obj.attr('sid');
    //level为该对象所在的分类层级,分类二层跟三层
    var level = obj.attr('level');
    //被选中对象的id，等于sid
    var myself = obj.attr('myself');

    //当选中的层级为第二层时,清空掉该层的第三层输出内容,并且该层的选中(class='Select')重新赋值
    if(obj.attr('level') == 2){
        obj.parent().children('.next').children().remove();
        obj.parent().children().removeClass('Select');
        obj.addClass('Select');
    }

    //获取二级选中的值
    var other = $('.Select');
    for( var i = 0; i<other.length; i++ ){
        if( $(other[i]).attr('tid') == 3 ){
            var kind = $(other[i]).attr('sid');
        }
        if( $(other[i]).attr('tid') == 4 ){
            var style = $(other[i]).attr('sid');
        }
        if( $(other[i]).attr('tid') == 5 ){
            var area = $(other[i]).attr('sid');
        }
    }

    //当level层级为3的时候,重新给class='Select'赋值
    if(obj.attr('level') == 3){
        obj.parent().children().removeClass('level3');
        obj.addClass('level3');
    }

    // 获取第三层被选中的所有结果,并组合成字符串通过ajax传输给服务器处理,通过判断第三层被选中个数来处理商品显示结果
    var thrble_id = '';
    var three = $('.level3');
    console.log(three);
    for(var i=0;i<three.length;i++){
        thrble_id += $(three[i]).attr('sid')+',';
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ajax发送请求并处理数据
    $.ajax({
        type:'post',
        url:'../goods_list/treble',
        data:{myself:myself,kind:kind,style:style,area:area,thrble_id:thrble_id},
        success:function(data){
            // $obj.nextAll('.next').children().remove();
            //当选中的层级为2时,服务器获取该子类内容并for循环处理结果输出到视图
            if(level == 2){
                var str = '';
                for ( var i = 0; i<data['list'].length; i++){
                str += '<a href="javascript:void(0)" level="3" myself="'+data['list'][i]['id']+'" tid="'+data['list'][i]['tid']+'" sid="'+data['list'][i]['id']+'" >'+data['list'][i]['name']+'</a>';
                }
                obj.nextAll('.next').html(str); 
            }

            //服务器处理层级选中选项,返回满足条件的商品,处理商品数据输出到视图

            var  goods_list = '';
            for( var i=0;i<data['goods'].length;i++ ){
                goods_list += "<li class='product'>";
                goods_list += "<div class='pic_img textalign'>";
                goods_list += "<a href='../goodsShow/"+data['goods'][i]['id']+"'><img src=''></a>";
                goods_list += "<div class='operating'><a href='' class='pic_cart'>加入购物车</a>";
                goods_list += "<a href='' class='Collection'>收藏</a>";
                goods_list += "</div></div>";
                goods_list += "<p class='pic_nme'><a href=''>"+data['goods'][i]['goods']+"</a></p>";
                goods_list += "<p class='pic_price'>￥"+data['goods'][i]['price']+"</p>";
                goods_list += "</li>";
            }

            $('#prodList').html(goods_list);


            // console.log(data['goods'].data);
            // console.log(data['goods'].data[0].goods);

            // var  goods_list = '';

            // for( var i=0;i<data['goods'].data.length;i++ ){
            //     goods_list += "<li class='product'>";
            //     goods_list += "<div class='pic_img textalign'>";
            //     goods_list += "<a href=''><img src=''></a>";
            //     goods_list += "<div class='operating'><a href='' class='pic_cart'>加入购物车</a>";
            //     goods_list += "<a href='' class='Collection'>收藏</a>";
            //     goods_list += "</div></div>";
            //     goods_list += "<p class='pic_nme'><a href=''>"+data['goods'].data[0].goods+"</a></p>";
            //     goods_list += "<p class='pic_price'>￥"+data['goods'].data[0].price+"</p>";
            //     goods_list += "</li>";
            // }

            // $('#prodList').html(goods_list);

            // $('#pagination').html(data['goods'].links());

        }
    });

})


//减少商品数量
function decrease($obj,$gid,$bunch){
    console.log($gid);
    var originNum = $obj.next().val();
    var newNum = originNum - 1;

    var price = $obj.parent().parent().prev().html();

    var total = $('.Total_price').html();
    $('.Total_price').html(total*1 - price*1);

    if(newNum <= 0){
        delCart($obj,$gid,$bunch);
        return '删除成功'
    }

    $obj.next().val(newNum);




    $obj.parent().parent().next('.statistics').html(newNum*price);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: '../shopCart/operation',
        data: {gid:$gid,bunch:$bunch,newNum:newNum},
        success:function(data){
            console.log(data);
        }
    });


}

//增加商品数量
function increase($obj,$gid,$bunch){
    var originNum = $obj.prev().val();
    var newNum = originNum*1 + 1;
    $obj.prev().val(newNum);

    var price = $obj.parent().parent().prev().html();

    var total = $('.Total_price').html();
    $('.Total_price').html(price*1+total*1);

    $obj.parent().parent().next('.statistics').html(newNum*price);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: '../shopCart/operation',
        data: {gid:$gid,bunch:$bunch,newNum:newNum},
        success:function(data){
            // console.log(data);
        }
    });




}

//前台显示单个商品总计
$(function(){

    var total = ''*1;

    for(var i=0;i<$('.statistics').length;i++){
        var num = $($('.statistics')[i]).prev().children('.Numbers').children('.number_text').val();
        var price = $($('.statistics')[i]).prev().prev().html();
        $($('.statistics')[i]).html(num*price);
        total += num*price*1;
    }

    //前台显示所有商品总计
    $('.Total_price').html(total);

});

function delCart($obj,$gid,$bunch){
    console.log($obj);
    console.log($gid);
    console.log($bunch);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: '../shopCart/handle',
        data: {gid:$gid,bunch:$bunch},
        success:function(data){
            console.log(data);
            if(data == 1){
                alert('删除无规格购物车产品成功');
                $($obj).parent().parent().parent().parent().remove();
            }else if(data == 2){
                alert('删除有规格购物车产品成功');
                $($obj).parent().parent().parent().parent().remove();
            }
        }
    });

}
