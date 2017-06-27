<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Criticism;
use DB;

class TalkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talkData=criticism::paginate(2);
        return view('zhuazi/production/talking/index',compact('talkData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zhuazi/production/talking/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=$_POST;
        criticism::create($data);
//        return view('zhuazi/production/talking/store',compact('data'));
        if($data>0){
            echo "添加成功.<br/>";
            echo '<a href="/talking">点击这里</a> 返回.';
        }else{
            echo "添加失败";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::select('select * from criticism where id = ?', [$id]);
        return view('zhuazi/production/talking/edit')->with('data',$data[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$_POST;
        $upData=criticism::find($id)->update($data);
        if($upData==true){
            echo "修改成功.<br/>";
            echo '<a href="/talking">点击这里</a> 返回.';
        }else{
            echo "修改失败";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $deData = DB::delete('delete from criticism where id = ?',[$id]);
        if($deData==1){

           $data=[
               'statu'=>0,
               'msg'=>'删除成功'
           ];
        }else{
            $data=[
                'statu'=>1,
                'msg'=>'删除失败'
            ];
        }
        return $data;
    }
}
