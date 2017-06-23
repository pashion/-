@extends('zhuazi.layout.master')

@section('content')
        <table>
        <tr>
            <th>分类</th>
            <th>选项</th>
        </tr>
            <tr>
                    <td>种类</td>
                    <td>
                        <div id="one">
                        <select name="kind" id="kind">
                                <option value="-1">请选择</option>
                            @foreach($a as $k=>$v)
                                <option value="{{$v->id}}">{{$v->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </td>

            </tr>
            <tr>
                <td>风格</td>
                <td>
                    <div id="two">
                    <select name="style" id="style">
                            <option value="-1">请选择</option>
                        @foreach($b as $k=>$v)
                            <option value="{{$v->id}}">{{$v->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>区域</td>
                <td>
                    <div id="three">
                    <select name="area" id="area">
                        @foreach($c as $k=>$v)
                            <option value="{{$v->id}}">{{$v->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </td>
            </tr>
    </table>

    <script>

        $(document).on('change', '#one select,#two select,#three select', function () {
            var id = $(this).val();
            var that = $(this);
            var size = $('#one select').length;
            switch (size)
            {
                case 1:
                    var selectName = 'kind1';
                    var selected = 'kind1';
                break;

                case 2:
                    var selectName = 'kind2';
                    var selected = 'kind2';
                break;

                default:
                    var selectName = 'other';
                    var selectId = 'other';
                break;
            }

            that.nextAll('select').remove();

            $.ajax({
                type: 'get',
                url: './getmsg',
                data: {id: id},
                success: function(data){
                    var str = '<select name="'+selectName+'" id="'+selectId+'">';
                    str += '<option value="-1">--请选择--</option>'
                    for (var i = 0; i<data.length; i++) {
                        str += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    str += '</select>';
                    if(data.length > 1)
                    {
                        that.after(str);
                    }
                },
                error: function(xhr, type){
                    alert('Ajax error!')
                }
            });
        });


    </script>


@endsection