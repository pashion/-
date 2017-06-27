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





