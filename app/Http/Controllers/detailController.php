<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;
use App\OrderDetail;

use DB;
class detailController extends Controller
{
     public function index(Request $request)
    {   
        Admin::findRole('order@show');

        $orderData=orderDetail::where('order_id','like','%'.$request->input('keywords').'%')->paginate(3);
        // dd($orderData);
        return view('zhuazi/production/order/orderDetail',['orderData'=>$orderData,'request'=>$request->all()]);
    }

    public function edit($id)
    {
        // $info = DB::table('flink')->where('id','=',$id)->first();
        // $picname = $info->image;
        Admin::findRole('order@update');

        $data=DB::select('select * from orderDetail where id = ?', [$id]);
       return view('zhuazi/production/order/edit')->with('data',$data[0]);
    }

    public function update(Request $request, $id)
    {
    	$_POST['updated_at'] = date('Y-m-d H:i:s');
        $data=$_POST;
        // dd($data);
        $upData=orderDetail::find($id)->update($data);
        if($upData==true){
             return redirect('detail')->with('success','修改成功');
        }else{
           return back()->with('error','添加失败');
        }
    }
    public function destroy($id)
    {
        Admin::findRole('order@delete');

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
