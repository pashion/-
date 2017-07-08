<?php

namespace App\Http\Controllers;

use Storage;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;



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
     * 显示商品列表
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
        return view('zhuazi.production.goods.GoodsList', compact('data', 'picNamep'));
    }

    /**
     *显示商品添加表单
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取种类数据
        $kindData = SecondType::where('name', '=', '种类')->get();//获取种类数据SecondType
        $kindData =  $kindData[0]->childrenType;

        //区域数据
        $areaData =  SecondType::where('name', '=', '区域')->get();
        $areaData =  $areaData[0]->childrenType;

        //风格数据
        $styleId =  SecondType::select('id')->where('name', '=', '风格')->get();
        $styleData=  SecondType::where('tid', '=', $styleId[0]->id)->get();




//        return view('zhuazi.production.goods.CreateGoods', compact('tType','typeTou', 'type'));
        return view('zhuazi.production.goods.CreateGoods', compact('kindData','areaData', 'styleData'));
    }

    /**
     * 保存商品添加表单数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\GoodsPostRquest  $request)
    {

        //检验是否有子类风格选项
        if (empty($_POST['styleChildren'])) {
            $_POST['styleChildren'] = $_POST['styleParent'] ;
        }


        //写入goods,商品信息表
        $goodsData = [] ;
        $goodsData['goods'] = $_POST['goodName'];      //商品名
        $goodsData['price'] = $_POST['price'];         //价格
        $goodsData['stockall'] = $_POST['stockAll'];   //总库存
        $goodsData['style'] = $_POST['styleChildren'];     //风格
        $goodsData['area'] = $_POST['area'];           //区域
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

            //循环遍历每一个选项数组,获取选项名称去数据库查id时可能出现顺序问题,如果循序出问题,那么价格会对应不上
            foreach ($_POST['selPrice'] as $v) {
                $selPriceData = [];
                //准备数据值
                $selVal =  explode('_', $v[3]);
                //拼接条件文件语句
                $strArr = [] ;
                foreach ($selVal   as $vv) {
                    $strArr[] = 'name = ?';
                }
                $sqlStr = implode(' or ', $strArr);
                $sqlStr = '('.$sqlStr.')';

                $selVal[] =  $goodId;   //添加商品ID
                $sqlStr .= ' and gid = ?';

                //查询数据库
                $selIdArr = Option::select('id')->whereRaw($sqlStr, $selVal)->get();

                dump($selIdArr);
                //循环解开,拼接
                $selNumArr = [];
                foreach ($selIdArr as $vv) {
                    $selNumArr[] = $vv['id'];
                }
                $selNumStr = implode('_',$selNumArr);

                $selPriceData['store']      =   $v[0];//库存
                $selPriceData['price']      =   $v[1];//价格
                $selPriceData['str_bunch']  =   $v[3];//字符串
                $selPriceData['num_bunch']  =   $selNumStr;//号码串
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

        return redirect('goods/create');
    }


    /**
     * 接收ID, 显示单个商品信息
     * @param  int  $id
     * @return Detail页面
     */
    public function show($id)
    {
        //获取商品信息
        $goodsData =  Goods::find($id);

        //获取选项信息
        $selData = DB::table('option')
            ->leftJoin('head', 'option.hid', '=', 'head.id')
            ->select('option.*', 'head.name as headName', 'head.id as headId')
            ->where('gid', '=', $id)
            ->get();


        //处理选项获取属性名
        $headKey  = '';
        foreach ($selData as $v) {
            $headKey[$v->headId] = $v->headName;
        }



        //获取风格,区域,种类,名称
        $styleNameArr[0] = SecondType::select('name')->where('id', $goodsData['style'])->get();
        $styleNameArr[1] = SecondType::select('name')->where('id', $goodsData['area'])->get();
        $styleNameArr[2] = SecondType::select('name')->where('id', $goodsData['kind'])->get();


        //查询商品规格格
        $sql = 'SELECT A.* ,B.name AS specName , B.id AS specId FROM head AS A  LEFT JOIN  (SELECT * FROM spec WHERE gid = '.$id.') AS B ON A.id = B.hid WHERE A.tid = '.$goodsData['kind'];
        $specData = DB::select( $sql );

        //获取详情信息
        $detail  = GoodsDetail::where('gid', '=', $id)->get();

        //切割图片名
        $picData = explode(',', $goodsData['pic']);

        //选项价格
        $goodSelPrice  = SpecPrice::where('gid', '=', $id)->get();

        //返回
        return view('zhuazi.production.goods.Detail', compact('goodsData', 'selData', 'specData', 'detail', 'picData', 'headKey', 'goodSelPrice', 'styleNameArr'));

    }


    /**
     * 返回商品选项,规格,选项价格三个表的信息
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $selData = DB::table('option')
            ->join('head', 'option.hid', '=', 'head.id')
            ->select('option.*', 'head.name as headName', 'head.id as headId')
            ->where('gid', '=', $id)
            ->get();

        return $selData;
    }

    /**
     * 商品编辑更新方法
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //不清楚哪里过来的路由调用了这个方法
        if (!empty($_POST['table'])) {
            if ($_POST['table'] == 'goods' ) {
                $field  =  $_POST['field'];
                $content = $_POST['content'];
                Goods::where('id', $id)->update([ $field => $content ]);
                return 1;
            }
        }

        //删除或者添加,商品选项
        switch ($_POST['goodsCon']) {

            case 'editSel': $this->editGoodsSel();
        }

    }

    /**
     * 删除单个商品
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = $_POST['id'];
        $picStr = Goods::select('pic')->find($id);
        $picArr = explode(',', $picStr['pic']);

        Goods::destroy(['gid', $id]);       //删除商品
        Option::destroy(['gid', $id]);      //删除属性
        SpecPrice::destroy(['gid', $id]);   //删除商品属性价格
        Spec::destroy(['gid', $id]);        //删除商品规格
        GoodsDetail::destroy(['gid', $id]); //删除商品详情

        //删除图片
        foreach ( $picArr as $v) {
            Storage::disk('local')->delete('goodsPic/'.$v);
        }
        return 1;
    }


    /**
     * 删除或者添加,商品选项
     * */
    public function editGoodsSel ()
    {
        //添加商品选项操作
        $goodId = $_POST['gid'];
        if (!empty($_POST['addSelData'])) {

            $addSelData =  array_filter($_POST['addSelData']);
            $arr = [];
            foreach ($addSelData as $k => $v) {
                foreach ($v as $vv) {
                    $arr[] = ['hid' => $k, 'name' => $vv , 'gid' => $goodId];
                }
            }
            $info =  Option::insert($arr);
        }


        //删除商品选项操作
        if (!empty($_POST['delSelData'])) {

            $delSelData =  array_filter($_POST['delSelData']);
            foreach ($delSelData as $k => $v) {
                foreach ($v as $vv) {
                    $info =  Option::whereRaw('gid = ? and hid =? and name = ?', [$goodId, $k, $vv])->delete();
                }
            }


        }


    }

}
