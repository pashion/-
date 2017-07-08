<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\OrderDetail;

use App\Criticism;

use DB;
class WilltalkingController extends Controller
{
    public function index(Request $request)
    {
    	// dd(session('user')['0']->id);
    	$user_id = session('user')['0']->id;
    	$data = orderDetail::where(['user_id'=>$user_id,'comment_status'=>'0','order_status'=>'2'])->where('order_id','like','%'.$request->input('keywords').'%')->paginate(3);
    	// dd($data);
    	return view('web.layout.userdetail.willtalking' ,['data'=>$data,'request'=>$request->all()]);
    }
    public function actiontalking($id){
    	$user_id = session('user')['0']->id;
    	$orderData = DB::table('orderDetail')->where('id','=',$id)->get();
    	$goods_id = $orderData['0']->goods_id;
    	$order_id = $orderData['0']->order_id;
    	return view('web.layout.userdetail.addtalking',compact('id','user_id','goods_id','order_id'));
    	
    }
    public function  addtalking()
    {

    	$data=$_POST;
    	// dd($data);
    	$id = $_POST['orderDetail_id'];
    	criticism::create($data);
    	if($data>0){
    		$orderData = DB::table('orderDetail')->where('id','=',$id)->get();
	    	// dump($orderData);
	    	$updata['id'] = $id;
	    	$updata['order_id'] = $orderData['0']->order_id;
	    	$updata['goods_id'] = $orderData['0']->goods_id;
	    	$updata['goods_name'] = $orderData['0']->goods_name;
	    	$updata['order_status'] = $orderData['0']->order_status;
	    	$updata['commodity_number'] = $orderData['0']->commodity_number;
	    	$updata['cargo_price'] = $orderData['0']->cargo_price;
	    	$updata['ruturn_status'] = $orderData['0']->ruturn_status;
	    	$updata['comment_status'] = 1;
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

            return redirect('web/willtalking')->with('success','评论成功');
        }else{
            return back()->with('error','评论失败');
        }
    }
}
