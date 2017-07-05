<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\OrderDetail;

use DB;
class detailController extends Controller
{
     public function index(Request $request)
    {
        $orderData=orderDetail::where('order_id','like','%'.$request->input('keywords').'%')->paginate(3);
        // dd($orderData);
        return view('zhuazi/production/order/orderDetail',['orderData'=>$orderData,'request'=>$request->all()]);
    }
    public function edit($id)
    {
        // $info = DB::table('flink')->where('id','=',$id)->first();
        // $picname = $info->image;

        $data=DB::select('select * from orderDetail where id = ?', [$id]);
       return view('zhuazi/production/order/edit')->with('data',$data[0]);
    }
    public function store(Request $request)
    {

        $_POST['user_id']="1";
        $_POST['goods_id']="1";
        $data=$_POST;
        // dd($data);
        criticism::create($data);
        if($data>0){
            return redirect('talking')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }
    public function destroy($id)
    {

        $deData = DB::delete('delete from orderDetail where id = ?',[$id]);
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
