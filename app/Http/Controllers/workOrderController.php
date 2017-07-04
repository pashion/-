<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\order;

use App\orderDetail;

use DB; 


class workOrderController extends Controller
{
    public function index()
    {
    	$tatal = 0;
    	$num = 0;
    	// dump(session('user')['0']->id);
    	dump($_POST);
    	if ($_POST['num_bunch']) {
    		$goodsData = DB::table('spec_price')->where('num_bunch','=',$_POST['num_bunch'])->get();
    	}else{
    		$goodsData = DB::table('goods')->where('id','=',$_POST['goods_id'])->get();
    	}
    	
    	$price = $_POST['num'] * $goodsData['0']->price;
    	$tatal +=$price;
    	$num += $_POST['num'];
    	// dump($num);
    	$orderData['user_id'] = $_POST['user_id'];
    	$orderData['address_id'] = $_POST['address_id'];
    	$orderData['pay_type'] = 0;
    	$orderData['pay_status'] = 0;
    	$orderData['tatal_amount'] = $tatal;
    	$orderData['created_at'] = date('Y-m-d H:i:s');
    	$orderData['updated_at'] = date('Y-m-d H:i:s');
    	$orders = order::insertGetId($orderData) ;
    	if ($orders) {
    		$goodsData1 = DB::table('goods')->where('id','=',$_POST['goods_id'])->get();
    		// dd($goodsData1);
    		foreach ($goodsData1 as $k => $v) {
    			// dump($v);
    			$orderDetail['order_id'] = $orders;
    			$orderDetail['goods_id'] = $_POST['goods_id'];
    			$orderDetail['goods_name'] = $v->goods;
    			$orderDetail['goods_pic'] = $v->pic;
    			$orderDetail['order_status'] = 0;
    			$orderDetail['commodity_number'] = $num;
    			$orderDetail['cargo_price'] = $price;
    			$orderDetail['ruturn_status'] = 0;
    			$orderDetail['comment_status'] = 0;

    		}
    		// dd($orderDetail);

    		$date = orderDetail::insertGetId($orderDetail);
    		var_dump($date);
    		if ($date > 0) {
    			echo "成功";
    		}else{
    			echo "失败";
    		}
    		echo "下单!";
    	}else{
    		echo "下单失败";
    	}
    }
}
