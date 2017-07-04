<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Designs;
use App\DesignPic;
use App\DesignText;
use App\DesignComment;
use App\CommnetReply;


class DesignCommentController extends Controller
{

    //接收评论消息
    function saveDesignComment ()
    {
        unset($_POST['_token']);
        if (empty($_POST['comtent'])) {
            return '错误';
        }

        $_GET['did']  = $_POST['did'];
        //写入
        DesignComment::create($_POST);
        //重取
       return  $this->getDesignComment();
    }

    //保存回复
    function saveDesignRealy ()
    {
        unset($_POST['_token']);//消除其他变量
        CommnetReply::create($_POST);//保存数据
        $_GET['did']  = $_POST['design_id']; //更改变量

        return  $this->getDesignComment();//返回新数据
    }

    //返回评论数据,
    function getDesignComment ()
    {
        if (empty($_GET['page'])) {
            $_GET['page'] = 0;
        }
        //获取数据
        $data =  DesignComment::where('did','=', $_GET['did'])
            ->offset($_GET['page'])
            ->limit(7)
            ->orderBy('created_at', 'desc')
            ->get();
        dd($data);
        //重整数据
        $commentData = [];
        foreach ($data as $k => $v) {
            $arr['id'] = $v->id;
            $arr['did'] = $v->did;
            $arr['uid'] = $v->uid;
            $arr['tempuser'] = $v->tempuser;
            $arr['comtent'] = $v->comtent;
            $arr['repaly'] = $v->deComments;
            $arr['create_at'] = $v->create_at;
            $commentData[] = $arr;
        }

        return $commentData;
    }



}
