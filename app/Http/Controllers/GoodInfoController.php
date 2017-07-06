<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use App\Option;

use App\Goods;
use App\SpecPrice;
use App\IndexMode;
use App\Designs;
use App\SecondType;

class GoodInfoController extends Controller
{

    /*
     * 获取首页信息
     * */
    function getGoodsIndex ()
    {
        $modeData = IndexMode::get();
        //切割字符
        $gid = explode(',',$modeData[0]['gid_bunch']);
        $str  = '';
        foreach ($gid as $v ) {
            $str .= ' id = ? or';
        }
        $str = rtrim($str, ' or');
        //查询数据
        $goodsData = Goods::whereRaw($str, $gid)->get();
        //切割获取图片名
        $goodsPic = [];
        foreach ($goodsData as $v) {
            $arr =  explode(',', $v['pic']);
            $goodsPic[] = $arr[0];
        }

        //返回()
        return view('web.index', compact('modeData', 'goodsData','goodsPic'));
    }



    /*
     * 接收商品详情页发送过来的ajax请求
     * 返回获取商品选项
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

    /*
    *返回单个商品的选项价格
    * */
    function getGoodSelPrice ()
    {
    
        if (empty($_GET['gid'])) {
            return  '缺乏商品id';
        }
        $gid  = $_GET['gid'];
        $selPrice  = SpecPrice::whereRaw('gid = ?', [$gid])->get();
        return $selPrice;
    }

    /*
     * 返回套系参考配套商品
     * */
    function getGoodSelCoordin ()
    {
        if (!empty($_GET['styleID'])) {
            $field = 'style';
            $id =  $_GET['styleID'];
        }
        if (!empty($_GET['areaID'])) {
            $field = 'area';
            $id =  $_GET['areaID'];
        }
        $areaGoods = Goods::where($field, '=', $id)->limit(7)->get();
        $picArr = [];
        foreach ( $areaGoods as $k => $v ) {
            $tempArr =  explode(',', $v->pic);
            $areaGoods[$k]->pic = $tempArr[0];
        }
       return $areaGoods;
    }

    //问题:ID写死
    //返回get指定条方案.和区域数据
    function  getDesignScheme ()
    {
        $DesignData = Designs::limit($_GET['num'])->get();
        $tid = SecondType::select('id')->where('name', '区域')->get();
        $AreaData = SecondType::where('tid', $tid[0]['id'])->get();

        $data['Design'] = $DesignData;
        $data['Area'] = $AreaData;

        return $data ;
    }



}
