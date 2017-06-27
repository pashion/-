@extends('zhuazi.layout.master');
@section('title' ,'添加评论')
@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>添加友情链接 </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('/')}}">回到首页</a>
                        </li>
                        <li><a href="{{url('frenship')}}">回到链接首页</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <!-- start form for validation -->
            <form id="demo-form" data-parsley-validate action="{{url('talking')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" class="flat" name="goods_id"  value="" />
                <input type="hidden" class="flat" name="order_id"  value="" />
                <input type="hidden" class="flat" name="user_id"  value="" />
                <label for="urlname">评论状态 * :</label>
                <p>
                    实名评论:
                    <input type="radio" class="flat" name="comment_type" id="typeY" value="0" checked="" required /> 匿名评论:
                    <input type="radio" class="flat" name="comment_type" id="typeN" value="1" />
                </p>
                <label>星级 *:</label>
                <p>
                    1星:
                    <input type="radio" class="flat" name="star"  value="0" />
                    2星:
                    <input type="radio" class="flat" name="star" id="typeN" value="1" />
                    3星:
                    <input type="radio" class="flat" name="star" id="typeN" value="2" />
                    4星;
                    <input type="radio" class="flat" name="star" id="typeN" value="3"/>
                    5星:
                    <input type="radio" class="flat" name="star" id="typeY" value="4" checked="" required />
                </p>
                <label for="message">评论内容 :</label>
                <textarea id="message" required="required" class="form-control" name="comment_info" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                          data-parsley-validation-threshold="10"></textarea>
                <input type="submit" class="btn btn-success">

            </form>
            <!-- end form for validations -->

        </div>
    </div>
@endsection