@extends('zhuazi.layout.master')


@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">

            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <input id='token'  type="hidden" value="{{csrf_token()}}">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>首页模块管理<small>IndexModeControl</small></h2>
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">



                    <table id="modeTable" width="800" class="table table-bordered">

                    </table>

                    <button id="modeAdd" type="button" class="btn btn-info btn-sm modeAdd">添加</button>
                    <button id="cancel" type="button" class="btn btn-info btn-sm modeAdd">取消</button>


                </div>

             <script src="{{url('zhuazi')}}/js/IndexMode.js"></script>
@endsection

