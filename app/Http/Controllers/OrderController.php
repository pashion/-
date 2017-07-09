<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Order;
use App\Admin;

use App\OrderDetail;

use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Admin::findRole('order@show');

        $orderData=order::where('id','like','%'.$request->input('keywords').'%')->paginate(3);
        return view('zhuazi/production/order/index',['orderData'=>$orderData,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::findRole('order@delete');

        // $deData = DB::delete('delete from order where id = ?',[$id]);
        $deData = DB::delete('delete from `order` where id = ?',[$id]);
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
