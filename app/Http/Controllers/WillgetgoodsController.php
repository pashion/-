<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\OrderDetail;

use DB;

class WillgetgoodsController extends Controller
{
    public function index(Request $request)
    {
    	// dd(session('user')['0']->id);
    	$user_id = session('user')['0']->id;
    	$data = orderDetail::where(['user_id'=>$user_id,'order_status'=>'1'])->where('order_id','like','%'.$request->input('keywords').'%')->paginate(3);
    	// dd($data);
    	return view('web.layout.userdetail.willgetgooods' ,['data'=>$data,'request'=>$request->all()]);
    }
    public function actiongoods($id){
    	// $data = orderDetail::where('id',$id)->get();
    	$orderData = DB::table('orderDetail')->where('id','=',$id)->get();
    	// dump($orderData);
    	$updata['id'] = $id;
    	$updata['order_id'] = $orderData['0']->order_id;
    	$updata['goods_id'] = $orderData['0']->goods_id;
    	$updata['goods_name'] = $orderData['0']->goods_name;
    	$updata['order_status'] = 2;
    	$updata['commodity_number'] = $orderData['0']->commodity_number;
    	$updata['cargo_price'] = $orderData['0']->cargo_price;
    	$updata['ruturn_status'] = $orderData['0']->ruturn_status;
    	$updata['comment_status'] = $orderData['0']->comment_status;
    	$updata['created_at'] = $orderData['0']->created_at;
    	$updata['goods_pic'] = $orderData['0']->goods_pic;
    	$updata['updated_at'] = $orderData['0']->updated_at;
    	$updata['user_id'] = $orderData['0']->user_id;
    	// dd($aa);
    	// dump($orderData);
    	$upData=orderDetail::find($id)->update($updata);
        if($upData==true){
             return redirect('web/order')->with('success','修改成功');
        }else{
           return back()->with('error','添加失败');
        }
    }
}
