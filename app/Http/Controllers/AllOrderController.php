<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\OrderDetail;

use App\Flink;

class AllOrderController extends Controller
{
    public function index(Request $request)
    {
    	// dd(session('user')['0']->id);
    	$user_id = session('user')['0']->id;
    	$data = orderDetail::where('user_id',$user_id)->where('order_id','like','%'.$request->input('keywords').'%')->paginate(3);
    	// dd($data);
    	$flink = flink::get();
    	// dd($flink);
    	return view('web.layout.userdetail.orders' ,['data'=>$data,'flink'=>$flink,'request'=>$request->all()]);
    }
}
