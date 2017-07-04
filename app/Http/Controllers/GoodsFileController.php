<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Goods;

use Intervention\Image\Facades\Image;   //引入图片修改扩展,intervention/image

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

        //判断是直接写入还是存临时文件
        if (empty($_POST['conMode'])) {
            $req->file('image')->move('tempPicDir', $newName);
        } else {
            $req->file('image')->move('goodsPic', $newName);
            //存入数据库
            $picStr = Goods::select('pic')->where('id', $_POST['id'])->get();
            $picName = $newName.','.$picStr[0]['pic'];
            $pic = rtrim($picName, ',');
            Goods::where('id', $_POST['id'])->update(['pic' => $pic]);
        }

        $arr['name'] =  $newName;
        return $arr;//返回文件名

    }

    //删除图片
    public function canclePic ()
    {

        if (empty($_GET['conMode'])) {

            unlink('tempPicDir/'.$_GET['name']);//删除临时文件

        } else {

            unlink('goodsPic/'.$_GET['name']);  //删除文件
            $picStr = Goods::select('pic')->where('id', $_GET['goodId'])->get();//取出
            $picArr = explode(',', $picStr[0]['pic']);//切割
            $key =  array_search($_GET['name'], $picArr);  //查找键位
            array_splice($picArr, $key, 1);     //删除指定键位元素
            $picStr = implode(',', $picArr);     //拼接
            Goods::where('id', $_GET['goodId'])->update(['pic' => $picStr]);
        }

        return 2 ;
    }

    //缩略图访问接口,问题:可以访问方法,不能返回图片
    public function reduce ()
    {
        dd(public_path($_GET['name']));
        $img = Image::make()->resize(1000, 1000);
        $img = Image::canvas(800, 900, '#ccc');//创建一个空图片
        return $img->response('jpg');
    }




}
