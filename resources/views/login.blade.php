<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> 后台登录 </title>

    <!-- Bootstrap -->
    <link href="{{url('zhuazi')}}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('zhuazi')}}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('zhuazi')}}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{url('zhuazi')}}/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('zhuazi')}}/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{url('admins/login')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
              <h1>后台管理登录</h1>
              <div>
                <input type="text" class="form-control required" placeholder="管理员名称" name="admin_name" />
              </div>
              <div>
                <input type="password" class="form-control required" placeholder="密码" name="password" />
              </div>
              <div>
                <input type="submit" class="btn btn-success" value="登录">
                <a class="reset_pass" href="#">忘记密码？</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> 进击的爪子 </h1>
                  <p>©2017 版权归爪子公司所有 侵权必究</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
