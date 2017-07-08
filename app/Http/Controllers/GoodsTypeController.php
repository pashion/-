<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SecondType;



class GoodsTypeController extends Controller
{
    //返回种类列表
    public function getKindType ()
    {
        $kindTId = $_GET['id'];
        if (empty($_GET['id'])) {
            exit();
        }
        $kinType =  SecondType::where('tid', '=', $kindTId)->get();

        if(empty($kinType)){
            exit();
        }
        return $kinType;
    }

    //返回所有的风格选项
    public function getGoodsStyle ()
    {

        $styleId = SecondType::whereRaw('name = ? ', ['风格'])->get();

        $data = SecondType::where('tid', '=', $styleId[0]->id)->get();

        $styleArr = [];
        foreach ($data as $k => $v) {
            $styleArr[$k]['id'] = $v->id;
            $styleArr[$k]['name'] = $v->name;
            $styleArr[$k]['childrenType'] = $v->childrenType;
        }

        return $styleArr;
    }

    //返回指定类名
    public function getgGoodsStyle ()
    {
        $tid = $_GET['tid'];
        $styleData = SecondType::where('tid', $tid)->get();
        return $styleData;
    }

    public function getAreaData ()
    {
        $areaData =  SecondType::where('name', '=', '区域')->get();

        return $areaData[0]->childrenType;

    }
}
