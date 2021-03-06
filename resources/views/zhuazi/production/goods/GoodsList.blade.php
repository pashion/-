@extends('zhuazi.layout.master')

@section('head')
  <link rel="stylesheet" href="{{url('zhuazi')}}/css/goodsList.css">
  @endsection

@section('content')

  <input id="token" type="hidden"  value="{{csrf_token()}}">

    <div class="">
      <div class="page-title">
        <div class="title_left">

        </div>

        <div class="title_right">

        </div>
      </div>

      <div class="clearfix"></div>


      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">

            <h2>商品管理-列表<small>goods list</small></h2>
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <div class="input-group">
                <input id="searchGoods" type="text" class="form-control" placeholder="输入商品名字">
                <span class="input-group-btn">
                      <button id="searchBtn" class="btn btn-default" type="button">搜索!</button>
              </span>
              </div>
              <data id="searchTextBox">

              </data>
            </div>



            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            <a href="{{url('goods/create')}}" class="btn btn-success addGood">添加商品</a>

            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                <tr class="headings">
                  <th>
                    <input type="checkbox" id="check-all" class="flat">
                  </th>
                  <th class="column-title" width="5%">ID </th>
                  <th class="column-title" width="15%">商品名</th>
                  <th class="column-title" width="5%">图片</th>
                  <th class="column-title" width="10%">价格</th>
                  <th class="column-title" width="20%">描述</th>
                  <th class="column-title"  >状态</th>
                  <th class="column-title no-link last" width="25%"><span class="nobr">操作</span>
                  </th>
                  <th class="bulk-actions" colspan="7">
                    <a class="antoo" style="color:#fff; font-weight:500;">已经选中 ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                  </th>
                </tr>
                </thead>

                <tbody id="goodsListTable">

                <span id="conMig"></span>
                @foreach($data as $v)



                <tr class="even pointer">
                  <td class="a-center ">
                    <input type="checkbox" class="flat" name="table_records">
                  </td>
                  <td class=" ">{{$v['id']}}</td>
                  <td class=" ">{{$v['goods']}}</td>
                  <td class=" ">
                    <img width="50"  height="50" src="{{url('goodsPic')}}/{{$picNamep[$v['id']]}}" alt="">
                    </td>
                  <td class=" ">{{$v['price']}}</td>
                  <td class=" ">{{$v['desr']}}</td>

                  <td class=" ">
                    @if($v['state'] == 0)
                      <button type="button" class="btn btn-success btn-xs">在售</button>
                    @elseif($v['state'] == 1)
                      <button type="button" class="btn btn-danger btn-xs">下架</button>
                    @elseif($v['state'] == 2)
                      <button type="button" class="btn btn-default btn-xs">失效</button>
                    @elseif($v['state'] == 3)
                      <button type="button" class="btn btn-warning btn-xs">缺货</button>
                    @endif
                  </td>
                  <td>
                    <a style="float: left;" href="#" class="btn btn-primary btn-sm goodsSingle" goodId="{{$v['id']}}"><i class="fa fa-folder "></i>  进入</a>
                    <a style="float: left;" href="#" class="btn btn-info btn-sm goodEdit" data-id="{{$v['id']}}"><i class="fa fa-pencil"></i> 编辑 </a>
                    <a style="float: left;" href="#" data-id="{{$v['id']}}" class="btn btn-danger btn-sm goodsDel"><i class="fa fa-trash-o "></i> 删除 </a>
                  </td>
                </tr>

                @endforeach
                </tbody>
              </table>
              {{$data->links()}}
            </div>

@endsection

@section('footJS')

              <script src="{{url('zhuazi')}}/js/GoodsList.js"></script>


@endsection

