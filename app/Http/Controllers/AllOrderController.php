<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Order;

class AllOrderController extends Controller
{
    public function index()
    {
    	// dd(session('user')['0']->id);
    	$user_id = session('user')['0']->id;
    	$data = order::where('user_id',$user_id)->get();
    	// dd($data);
    	return view('web.layout.userdetail.orders' ,compact("data"));
    }
}
