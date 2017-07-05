<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\OrderDetail;
class detailController extends Controller
{
     public function index(Request $request)
    {
        $orderData=orderDetail::where('order_id','like','%'.$request->input('keywords').'%')->paginate(3);
        // dd($orderData);
        return view('zhuazi/production/order/orderDetail',['orderData'=>$orderData,'request'=>$request->all()]);
    }
    
}
