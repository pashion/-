<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FileController extends Controller
{
    public function goodsFile (Request $req)
    {

        $file = $req->file('image');
        if(!$file -> isValid()){
            return  0;
        }

        $clientName = $file -> getClientOriginalName();
        $tmpName = $file ->getFileName();
        $realPath = $file -> getRealPath();
        $extension = $file -> getClientOriginalExtension();
        $mimeTye = $file -> getMimeType();
        $newName = md5(date('YmdHis').$tmpName).'.'.$extension;
        $req->file('image')->move('upload', $newName);

        return $newName;


//
//        $file = $request->file('image');
//        if($file -> isValid()){
//
//            $clientName = $file -> getClientOriginalName();
//            $tmpName = $file ->getFileName();
//            $realPath = $file -> getRealPath();
//            $extension = $file -> getClientOriginalExtension();
//            $mimeTye = $file -> getMimeType();
//            $newName = md5(date('ymdhis').$clientName).".".$extension;
//            $path = $file -> move('uploads',$newName);
//        }
//        $_POST['image']=$newName;





    }
}
