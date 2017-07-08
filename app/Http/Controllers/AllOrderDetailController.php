<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\OrderDetail;

use DB;

class AllOrderDetailController extends Controller
{
	public function index($id){
		$data = orderDetail::where('order_id',$id)->get();
    	// dd($id);
    	// 　$_list = DB::table('a')->leftJoin(DB::raw('({$sub->toSql()}) as b),'a.id','=','b.aid)->get()
    	return view('web.layout.userdetail.orderDetail' ,compact("data"));
	}

    	
}

