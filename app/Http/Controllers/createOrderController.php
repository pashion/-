<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\goods;
use App\order;
use App\order_detail;
use DB;
use Redirect;
class createOrderController extends Controller
{
    public function index()
    {
    	if (isset(session('user')['0']->id)) {
    		$_POST['user_id'] = session('user')['0']->id;
    	}else{
    		return Redirect::to("/home/login");
    	}
    	$data=$_POST;
    	return view('web.order',compact('data'));
    }
}
