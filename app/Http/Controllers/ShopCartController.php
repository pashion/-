<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Redis;

use App\Option;

use DB;

use Redirect;

class ShopCartController extends Controller
{
    //加入购物车方法
    public function postIndex(Request $request){


    	//获取商品页的数据,商品id,数量,有无规格,规格值
        // dd($_POST);
    	$gid = $request->input('gid');
    	$num = $request->input('num');
    	$isSel = $request->input('isSel');
    	$num_bunch = $request->input('num_bunch');

        //获取该商品对应的规格数量,商品有规格则>0,否则为0
        $exists = Option::where('gid', $gid)->count(); 

        // 商品有规格
        if($exists > 0){
            //判断有规格产品加入购物车时是否有选择规格
            if($num_bunch == ''){
                //没有选择或选择不完全时：
                return back()->withInput()->with('news','请先选择规格,谢谢');
            }else{
                // 加入购物车已选规格,判断规格价格表有无对应价格,有则取出,没有则去商品表获取
                $list = DB::select('select str_bunch,price from spec_price where gid ='.$gid.' and num_bunch ='."'".$num_bunch."'");

                // 规格价格表有价格
                if($list){
                    $list = $list[0];
                    // 获取有对应的价格,商品名,图片
                    $goods_list = DB::select('select goods,price,pic from goods where id ='.$gid)[0];
                    $str_bunch = $list->str_bunch;
                    $price = $list->price;
                    $goods = $goods_list->goods;
                    $pic = $goods_list->pic;
                    // 判断图片字串有无','有则处理截取前面一段
                    $oldpic = @strpos($pic, ',');
                    if($oldpic){
                        $pic = substr($pic,0,$oldpic);
                    }

                    // 判断是否有该商品缓存,有规格有对应价格的键值id为gid|规格串值
                    if( $request->session()->has('list.'.$gid.'|'.$num_bunch) ){
                        $originNum = $request->session()->get('list.'.$gid.'|'.$num_bunch.'.num'); 
                        $newNum = $originNum + $num;
                        $request->session()->put('list.'.$gid.'|'.$num_bunch.'.num',$newNum);
                        $request->session()->save();
                        return back()->withInput()->with('news','购物车存在该商品，数量加一');
                    }else{
                        $data['goods'] = $goods;
                        $data['num_bunch'] = $num_bunch;
                        $data['str_bunch'] = $str_bunch;
                        $data['price'] = $price;
                        $data['gid'] = $gid;
                        $data['num'] = $num;
                        $data['pic'] = $pic;
                        //有规格存购物车的形式多了个规格数 
                        $request->session()->put('list.'.$gid.'|'.$num_bunch, $data);
                        $request->session()->save();
                        return back()->withInput()->with('news','添加购物车成功');
                    // 规格价格表无价格
                    }

                // 规格价格表无价格
                }else{
                    return back()->withInput()->with('news','未知错误,请选择其他商品');
                    
                }
            }


        //当产品没有规格时添加购物车
        }elseif($exists == 0){
            //获取没有规格产品的价格跟图片
            $list = DB::select('select goods,price,pic from goods where id ='.$gid)[0];
            $goods = $list->goods;
            $price = $list->price;
            $pic = $list->pic;
            // 判断图片字串有无','有则处理截取前面一段
            $oldpic = @strpos($pic, ',');
            if($oldpic){
                $pic = substr($pic,0,$oldpic);
            }
            
            //判断该产品是否存在购物车,存在则加数量,不存在保存该产品
            if( $request->session()->has('list.'.$gid) ){
                $originNum = $request->session()->get('list.'.$gid.'.num');
                $newNum = $originNum + $num;
                $request->session()->put('list.'.$gid.'.num',$newNum);
                $request->session()->save();
                // echo '没有规格的产品购物车存在';
                return back()->withInput()->with('news','购物车存在，数量加一');
            }else{
                //保存该商品到购物车
                $data['goods'] = $goods;
                $data['gid'] = $gid;
                $data['num'] = $num;
                $data['price'] = $price;
                $data['pic'] = $pic;
                $request->session()->put('list.'.$gid , $data);
                // session(['list.'.$gid => $data]);
                $request->session()->save();
                return back()->withInput()->with('news','添加购物车成功');
            }
            echo '_没有规格的产品';
        }

        
    }

    //获取缓存传输到购物车视图遍历商品
    public function getCart(Request $request){
        //获取缓存
    	$data = $request->session()->get('list');
        //获取热门商品
        $HOT = DB::select('select pic,goods,price,id from goods order by price desc limit 4');
        foreach($HOT as $k=>$v){
            $num = strpos($v->pic, ',');
            if($num){
                $v->pic = substr($v->pic,0,$num);
            }
        }
    	if($data){
	    	return view('web.cart',compact('data','HOT'));
    	}else{
	    	return view('web.nullcart',compact('HOT'));
    	}
    }

    //购物车删除商品
    public function postHandle(Request $request){
    	$gid = $request->input('gid');
    	$num_bunch = $request->input('bunch');
        // num_bunch为空则缓存键值为gid,否则为gid|num_bunch
    	if($num_bunch == ''){
    		$request->session()->forget('list.'.$gid);
    		$request->session()->save();
    		return '1';
    	}else{
    		$con = $gid.'|'.$num_bunch;
			$request->session()->forget('list.'.$con);
			$request->session()->save();
			return '2';
    	}
    }

    // 购物车+/—按钮运算
    public function postOperation(Request $request){
    	$gid = $request->input('gid');
    	$num_bunch = $request->input('bunch');
        // num_bunch为空则缓存键值为gid,否则为gid|num_bunch
    	$newNum = $request->input('newNum');
    	if($num_bunch == ''){
    		$request->session()->put('list.'.$gid.'.num', $newNum);
    		$request->session()->save();
    		return '1';
    	}else{
    		$con = $gid.'|'.$num_bunch;
    		$request->session()->put('list.'.$con.'.num',$newNum);
    		$request->session()->save();
    		return '2';
    	}
    }

    // 购物车checkbox按钮,处理并获取选中的
    public function postChoose(Request $request){
        $bool = $request->input('choose');
        if($bool == ''){
            // 结算为空时跳转空购物车
            $HOT = DB::select('select pic,goods,price,id from goods order by price desc limit 4');
            foreach($HOT as $k=>$v){
                $num = strpos($v->pic, ',');
                if($num){
                    $v->pic = substr($v->pic,0,$num);
                }
            }
            return view('web.nullcart',compact('HOT'));
        }
            
        if (isset(session('user')['0']->id)) {
            $_POST['user_id'] = session('user')['0']->id;
        }else{
            return Redirect::to("/home/login");
        }
        $cartData = $request->session()->all()['list'];
        $choseData = $request->all()['choose'];
        foreach ($choseData as $k => $v) {
             foreach ($cartData as $key => $value) {
                 if ($key==$v) {
                   $request->session()->put('orderlist.'.$key, $value);
                 }
             }
        }
       $data = $request->session()->all();
       // dd($data);
       return view('web.addorder',compact('data'));

    }

}
