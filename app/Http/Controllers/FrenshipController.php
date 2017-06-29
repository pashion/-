<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;

use App\Http\Requests;

use App\Flink;
use DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;


class FrenshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $urlData=flink::where('name','like','%'.$request->input('keywords').'%')->paginate(3);
//        $urlData=flink::get();
        return view('zhuazi/production/frenship/index',['urlData'=>$urlData,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zhuazi/production/frenship/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        if($file -> isValid()){
            $extension = $file -> getClientOriginalExtension();

        }
        $img = Image::make($_FILES['image']['tmp_name']);       // Image::make() 支持这种方式
        $newName = md5(date('ymdhis').$img).'.'.$extension;

        //原型图片
        $img->save("uploads/".$newName);
        //大型图片
        $img->fit(400, 400);
        $img->save("uploads/_max".$newName);
        //中型图片
        $img->fit(200, 200);
        $img->save("uploads/_s".$newName);
        //小图片
        $img->fit(10, 10);
        $img->save("uploads/_min".$newName);
        $_POST['image']=$newName;
        $data=$_POST;
//        $data['name']=$_POST['name'];
//        $data['url']=$_POST['url'];
//        $data['type']=$_POST['type'];
//        $data['image']=$_POST['image'];
       flink::create($data);
        if($data>0){
            return redirect('frenship')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        // $info = DB::table('flink')->where('id','=',$id)->first();
        // $picname = $info->image;

        $data=DB::select('select * from flink where id = ?', [$id]);
       return view('zhuazi/production/frenship/edit')->with('data',$data[0]);
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
        $info = DB::table('flink')->where('id','=',$id)->first();
        $picname = $info->image;
        // $file = $request->file('image');
        if($request -> hasFile('image')){
            $extension = $request->file('image') -> getClientOriginalExtension();
            $img = Image::make($_FILES['image']['tmp_name']);       // Image::make() 支持这种方式
            $newName = md5(date('ymdhis').$img).'.'.$extension;

            //原型图片
            $img->save("uploads/".$newName);
            //大型图片
            $img->fit(400, 400);
            $img->save("uploads/_max".$newName);
            //中型图片
            $img->fit(200, 200);
            $img->save("uploads/_s".$newName);
            //小图片
            $img->fit(10, 10);
            $img->save("uploads/_min".$newName);
            $_POST['image']=$newName;
            $_POST['updated_at']=date('Y-m-d H:i:s');
            $data=$_POST;
            $upData=flink::find($id)->update($data);
            unlink('E:\aaa\wamp\www\shop-laravel\public\uploads'.'/_s'.$picname);
            unlink('E:\aaa\wamp\www\shop-laravel\public\uploads'.'/_min'.$picname);
            unlink('E:\aaa\wamp\www\shop-laravel\public\uploads'.'/_max'.$picname);
            unlink('E:\aaa\wamp\www\shop-laravel\public\uploads'.'/'.$picname);
            if($upData==true){
                return redirect('frenship')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }
        }else{
            $_POST['updated_at']=date('Y-m-d H:i:s');
            $data=$_POST;
            $upData=flink::find($id)->update($data);
            if($upData==true){
                return redirect('frenship')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }
        }
        

//        return view('zhuazi/production/frenship/update',compact('upData'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $info = DB::table('flink')->where('id','=',$id)->first();

        $picname = $info->image;
        // dd($picname);
         
         // dd(1);
       $deData= DB::delete('delete from flink where id = ?',[$id]);
      
        if($deData==1){
           
           $data=[
                
               'statu'=>0,
               'msg'=>'删除成功'

           ];
            unlink('E:\aaa\wamp\www\shop-laravel\public\uploads'.'/_s'.$picname);
           unlink('E:\aaa\wamp\www\shop-laravel\public\uploads'.'/_min'.$picname);
           unlink('E:\aaa\wamp\www\shop-laravel\public\uploads'.'/_max'.$picname);
           unlink('E:\aaa\wamp\www\shop-laravel\public\uploads'.'/'.$picname);
        }else{
            $data=[
                'statu'=>1,
                'msg'=>'删除失败'
            ];
        }
        return $data;
    }
}
