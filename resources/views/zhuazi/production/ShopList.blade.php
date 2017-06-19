@extends('zhuazi.layout.master')


@section('content')
  

<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Projects <small>Listing design</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Projects</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Simple table with project listing with progress and editing options</p>

                    <!-- start project list -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width: 4%">ID</th>
                          <th style="width: 15%">店铺名</th>
                          <th style="width: 25%">地址</th>
                          <th style="width: 15%">验证进度</th>
                          <th style="width: 12%">状态</th>
                          <th >图片</th>
                          <th >详情</th>
                        </tr>
                      </thead>
                      <tbody>

                    @foreach($data as $v)
                        <tr>
                          <td>#</td>
                          <td>
                            <a>{{$v['name']}}</a>
                            <br />
                            <small></small>
                          </td>
                          <td>
                            {{$v['address']}}
                          </td>
                          
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{$v['proving']*10}}"></div>
                            </div>
                            <small>{{$v['proving']}}人验证</small>
                          </td>
                          <td>
                 
                              @if($data['status'] == 2)
                                  <button type="button" class="btn btn-danger btn-xs">已关闭</button>
                                  @else
                                  <button type="button" class="btn btn-success btn-xs">营业中</button>
                              @endif
                           
                          </td>
          

                           <td>
                            <ul class="list-inline">
                              <li>
                                <img src="{{url('zhuazi')}}/images/{{$v['picurl']}}" class="avatar" alt="Avatar">
                              </li>
                            </ul>
                          </td>
      
                          <td>
                            <a class="btn btn-default" href="{{url('Shop').'/'.$v['id']}}" role="button">查看店铺</a>
                          </td>

                        </tr>
         
                      @endforeach
                  </tbody>
                </table>

  <div class="pull-right"> {{$data->links()}}</div> 
       

@endsection
