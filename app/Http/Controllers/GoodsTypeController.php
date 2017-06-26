<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Type;

use App\SecondType;


class GoodsTypeController extends Controller
{
    public function GetKindType ()
    {
        $kindTId = $_GET['id'];
        if (empty($_GET['id'])) {
            exit();
        }
        $kinType =  SecondType::where('', '=', $kindTId)->get();

        if(empty($kinType)){
            exit();
        }
        return $kinType;
    }
}
