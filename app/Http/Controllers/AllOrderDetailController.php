<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\OrderDetail;

class AllOrderDetailController extends Controller
{
	public function index($id){
		$data = orderDetail::where('order_id',$id)->get();
    	// dd($data);
    	return view('web.layout.userdetail.orders' ,compact("data"));
	}

    	
}

