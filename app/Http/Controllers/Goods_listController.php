<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\SecondType;

use App\Goods;

use DB;


class Goods_listController extends Controller
{
    
    public function getIndex(Request $request)
    {
        //获取种类的id
        $king = Input::get('king');
        //数组形式获取分类所有数据
        $menu = SecondType::all()->toArray();
        $data = self::menu($menu,0);
        //数组形式获取商品数据
        //分页测试
        $goods = DB::table('goods')->paginate(3);
        // dd($goods);
        // $goods =  Goods::all()->toArray();
        // dd($data);
        return view('web.good_list',compact('data','goods','king')); 
    }

    //菜单无限分类
    public function menu($menu,$tid)
    {
        //递归使用该空数组时不会覆盖前一次foreach的数组
        $arr = [];
        if(empty($menu))
        {
            return '';
        }
        foreach($menu as $k=>$v)
        {
            if($v['tid'] == $tid)
            {
                $arr[$k] = $v;
                $arr[$k]['child'] = self::menu($menu,$v['id']);
            }
        }
        return $arr;
    }

    // 分类ajax触发函数
    public function postTreble(Request $request){
        //当第二层被触发时去查询该层的子类id并放在一个数组
        //获取种类下的所有二级子类id
        $kind = $request->input('kind');
        $style = $request->input('style');
        $area = $request->input('area');

        //判断种类的子分类有没被选中,有则把子分类的下一层id组合到数组中
        if(!empty($kind)){
            $kind_son = DB::select('select id,name from second_type where tid ='.$kind);
             $kind_son_id = [];
             //把该类下的所有子类id放进一个数组
             foreach($kind_son as $k=>$v){
                $kind_son_id[$k] = $v->id;
             }
        }
        
        //判断风格的子分类有没被选中,有则把子分类的下一层id组合到数组中
        if(!empty($style)){
            $style_son = DB::select('select id,name from second_type where tid = '.$style);
            $style_son_id = [];
            //把该类下的所有子类id放进一个数组
            foreach($style_son as $k=>$v){
                $style_son_id[$k]=$v->id;
            }
        }


        if(!empty($request->input('thrble_id'))){
            //处理第三层子类上传字符串,去掉末端的','
            $thrble_id_str = rtrim($request->input('thrble_id'),',');
            //通过','拆分字符串并放入数组中
            $thrble_id_arr = explode(',', $thrble_id_str);

            //判断第三层选中的个数
            //当处理字符串数组个数为2时，种类和风格第三层都被选中
            //当处理字符串数组个数为1时，种类或风格的第三层被选中
            if(count($thrble_id_arr) == 2){
                //循环判断拿到对应的第三层选中的种类id
                for($i=0;$i<count($thrble_id_arr);$i++){
                    if( in_array( $thrble_id_arr[$i], $kind_son_id) ){
                        //第三级分类选中的种类id
                        $thrble_kind_id = $thrble_id_arr[$i];
                    }
                }

                //循环判断拿到对应的第三层选中的风格id
                for($i=0;$i<count($thrble_id_arr);$i++){
                    if(in_array( $thrble_id_arr[$i], $style_son_id) ){
                        //第三级分类选中的风格id
                        $thrble_style_id = $thrble_id_arr[$i];
                    }
                }

                //拼接所有的子类查询数组

                $option['kind'] = $thrble_kind_id;
                $option['style'] = $thrble_style_id;

                if(!empty($area)){
                    $option['area'] = $area;
                }

                //查询满足两个第三层并且判断是否有区域选择时查询数据库
                $Goods = Goods::where($option)->get()->toArray();
                $arr['goods'] = $Goods;
            }

            //只有一个三级分类被点击时
            if(count($thrble_id_arr) == 1){
                //
                if( @in_array( $thrble_id_arr[0], $kind_son_id) ){
                    //第三级分类选中的种类id
                    $thrble_kind_id = $thrble_id_arr[0];
                }

                if( @in_array( $thrble_id_arr[0], $style_son_id) ){
                    //第三级分类选中的风格id
                    $thrble_style_id = $thrble_id_arr[0];
                }

                //当种类第三层存在,风格第三层不存在时
                if(!empty($thrble_kind_id)){
                    //把第三层选中的种类id加入到option数组
                    $option['kind'] = $thrble_kind_id;

                    //判断区域是否被选中,option数组为查询条件 
                    if(!empty($area)){
                        $option['area'] = $area;
                    }

                    //当种类第三层被选中,并且风格第二层被选中时查询
                    if(!empty($style)){
                        $Goods = DB::table('goods')
                            //风格第二层选中查询条件
                            ->whereIn('style',$style_son_id)
                            ->where($option)->get();
                        $arr['goods'] = $Goods;
                    }else{
                        //种类第三层被选中，风格第二层没被选中时查询 
                        $Goods = DB::table('goods')
                            ->where($option)
                            ->get();
                        $arr['goods'] = $Goods;
                    }                    
                }

                //当风格第三层存在,种类第三层不存在时
                if(!empty($thrble_style_id)){
                    //把第三层选中的风格id加入到option数组
                    $option['style'] = $thrble_style_id;

                    //判断区域是否被选中,option数组为查询条件 
                    if(!empty($area)){
                        $option['area'] = $area; 
                    }

                    //风格第三层被选中，并且种类第二层存在时查询
                    if(!empty($kind)){
                        $Goods = DB::table('goods')
                            // 种类第二层查询条件
                            ->whereIn('kind',$kind_son_id)
                            ->where($option)->get();
                        $arr['goods'] = $Goods;
                    }else{
                        $Goods = DB::table('goods')
                            ->where($option)->get();
                        $arr['goods'] = $Goods;
                    }
                }
            }

        }

        //当种类、风格第三层都没被选中时,组合所有第二层选中与未选中的所有可能
        if(empty($request->input('thrble_id'))){

            $option['area'] = $area;

            // 区域分类选择空否时
            if(!empty($kind)){
                if(!empty($style)){
                    //全部二级分类选中
                    if(!empty($area)){
                        $Goods = DB::table('goods')
                            ->whereIn('kind',$kind_son_id)
                            ->whereIn('style',$style_son_id)
                            ->where($option)
                            ->get();
                        $arr['goods'] = $Goods;
                    }else{
                        //区域area没有选中时
                        $Goods = DB::table('goods')
                            ->whereIn('kind',$kind_son_id)
                            ->whereIn('style',$style_son_id)
                            ->get();
                        $arr['goods'] = $Goods;
                    }
                }else{
                    //种类不为空,风格为空,区域不为空
                    if(!empty($area)){
                        $Goods = DB::table('goods')
                            ->whereIn('kind',$kind_son_id)
                            ->where($option)->get();
                        $arr['goods'] = $Goods;
                    }else{
                        ////种类不为空,风格为空,区域为空
                        $Goods = DB::table('goods')
                            ->whereIn('kind',$kind_son_id)
                            ->get();
                        $arr['goods'] = $Goods;
                    }
                }
            }else{
                if(!empty($style)){
                    //种类为空,风格、区域不为空
                    if(!empty($area)){
                        $Goods = DB::table('goods')
                            ->whereIn('style',$style_son_id)
                            ->where($option)
                            ->get();
                        $arr['goods'] = $Goods;
                    }else{
                        //种类、区域为空，风格不为空
                        $Goods = DB::table('goods')
                            ->whereIn('style',$style_son_id)
                            ->get();
                        $arr['goods'] = $Goods;
                    }
                }else{
                    if(!empty($area)){
                        //种类、风格为空，区域不为空
                        $Goods = DB::table('goods')
                            ->where($option)
                            ->get();
                        $arr['goods'] = $Goods;
                    }
                }
            }
        }

        //点击第二层分类,获取该类下的所有子类信息并发送给ajax并循环遍历输出到页面
        $myself = $request->input('myself');
        $list = SecondType::where('tid', $myself)->get(['id','name','tid'])->toArray();
        $arr['list'] = $list;
        return $arr;
    }


}
