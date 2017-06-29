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




//文章封面修改触发ajax
function cover_upload($url){

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
            $('#show').append(" <img src='" + $url + "public/uploads/cover/" + date + '/t_' + data + "'>");
        },
    });
}
