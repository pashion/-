<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

use App\Option;

class GoodInfoController extends Controller
{
    /*
     * 接收商品详情页发送过来的ajax请求
     * 文件:public\js\goods\goodsDetail.js
     * 返回获取商品选项
     *
     * */
    function getGoodSel ()
    {
        $selData = DB::table('option')
            ->join('head', 'option.hid', '=', 'head.id')
            ->select('option.*', 'head.name as headName', 'head.id as headId')
            ->where('gid', '=', $_GET['gid'])
            ->get();


        return $selData;

    }
}
