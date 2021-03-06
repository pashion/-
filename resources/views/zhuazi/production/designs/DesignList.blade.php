@extends('zhuazi.layout.master')


@section('content')

  <span id="conMig"></span>
  <input type="hidden" id="token" value="{{csrf_token()}}">
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

            <h2>设计方案-列表<small>goods list</small></h2>
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="闻榜">
                <span class="input-group-btn">
                      <button class="btn btn-default" type="button" >搜索!</button>
              </span>
              </div>
            </div>



            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            <a href="{{url('designAdmin/create')}}" class="btn btn-success addGood">添加设计方案</a>

            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                <tr class="headings">
                  <th>
                    <input type="checkbox" id="check-all" class="flat">
                  </th>
                  <th class="column-title" width="5%">ID </th>
                  <th class="column-title" width="15%">方案标题</th>
                  <th class="column-title" width="5%">图片</th>
                  <th class="column-title" width="10%">作者</th>
                  <th class="column-title" width="20%">风格</th>
                  <th class="column-title" >评论数</th>
                  <th class="column-title no-link last" width="25%"><span class="nobr">操作</span>
                  </th>
                  <th class="bulk-actions" colspan="7">
                    <a class="antoo" style="color:#fff; font-weight:500;">已经选中 ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                  </th>
                </tr>
                </thead>

                <tbody>

                @foreach($designData as $v)



                <tr class="even pointer">
                  <td class="a-center ">
                    <input type="checkbox" class="flat" name="table_records">
                  </td>
                  <td class=" "></td>
                  <td class=" ">{{$v['dtitle']}}</td>
                  <td class=" ">

                    <img width="50"  height="50" src="{{url('designPic')}}/{{$v['pic']}}" alt="">
                    </td>
                  <td class=" ">{{$v['dname']}} <i class="success fa fa-long-arrow-up"></i></td>
                  <td class=" ">{{$v['dstyle']}}</td>
                  <td class=" ">{{$v['comment_num']}}</td>
                  <td>
                    <a href="{{url('designAdmin')}}/{{$v['id']}}" class="btn btn-primary btn-xs intoDetail"  goodId="{{$v['id']}}"><i class="fa fa-folder "></i>  进入</a>
                    <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 编辑 </a>
                    <a href="#" deID="{{$v['id']}}" class="btn btn-danger btn-xs desiDel"><i  class="fa fa-trash-o "></i> 删除 </a>
                  </td>
                </tr>

                @endforeach

                </tbody>
              </table>
                {{$designData->links()}}
            </div>

@endsection

@section('footJS')
       <script src="{{url('zhuazi')}}/js/DesignList.js"></script>
@endsection

