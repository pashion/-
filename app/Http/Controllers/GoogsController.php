<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Goods;          //商品表
use App\Option;         //属性表
use App\Head;           //属性头表
use App\SpecPrice;      //商品属性价格表
use App\Type;           //类别表
use App\SecondType;     //二级类别表


class GoogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Goods::paginate(10);
        return view('fitment.production.goods.GoodsList', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type::all();   //查询一级类表
        $typeTou = SecondType::all();  //查询二级类表
        $kind = SecondType::where('tid', "=", '3')->get();  //获取种类数据
        return view('fitment.production.goods.CreateGoods', compact('type', 'typeTou', 'kind'));
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
     * 接收ID, 显示单个商品信息
     *
     * @param  int  $id
     * @return Detail页面
     */
    public function show($id)
    {
        $data =  Goods::find($id);          //获取单个商品信息
        $parArr  =  Option::where('oid',  $data['option'])->get(); //获取属性值
        //取出所有属性头
        $head  = [];
        foreach($parArr as $v){
            $head[]  =  $v['hid'];
        }
        $head =  array_unique($head);//删除重复值

        //遗留问题:写死了查询条件


        $headArr  = Head::whereRaw('id = ? or id = ? or id = ? ',  $head)->get();//查询属性头名称

        $price   =  SpecPrice::where('gid', "=", '1')->get();            //获取属性价格数组
        $minPrice   =  SpecPrice::where('gid', "=", '1')->min('price');  //获取最小值
        $maxprice   =  SpecPrice::where('gid', "=", '1')->max('price');  //获取最大值

        $mPrice = $minPrice.'---'.$maxprice;
//        dd($maxMaxPrice);
//        dump($headArr);
//        dump($parArr);

        return view('fitment.production.goods.Detail', compact('data', 'parArr', 'headArr', 'mPrice', 'price'));

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
