<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Storage;
use Image;
use App\Wheel;
use DB;

class WheelController extends Controller
{
    //轮播图首页展示
    public function index(Request $request)
    {
        $search = $request->input('search');
 
        $Wheel = Wheel::where('picname','like','%'.$search.'%')->paginate(1);
        return view('/zhuazi.production.Wheel.index',compact('Wheel','search'));  
        
    }

    //插入轮播图
    public function create()
    {
        return view('/zhuazi.production.Wheel.create');
    }

    //接收插入轮播图数据并处理
    public function store(Request $request)
    {
        $picname = $request->input('picname');
        $sort = $request->input('sort');
        //判断请求中是否包含name=picurl的上传文件
        if($request->hasFile('picurl')){
            $file = $request->file('picurl');
            //判断文件上传过程中是否出错
            if(!$file->isValid()){
                exit('文件上传出错！');
            }
            //提取文件后缀,判断是否为文件类型
            $ext = $file->getClientOriginalExtension();
            //定义允许添加的文件类别
            $allowed_extensions = ["png", "jpg", "gif",'jpeg'];
            if(in_array($ext,$allowed_extensions)){
                //生成年月日时分秒用作图片名
                $newFileName = 'Wheel_'.date('Y-m-d-H-i-s').'.'.$ext;
                //存入数据库的路径
                $path = 'uploads/Wheel/'.date('Y-m-d');
                //把新传入的图片写入文件夹
                $request->file('picurl')->move($path,$newFileName);
                //插入数据库信息,描述、排序、路径
                // DB::table('Wheel')->insert(['picname'=>$picname ,'sort'=>$sort,'picurl'=>$newFileName,'path'=>$path]);
                $num = Wheel::create(['picname'=>$picname ,'sort'=>$sort,'picurl'=>$newFileName,'path'=>$path]);
                //跳转到轮播图首页
                return redirect('Wheel');
            }else{
                return '图片类型错误';
            }
        }
    }

    public function show($id)
    {
        //
    }

    //编辑页面
    public function edit($id)
    {
        $info = DB::select('select id,picname,sort from Wheel where id = '.$id)[0];
        return view('/zhuazi.production.Wheel.edit',compact('info'));
    }

    //编辑更新处理
    public function update(Request $request, $id)
    {
        $picname = $request->input('picname');
        $sort = $request->input('sort');
        //判断请求中是否包含name=file的上传文件
        if(!$request->hasFile('picurl')){
            //没有图片上传则执行字段更新
            $bool = DB::table('Wheel')
                ->where('id', $id)
                ->update( ['picname'=>$picname ,'sort'=>$sort] );
            return redirect('Wheel');
        }
        $file = $request->file('picurl');
        //判断文件上传过程中是否出错
        if(!$file->isValid()){
            exit('文件上传出错！');
        }
        //提取文件后缀,判断是否为文件类型
        $ext = $file->getClientOriginalExtension();
        $allowed_extensions = ["png", "jpg", "gif",'jpeg'];
        if(in_array($ext,$allowed_extensions)){
            //拿到之前图片路径
            $list = DB::select('select path,picurl from Wheel where id ='.$id)[0];
            $path = $list->path;
            $picurl = $list->picurl;
            //删除该图片
            $num = unlink($path.'/'.$picurl);
            //生成年月日时分秒用作图片名
            $newFileName = 'Wheel_'.date('Y-m-d-H-i-s').'.'.$ext;
            //存入数据库的路径
            $path = 'uploads/Wheel/'.date('Y-m-d');
            //把新传入的图片写入文件夹
            $request->file('picurl')->move($path,$newFileName);
            //更新数据库信息,描述、排序、路径
            $bool = DB::table('Wheel')
                ->where('id', $id)
                ->update( ['picname'=>$picname ,'sort'=>$sort,'picurl'=>$newFileName,'path'=>$path] );
            //跳转到轮播图首页
            return redirect('Wheel');
        }else{
            return '图片类型错误';
        }
    }

    //删除轮播图
    public function destroy($id)
    {
        //获取路径
        $list = DB::select('select picurl,path from Wheel where id ='.$id)[0];
        $path = $list->path;
        $url = $list->picurl;
        //删除原图
        $bool = @unlink($path.'/'.$url);
        //删除数据库
        $bool = DB::table('Wheel')->where('id', '=', $id)->delete();
        //返回>1则删除成功
        echo $bool;
    }

    //ajax修改顺序
    public function sort(Request $request)
    {
        $id = $request->input('id');
        $sort = $request->input('sort');
        DB::table('Wheel')
            ->where('id', $id)
            ->update(['sort' => $sort]);
        return $id;
    }
}
