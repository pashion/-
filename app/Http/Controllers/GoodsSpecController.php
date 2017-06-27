<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Head;

use App\SecondType;

use Illuminate\Support\Facades\DB;

class GoodsSpecController extends Controller
{
    /**
     * 显示所有规格
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询到类头
        $typeHead =  SecondType::where('name', '种类')->get();
        $id = $typeHead[0]['id'];
        $typeData =  SecondType::where('tid', $id)->get();

        $kindData = [];
        foreach ($typeData as $v) {
            $kindData[$v['id']] = SecondType::where('tid', $v['id'])->get();
        }
//        dd($kindData);

        return view('zhuazi.production.goods.GoodsSpec', compact('typeData', 'kindData'));

    }

    /**s
     *规格键值添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo 1 ;
    }

    /**
     * 添加  ajax穿过个
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        return Head::create($_POST);

    }

    /**
     * 返回商品规格键值
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kindData = Head::where('tid',  '=', $id)->get();//查询规格属性
        return $kindData;
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
     * 删除head表中指定的ID
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        return Head::where('id', $id)->delete();

    }
}
