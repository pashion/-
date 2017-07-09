<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Middleware\DelTypeMiddleware;

use App\Http\Requests;

use deltype;

use App\SecondType;
use App\Admin;
use DB;

use Illuminate\Support\Facades\Response;

class SecoundTypeController extends Controller
{
    public function __construct()
    {
        //资源路由在控制器里写中间件,第一个参数为中间件的简写名
        $this->middleware('deltype',['only'=>['destroy']]);
    }

    public function index()
    {
        Admin::findRole('type@show');

        //类别管理首页,查询二级类别表，通过path,id组合排序结果集,传递给index视图处理输出
        $info = DB::select('SELECT * from second_type ORDER BY CONCAT(path,id)');
        return view('zhuazi.production.secoundType.index',compact('info'));
    }

    public function create()
    {
        Admin::findRole('type@add');
        //类别管理:添加根类别视图输出
        return view('zhuazi.production.secoundType.create');
    }

    public function store(Request $request)
    {

        //处理添加根目录传输过来的值并插入到数据表格中,并闪存name值->类名+添加成功
        $info = $request->all();
        $num = DB::select(' select count(*) num from second_type where path = \'0,\' ')[0]->num;
        if($num == 0){
            $info['sort'] = 1;
        }else{
            $info['sort'] = $num + 1;
        }
        SecondType::create($info);
        return redirect('/SecoundType')->with('name',$request->input('name').'添加成功');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        Admin::findRole('type@update');

        //首页编辑传递类别id值,接收并查询该类别信息传递到edit视图,并提供name值修改
        $name = DB::select('select id,name,sort from second_type where id ='.$id)[0];
        return view('zhuazi.production.secoundType.edit',compact('name'));
    }

    public function update(Request $request, $id)
    {
        Admin::findRole('type@update');
        //接收update视图修改的传值,并对该类目名称进行修改,返回闪,存值+修改成功,到首页
        DB::table('second_type')
            ->where('id', $id)
            ->update(['name' => $request->name,'sort'=>$request->sort]);
        return redirect('/SecoundType')->with('name',$request->input('name').'修改成功');
    }

    public function destroy($id)
    {
        
        Admin::findRole('type@delete');
        //接收ajax/post方式的传值,并对该条目数据进行删除,返回给ajax进行页面局部刷新
        $num = DB::table('second_type')->where('id', '=', $id)->delete();
        //返回0则删除失败,返回1则删除成功
        echo $num;
    }

    public function increase(Request $request)
    {
        //接收该添加子类别的数据,并输出新生成子类别需要的数据
        $ret = $request->all();
        return view('zhuazi.production.secoundType.increase',compact('ret'));
    }

    public function insert(Request $request)
    {
        //接收添加子类别的数据,并插入子类别,添加闪存输出类名+添加成功返回
        $ret = $request->all();
        $num = DB::select('select count(*) num from second_type where path ='."'".$ret['path']."'" )[0]->num ;
        if($num == 0){
            $ret['sort'] = 1;
        }else{
            $ret['sort'] = $num + 1;
        }
        SecondType::create($ret);
        return redirect('/SecoundType')->with('name',$request->input('name').'添加成功');

    }

    public function ajax(Request $request)
    {
        //种类、风格、区域类目下的所有数据以垂直单条的形式输出,接收方根据需要结果集进行遍历
        $a = DB::select('select id,name from second_type where tid = 3');
        $b = DB::select('select id,name from second_type where tid = 4');
        $c = DB::select('select id,name from second_type where tid = 5');
        return view('zhuazi.production.secoundType.ajax',compact('a','b','c'));
    }

    public function getmsg(Request $request)
    {
        //ajax触发三级联动时根据id来查找子类的信息并返回给前台进行遍历输出
        $a = $request->input('id');
        $info = DB::select('select id,name from second_type where tid = '.$a);
        return $info;
    }
    
}
