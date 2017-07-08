<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Designs;
use App\DesignPic;
use App\DesignComment;

class DesignsAdminController extends Controller
{
    /**
     * 显示方案列表
     * @return  返回列表显示页面 :zhuazi.production.designs.DesignList
     */
    public function index()
    {
       $designData =  Designs::paginate(7);
       return view('zhuazi.production.designs.DesignList', compact('designData'));
    }

    /**
     * 返回创建设计方案表单文件
     * @return zhuazi.production.designs.DesignAd
     */
    public function create()
    {

        return view('zhuazi.production.designs.DesignAdd');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($_POST);
    }

    /**
     * 显示单个方案信息
     * @param  int  $id
     * @return zhuazi.production.designs.DesignDetail2
     */
    public function show($id)
    {
        $data = Designs::with('CommentArr')->take(1)->find($id);
        return view('zhuazi.production.designs.DesignDetail2', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 123214;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo 1333;
    }

    /**
     *删除单个设计方案
     * @param  int  $id
     * @return 1 为成功 其他为失败
     */
    public function destroy($id)
    {
        $info =  Designs::where('id', '=', $_POST['id'])->delete();
        return $info;
    }
}
