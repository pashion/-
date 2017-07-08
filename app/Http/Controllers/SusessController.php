<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\OrderDetail;

class SusessController extends Controller
{
     public function index(Request $request)
    {
    	// dd(session('user')['0']->id);
    	$user_id = session('user')['0']->id;
    	$data = orderDetail::where(['user_id'=>$user_id,'order_status'=>'2'])->where('order_id','like','%'.$request->input('keywords').'%')->paginate(3);
    	// dd($data);
    	return view('web.layout.userdetail.susess' ,['data'=>$data,'request'=>$request->all()]);
    }
}
