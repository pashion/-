<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/test2/laravel/public/js/jquery-1.10.2.min.js"></script>
    <script src="/test2/laravel/public/js/del.js"></script>

    <!-- 配置文件 -->
    <script type="text/javascript" src="/test2/laravel/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/test2/laravel/ueditor/ueditor.all.js"></script>


    <title>Gentelella Alela! | </title>
    <!-- Bootstrap -->
    <link href="{{url('zhuazi')}}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('zhuazi')}}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('zhuazi')}}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{url('zhuazi')}}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{url('zhuazi')}}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{url('zhuazi')}}/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{url('zhuazi')}}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('zhuazi')}}/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>菜肴--后台管理</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{url('zhuazi')}}/images/img.jpg" alt="{{url('zhuazi')}}." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>后台用户1号</span>
                <h2><二级></二级>管理</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>只能添加店铺</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-desktop"></i> 类别管理 </span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('SecoundType')}}">查看类别</a></li>
                      <li><a href="{{url('SecoundType/create')}}">添加类别</a></li>
                      <li><a href="{{url('SecoundType/ajax')}}">ajax测试</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-table"></i> 轮播图管理 </a>
                      <ul class="nav child_menu">
                          <li><a href="{{url('Wheel')}}">查看轮播图</a></li>
                          <li><a href="{{url('Wheel/create')}}">插入轮播图</a></li>
                          <li><a href="{{url('Wheel/ajax')}}">查看轮播图</a></li>
                      </ul>
                  </li>

                  <li><a><i class="fa fa-bar-chart-o"></i> 文章管理 </a>
                      <ul class="nav child_menu">
                          <li><a href="{{url('Article')}}">文章列表</a></li>
                          <li><a href="{{url('Article/create')}}">添加文章</a></li>
                          <li><a href="{{url('Wheel/ajax')}}">查看轮播图</a></li>
                      </ul>
                  </li>
  
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{url('zhuazi')}}/images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="{{url('zhuazi')}}/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where{{url('zhuazi')}}.
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{url('zhuazi')}}/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where{{url('zhuazi')}}.
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{url('zhuazi')}}/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where{{url('zhuazi')}}.
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{url('zhuazi')}}/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where{{url('zhuazi')}}.
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
   
        <div class="right_col" role="main">
    

              @yield('content')


        </div>



      

    <!-- jQuery -->
    <script src="{{url('zhuazi')}}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{url('zhuazi')}}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="{{url('zhuazi')}}/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{url('zhuazi')}}/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="{{url('zhuazi')}}/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="{{url('zhuazi')}}/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{url('zhuazi')}}/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="{{url('zhuazi')}}/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="{{url('zhuazi')}}/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="{{url('zhuazi')}}/vendors/Flot/jquery.flot.js"></script>
    <script src="{{url('zhuazi')}}/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="{{url('zhuazi')}}/vendors/Flot/jquery.flot.time.js"></script>
    <script src="{{url('zhuazi')}}/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="{{url('zhuazi')}}/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="{{url('zhuazi')}}/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="{{url('zhuazi')}}/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="{{url('zhuazi')}}/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="{{url('zhuazi')}}/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="{{url('zhuazi')}}/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="{{url('zhuazi')}}/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="{{url('zhuazi')}}/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{url('zhuazi')}}/vendors/moment/min/moment.min.js"></script>
    <script src="{{url('zhuazi')}}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{url('zhuazi')}}/build/js/custom.min.js"></script>
	
  </body>
</html>
