@extends('zhuazi.layout.master')


@section('content')
    <input id="token" type="hidden" value="{{csrf_token()}}">
    

    <table>
        <tr id="pic" height="100">
            <td><h2>商品图片</h2></td>
            <td colspan="2">

                <table>
                    <tr>
                        <td>
                            <div>
                                <img id="addLog" num="0" width="100" height="100" src="{{url('zhuazi')}}/images/addPicLog.jpg" alt="">
                                <span class="mig" ></span>

                                <input type="file" class="fileUp" style="display:none;" name="pic" >

                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <script src="{{url('zhuazi/js/PicUpload.js')}}"></script>
@endsection



