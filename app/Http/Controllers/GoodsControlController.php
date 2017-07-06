<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\IndexMode;
class GoodsControlController extends Controller
{
    //后台:返回首页控制模板页面
    function indexModeCon ()
    {
        $IMode =  IndexMode::get();
        return view('zhuazi.production.goods.IndexGoodsCon');
    }

    //添加模板操作
    function addIndexMode ()
    {
        IndexMode::create($_POST);
        return 1;
    }

    //获取模板列表
    function getModeList ()
    {
        $IMode =  IndexMode::get();
        return $IMode;
    }
}
