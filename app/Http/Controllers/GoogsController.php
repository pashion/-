<?php

namespace App\Http\Controllers;

use Storage;

use Illuminate\Http\Request;
use App\Http\Requests;


use App\Goods;          //商品表
use App\Option;         //属性表
use App\Head;           //属性头表
use App\SpecPrice;      //商品属性价格表
use App\Type;           //类别表
use App\SecondType;     //二级类别表
use App\Spec;           //商品规格表
use App\GoodsDetail;      //商品详情表

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

        //切割 处理图片名
        $picName = [];
        foreach ($data as $v) {
            $arr  = explode(',', $v['pic']);
            $picNamep[$v['id']]  = $arr[0];
        }
        return view('fitment.production.goods.GoodsList', compact('data', 'picNamep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tType = SecondType::whereRaw("tid = ? and name = ?", ['0', '种类'])->select('id')->get();//获取种类数据
        $id = $tType[0]['id'];
        $tType=  SecondType::whereRaw('tid = ? ', [$id])->get();

        $type = SecondType::whereRaw('tid = ? and name != ?', ['0', '种类'])->get();  //查询父类
        $typeTou = SecondType::whereRaw('tid != ? ', [$id])->get();//查询子分类

        return view('fitment.production.goods.CreateGoods', compact('tType','typeTou', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\GoodsPostRquest  $request)
    {

        //写入goods,商品信息表
        $goodsData = [] ;
        $goodsData['goods'] = $_POST['goodName'];      //商品名
        $goodsData['price'] = $_POST['price'];         //价格
        $goodsData['stockall'] = $_POST['stockAll'];   //总库存
        $goodsData['style'] = $_POST['风格'];          //风格
        $goodsData['area'] = $_POST['区域'];           //区域
        $goodsData['kind'] = $_POST['kind'];           //种类
        $goodsData['pic'] = implode($_POST['pic'], ',');  //图片
        $goodsData['desr'] = $_POST['desr'];        //描述
        $goodsData['state'] = $_POST['state'];      //状态

        //移动图片
        foreach ($_POST['pic'] as $v) {
            Storage::disk('local')->move('tempPicDir/'.$v, 'goodsPic/'.$v);
        }


        $info =  Goods::create($goodsData);

        //准备商品id
        $goodId =  $info['id'];

        //写入option表,商品选项
        if (!empty($_POST['par'])) {
            foreach ($_POST['par'] as $k => $v  ) {
                foreach ($v as $vv) {
                    $optionArr['name'] = $vv;
                    $optionArr['gid']  = $goodId;
                    $optionArr['hid']  = $k;
                    Option::create($optionArr);
                }
            }
        }



        //写入SpecPrice表,商品选项价格
        if (!empty($_POST['selPrice'])) {
            $selPriceData = [];
            foreach ($_POST['selPrice'] as $v) {

                $selPriceData['store']      =   $v[0];//库存
                $selPriceData['price']      =   $v[1];//价格
                $selPriceData['str_bunch']  =   $v[3];//字符串
                $selPriceData['bunch_name'] =   $v[2];//号码串
                $selPriceData['gid']        =   $goodId;//商品id

                SpecPrice::create($selPriceData);
            }
        }



        //写入spec表, 商品规格
        foreach ($_POST['specArr'] as $v) {

            foreach ($v as $k => $vv) {
                $specData['name']   =   $vv;
                $specData['gid']    =   $goodId;
                $specData['hid']    =   $k;

                Spec::create($specData);
            }
        }

        //写入goods_detail, 商品详情表
        $GoodsDetailData['gid'] = $goodId;
        $GoodsDetailData['content'] = $_POST['editorValue'];

        GoodsDetail::create($GoodsDetailData);

        return 1;
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
