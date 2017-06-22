<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Head;   //属性头表

class HeadController extends Controller
{
    public function  getHead ()
    {
        //获取指定的键值组
        $data = Head::where('tid', $_GET['id'])->get();

        if(empty($data)){
            $data = 'NO' ;
        }

        return $data;
    }


    public function  test ()
    {
        return view('fitment.production.goods.ggs');
    }

    public function form ()
    {
        dump($_POST);
        echo $_POST['editorValue'];
    }

}
