<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GoodsFileController extends Controller
{

    //存入图片返回图片名
    public function uploadGoodsFile (Request $req)
    {
        $file = $req->file('image');//获取文件对象

        if ( !$file -> isValid() ) {
            return  0;
        }

        //记录数据
        $clientName = $file -> getClientOriginalName();
        $tmpName = $file ->getFileName();
        $realPath = $file -> getRealPath();
        $extension = $file -> getClientOriginalExtension();
        $mimeTye = $file -> getMimeType();
        $newName = md5(date('YmdHis').$tmpName).'.'.$extension;

        $req->file('image')->move('tempPicDir', $newName);

        return $newName;//返回文件名

    }
    //删除图片
    public function canclePic ()
    {

        unlink('tempPicDir/'.$_GET['name']);
        return 1 ;

    }
}
