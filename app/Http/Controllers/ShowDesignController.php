<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Designs;
use App\DesignPic;
use App\DesignText;
use App\DesignComment;



class ShowDesignController extends Controller
{

    //接收评论消息
    function saveDesignComment ()
    {
        unset($_POST['_token']);

        if (empty($_POST['comtent'])) {
            return '错误';
        }

        DesignComment::create($_POST);

        $data =  DesignComment::where('did','=', $_POST['did'])->limit(10)->orderBy('created_at', 'desc')->get();

        return $data;

    }



}
