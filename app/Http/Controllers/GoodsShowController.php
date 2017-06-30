<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use App\Goods;             //商品表
use App\GoodsDetail;      //商品详情表

class GoodsShowController extends Controller
{
    /**
     * 返回普通商品列表,或赛选后的商品列表
     *
     *
     */
    public function index()
    {

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
     * 显示单个商品 的详情信息
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $goodData = DB::table('goods')
            ->leftJoin('Goods_Detail', 'goods.id', '=', 'Goods_Detail.gid')
            ->select('goods.*', 'Goods_Detail.id as deId', 'Goods_Detail.content')
            ->where('goods.id', '=', $id)
            ->get();

        if (empty($goodData)) {

            echo '不存在该商品';
            exit ;

        }
        $picArr = explode(',', $goodData[0]->pic);



        return view('web.good_detail', compact('goodData'));
    }

    /**
     * 返回单个商品的 选项信息???
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 1;
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
