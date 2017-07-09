<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

use DB;

use Redis;

class ColourTideController extends Controller
{
    public function getIndex(Request $request){
        $search = $request->input('search');
        $Article = Article::where('title','like','%'.$search.'%')->paginate(4);
    	return view('web.colourTide',compact('Article','search'));
    }

    public function getDetail(Request $request)
    {
    	$id = $request->input('colourId');
        $newList = DB::select('select * from Article order by created_at desc limit 3');
    	$list = DB::select('select * from Article where id='.$id)[0];
        return view('web.colourTidedetail',compact('list','newList'));
    }

    public function getCeshi(Request $request){
        Redis::set('name','jack');
        $a = Redis::get('name');
        echo $a;
    }

}
