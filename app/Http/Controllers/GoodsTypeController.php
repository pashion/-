<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Type;

use App\SecondType;



class GoodsTypeController extends Controller
{
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
    public function getgGoodsStyle ()
    {
        $tid = $_GET['tid'];
        $styleData = SecondType::where('tid', $tid)->get();
        return $styleData;
    }
}
