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

        //判断分支
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

        //判断执行
        if (!empty($_GET['styleId']) || !empty($_GET['styleId']) ) {
            $dData = Designs::whereRaw($str, $val)->paginate(8);
            return view('web.scene', compact('dData', 'areaData','styleData'));
        }

        //普通执行
        $dData = Designs::paginate(8);
        return view('web.scene', compact('dData', 'areaData','styleData'));
    }

    /**
     * 返回显示精粹页面
     *问题:多次查询数据库
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        //查询数据
//        $data = Designs::select(DB::raw('group_concat(id,"|",pic) as idBunch'))
//            ->whereRaw('dstyle = ? or dstyle = ? or dstyle = ? or dstyle = ? ', [1, 2, 3, 9])
//            ->limit(4)
//            ->groupBy('dstyle')
//            ->get();
//
//        //整理数据
//        $reData = [];
//        foreach ($data as $k => $v) {
//            $idAndPicArr  = explode(',',$v['idBunch']);
//            foreach ($idAndPicArr as $vv) {
//                $arr  = explode('|', $vv);
//                $reData[$k][] = $arr;
//            }
//        }
        //查询数据
        $data[] = Designs::whereRaw('dstyle = ? ', [1])->limit(4)->get();
        $data[] = Designs::whereRaw('dstyle = ? ', [2])->limit(4)->get();
        $data[] = Designs::whereRaw('dstyle = ? ', [3])->limit(4)->get();
        $data[] = Designs::whereRaw('dstyle = ? ', [9])->limit(4)->get();

        $styleArr  =  ['中式', '欧式','美式', '现代'];


        return view('web.design_pithy', compact('data', 'styleArr'));
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
     *返回单个场景设计方案信息
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

        //返回
        return view('web.Case_details', compact('caseData', 'picArr', 'caseDataStyle'));
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
