<!DOCTYPE html>
<html>
<head>
    <title>添加地址</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="{{url('web/bootstrap')}}/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="{{url('web/bootstrap')}}/js/bootstrap.js"></script>
    <link href="{{url('web/bootstrap')}}/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
<hr>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  新增收货地址
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">收货地址</h4>
      </div>
      <form action="{{url('user/detail/addaddress')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            @if (session('user'))
            <input type="hidden" name="user_id" value="{{session('user')[0]->id}}">
            @endif
      <div class="modal-body">
            
            <div class="form-group ">
                <label for="exampleInputName2"><span style="color: red">*</span>收货人：</label>
                <input type="text" name="get_name" class="form-control" id="exampleInputName2" >
            </div>

            <div class="form-group ">
                <label for="exampleInputName2"><span style="color: red">*</span>电话：</label>
                <input type="text" name="phone" class="form-control" id="exampleInputName2" >
            </div>

            <div class="form-group ">
                <label for="exampleInputName2"><span style="color: red">*</span>邮政编码：</label>
                <input type="text" name="code" class="form-control" id="exampleInputName2" >
            </div>

            <div class="form-group select" id="address">
                <label for="exampleInputName2"><span style="color: red">*</span>所在地区：</label>
                <select class="form-control"  id="province" name="province">
                  <option value="-1">--请选择省份--</option>
                </select>
                <!-- <select class="form-control"  id="city" name="city">
                  <option value="-1">--请选择省份--</option>
                </select>
                <select class="form-control"  id="county" name="county">
                  <option value="-1">--请选择省份--</option>
                </select> -->
                
            </div>

            <div class="form-group ">
                <label for="exampleInputName2"><span style="color: red">*</span>详细地址：</label>
                <input type="text" class="form-control" name="detail_address" id="exampleInputName2" >
            </div>

      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="保存收货地址">
      </div>
    </div>
      </form>
  </div>
</div>
</body>
</html>
<script>
    $.get(
        'province',
        {upid:0},
        function (data) {
            // console.log(data[0]['name']);
            var str = '';
            for ( var i =0;i<data.length; i++  ) {
                str += '<option id="'+data[i]['id']+'" value="'+data[i]['id']+'">'+data[i]['name']+'</option>';
            }
            $('#province').append(str);
        },
        'json'
        );


        $('.select').on('change','select',function () {
         var id = $(this).val();
         console.log(id);
         var that = $(this);

        var size = $('#address select').length;
        if (size <3) {
            switch (size) {
            case 1:
                var selectName = 'city';
                var selectId = 'city';
            break;
            case 2:
                var selectName = 'county';
                var selectId = 'county';
            break;
        }

         that.nextAll('select').remove();
         $.get(
            'province',
            {upid:id},
            function (data) {
                var str = '<select class="form-control" name="'+selectName+'" id="'+selectId+'">';
                str += '<option value="-1">--请选择--</option>'
                for ( var i=0;i<data.length;i++ ) {
                    str += '<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>';
                }
                str += '</select>';
                that.after(str);
            },
            'json'
            );
        }
        
        });

        
</script>
