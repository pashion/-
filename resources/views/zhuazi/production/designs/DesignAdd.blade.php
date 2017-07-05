@extends('zhuazi.layout.master')


@section('content')
    <input id="token" type="hidden" value="{{csrf_token()}}">
    <h4>设计方案添加</h4>
    <center>
        <div style="background:white; width:1000px; padding:40px; padding-bottom:40px;">


    <table class="table">
        <tr>
            <td><h2>设计者名称</h2></td>
            <td>
                <input style="width:150px;" type="text" class="form-control" >
            </td>
        </tr>
        <tr id="pic" height="100">
            <td width="15%"><h2>方案图片</h2></td>
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
        <tr>
            <td><h2>文字内容</h2></td>
            <td>
                <br>
                <textarea style="width:500px;" name="designContent" id="" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
           <td></td>
            <td><button class="btn btn-defauld">提交</button></td>
        </tr>
    </table>

    <script src="{{url('zhuazi/js/PicUpload.js')}}"></script>
        </div>
    </center>
@endsection



