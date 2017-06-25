<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Intervention\Image\Facades\Image//引入图片修改扩展,intervention/image

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
        $clientName =   $file -> getClientOriginalName();
        $tmpName    =   $file ->getFileName();
        $realPath   =   $file -> getRealPath();
        $extension  =   $file -> getClientOriginalExtension();
        $mimeTye    =   $file -> getMimeType();

        $newName    = md5(date('YmdHis').$tmpName).'.'.$extension;

        $req->file('image')->move('tempPicDir', $newName);

        return $newName;//返回文件名

    }
    //删除图片
    public function canclePic ()
    {

        unlink('tempPicDir/'.$_GET['name']);
        return 1 ;

    }

    //缩略图访问方法
    public function reduce ()
    {
        $img = Image::make(public_path('goodsPic/aa.jpg'))->resize(300, 200);
        return $img->response('jpg');

    }


}
