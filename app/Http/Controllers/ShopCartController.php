<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Redis;

use DB;

class ShopCartController extends Controller
{
    //加入购物车方法
    public function postIndex(Request $request){

    	//获取商品页的数据,商品id,数量,有无规格,规格值
    	$gid = $request->input('gid');
    	$num = $request->input('num');
    	$isSel = $request->input('isSel');
    	$num_bunch = $request->input('num_bunch');

    	// dd($request->all());
    	//判断该产品是否有规格,当isSel等于A时则不存在规格
    	if($isSel == 'A'){
    		//获取没有规格产品的价格跟图片
    		$list = DB::select('select goods,price,pic from goods where id ='.$gid)[0];
    		$goods = $list->goods;
    		$price = $list->price;
    		$pic = $list->pic;

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
    	}elseif($isSel == ''){
    		//正则匹配,未完成，没有理解正则规则！
    		// $reg = '[^(\d+)|$1[_]$1|$1[_]$1[_]$1|$1[_]$1[_]$1[_]$1]';
    		// $bool = preg_match($reg,$num_bunch);

    		//当num_bunch等于1则该产品有规格参数但用户未选择
    		if($num_bunch == 1  or $num_bunch == ''){
    			return back()->withInput()->with('news','请先选择规格,谢谢');
    		}else{
    			//判断购物车有无该商品的数据
    			if( $request->session()->has('list.'.$gid.'|'.$num_bunch) ){
					$originNum = $request->session()->get('list.'.$gid.'|'.$num_bunch.'.num'); 
					$newNum = $originNum + $num;
					$request->session()->put('list.'.$gid.'|'.$num_bunch.'.num',$newNum);
					$request->session()->save();
					return back()->withInput()->with('news','购物车存在该商品，数量加一');			
    			}else{
    				//购物车没有该产品时
    				//查询对应规格的价格跟规格名
    				$list = DB::select('select str_bunch,price from spec_price where gid ='.$gid.' and num_bunch ='."'".$num_bunch."'")[0];
    				//查询该产品的图片
    				$g_list = DB::select('select goods,pic from goods where id ='.$gid)[0];
    				$pic = $g_list->pic;
    				$goods = $g_list->goods;

    				// $goods = $list->goods;
    				$price = $list->price;
    				$str_bunch = $list->str_bunch;

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
    			}
    		}
    	}
    }

    public function getCart(Request $request){
    	$data = $request->session()->get('list');
    	if($data){
	    	return view('web.cart',compact('data'));
    	}else{
	    	return view('web.nullcart');
    	}
    }


    public function postHandle(Request $request){
    	$gid = $request->input('gid');
    	$num_bunch = $request->input('bunch');
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

    public function postOperation(Request $request){
    	$gid = $request->input('gid');
    	$num_bunch = $request->input('bunch');
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

    public function postChoose(Request $request){
        // $request->session()->forget('orderlist');

        // dd($_POST);
        $cartData = $request->session()->all()['list'];
        $choseData = $request->all()['choose'];
        foreach ($choseData as $k => $v) {
             foreach ($cartData as $key => $value) {
                 if ($key==$v) {
                    // session('orderlist')[$key] = $value[$key];
                   $request->session()->put('orderlist.'.$key, $value);


                 }

             }
        }
       $data = $request->session()->all();
       // dd($data);
       return view('web.addorder',compact('data'));
    }

}
