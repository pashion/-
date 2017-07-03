<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Designs;
use App\DesignPic;
use App\DesignComment;

use App\SecondType;
class DesignController extends Controller
{
    /**
     * 返回方案列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询区域,风格id
        $areaID = SecondType::select('id')->whereRaw('name = ? or name = ?', ['区域', '风格'])->orderBy('name')->get();
        $areaData = SecondType::select('id','name')->where('tid', $areaID[0]['id'])->get();//查询同类方法
        $styleData = SecondType::select('id','name')->where('tid', $areaID[1]['id'])->get();//查询同类方法

        $str = '';
        $val = [];
        if (!empty($_GET['areaId'])) {
            $str .= 'area = ? and';
            $val[] = $_GET['areaId'];
        }
        if (!empty($_GET['styleId'])) {
            $str .= 'dstyle = ? and';
            $val[] = $_GET['styleId'];
        }
        $str = rtrim($str, ' and');

        if (!empty($_GET['styleId']) || !empty($_GET['styleId']) ) {
            $dData = Designs::whereRaw($str, $val)->paginate(8);
            return view('web.scene', compact('dData', 'areaData','styleData'));
        }

        $dData = Designs::paginate(8);
        return view('web.scene', compact('dData', 'areaData','styleData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     *返回单个方案信息
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //查询方案基本信息
        $caseData = DB::table('designs')
            ->leftJoin('design_text', 'design_text.did', '=', 'designs.id')
            ->select('designs.*', 'design_text.text')
            ->where('designs.id', '=', $id)
            ->get();


        //查询同风格方案
        $styleId =  $caseData[0]->dstyle;
        $caseDataStyle =  Designs::select('id','pic')->where('dstyle', $styleId)->limit(7)->orderBy('id', 'desc')->get();

        //查询设计详细图片
        $picArr = DesignPic::select('picname')->where('did', $id)->get();

        //查询评论
        $Comment =  DB::table('design_comment')
            ->leftJoin('comment_reply', 'comment_reply.cid', '=','design_comment.id')
            ->select('design_comment.*','comment_reply.uname', 'comment_reply.content', 'comment_reply.id as rid')
            ->where('design_comment.did', $id)
            ->get();

        dd($Comment);

        return view('web.Case_details', compact('caseData', 'picArr', 'Comment', 'caseDataStyle'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
