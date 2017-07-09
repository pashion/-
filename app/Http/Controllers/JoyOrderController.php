<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\order;

use App\orderDetail;

use DB; 

class JoyOrderController extends Controller
{
    public function index()
    {
    	// dump($_POST);
    	$orderData['user_id'] = $_POST['user_id'];
    	$orderData['address_id'] = $_POST['address_id'];
    	$orderData['pay_type'] = 0;
    	$orderData['pay_status'] = 0;
    	$orderData['tatal_amount'] = $_POST['tatal'];
    	$orderData['created_at'] = date('Y-m-d H:i:s');
    	$orderData['updated_at'] = date('Y-m-d H:i:s');
    	$orders = order::insertGetId($orderData) ;
    	if ($orders) {
    		$info = session('orderlist');
    		foreach ($info as $k=>$v) {
				$orderDetail['order_id'] = $orders;
				$orderDetail['user_id'] = $_POST['user_id'];
    			$orderDetail['goods_id'] = $info[$k]['gid'];
    			$orderDetail['goods_name'] = $info[$k]['goods'];
    			$orderDetail['goods_pic'] = $info[$k]['pic'];
    			$orderDetail['order_status'] = 0;
    			$orderDetail['commodity_number'] = $info[$k]['num'];
    			$orderDetail['cargo_price'] = $info[$k]['price'];
    			$orderDetail['ruturn_status'] = 0;
    			$orderDetail['comment_status'] = 0;
                $orderDetail['created_at'] = date('Y-m-d H:i:s');
                $orderDetail['updated_at'] = date('Y-m-d H:i:s');
                $date = orderDetail::insertGetId($orderDetail);
                if ($date > 0) {
    				echo "成功";
	    		}else{
	    			echo "失败";
	    		}
               session()->forget('list');
               session()->forget('orderlist');
               session()->save();
    		}
    	}else{
    		echo "失败";
    	}
    }
}
