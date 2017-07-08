<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Redis;

class ColourTideController extends Controller
{
    public function getIndex(Request $request){
    	$Article = DB::select('select * from Article');
    	return view('web.colourTide',compact('Article'));
    }

    public function getDetail(Request $request)
    {
    	$id = $request->input('colourId');
    	$list = DB::select('select * from Article where id='.$id)[0];
        return view('web.colourTidedetail',compact('list'));
    }
}
