<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\goods;
use App\order;
use App\order_detail;
use DB;
class createOrderController extends Controller
{
    public function index()
    {
    	$data=$_POST;
    	return view('web.order',compact('data'));
    }
}
