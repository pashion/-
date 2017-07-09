<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Image;

use App\Article;
use App\Admin;

use DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Admin::findRole('scrap@show');
        $data = DB::table('Article')->paginate(3);
        return view('zhuazi.production.article.index',compact('data'));
    }

    public function create()
    {
        Admin::findRole('scrap@add');

        return view('zhuazi.production.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // 表单验证
        $title = $request->input('title');
        $description = $request->input('description');
        $author = $request->input('author');
        $cover = $request->input('cover');
        $content = $request->input('content');

        $tip = ['required' => ':attribute必须填写','min'=>':attribute不能少于3个字符','numeric'=>':attribute必须为数字'];

        $msg = ['title' => '标题','description'=>'描述','author'=>'作者','cover' => '封面', 'content' => '内容'];

        $this->validate($request, [
            'title' => 'required|min:3',
            'description' => 'required',
            'author' => 'required',
            'cover' => 'required',
            'content' => 'required',
        ],$tip,$msg);





        $list = $request->all();
        $data['title'] = $list['title'];
        $data['description'] = $list['description'];
        $data['content'] = $list['content'];
        $data['cover'] = trim($list['cover']);
        $data['date'] = $list['date'];
        $data['author'] = $list['author'];
        $data['coverpath'] = $list['coverpath'];
        $bool = Article::create($data);
        // $bool = DB::table('Article')->insert($data);
        if($bool){
            return redirect('Article')->withInput()->with('news','添加成功！');
        }else{
            return redirect('Article')->withInput()->with('news','添加失败,请尝试重新添加！');
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
        Admin::findRole('scrap@update');

        $data = DB::select('select id,title,author,description,date,content,cover,coverpath from Article where id = '.$id)[0];
        return view('zhuazi.production.article.edit',compact('data'));
    }

    /**
     *匹配更新前编辑器的图片路径,如果更新则删除原图片,在执行更新操作
     *判断封面图片是否有更新,有更新封面旧图也要删除
     *删除完毕后数据库执行更新,封面/编辑器新图会触发ajax自动上传
     */
    public function update(Request $request, $id)
    {
        //获取所有请求数据
        $data = $request->all();
        $list['title'] = $data['title'];
        $list['author'] = $data['author'];
        $list['description'] = $data['description'];
        $list['content'] = $data['content'];

        //正则匹配img标签的src里面的路径数据数据
        $pattern = '/<img\s+src="(.*?)".*?>/';
        //匹配旧编辑器数据,拿到旧图片路径
        preg_match_all($pattern,$data['oldimg'],$matches);
        //旧图片路径数组
        $url = $matches[1];
        //判断coverpath封面路径是否为空,为空则封面没有被修改,不需删除该图片,否则删除
        if(!$data['coverpath'] == '' and !$data['cover'] == ''){
            //当封面更新时,数据库cover/coverpath数据也要更新
            $list['cover'] = trim($data['cover']);
            $list['coverpath'] = $data['coverpath'];
            //旧封面路径
            $url[count($url)] = $data['oldcover'];
            //旧封面缩放t_路径
            $url[count($url)] = $data['t_oldcover'];
        }
        //删除该文章的所有旧图片
        for($i=0;$i<count($url);$i++)
        {
            echo @unlink($url[$i]);
        }
        $bool = DB::table('Article')
            ->where('id', $id)
            ->update( $list );
        if($bool > 0){
            return redirect('Article')->withInput()->with('news','修改成功！');
        }else{
            return redirect('Article')->withInput()->with('news','修改失败,请尝试重新修改！');
        }

    }

    /**
     * 删除单篇文章
     * 获取封面+t_封面+编辑器的图片
     * 删除数据库文件
     */
    public function destroy($id)
    {
        Admin::findRole('scrap@delete');
        

        $data = DB::select('select cover,coverpath,content from Article where id = '.$id)[0];
        //正则匹配img标签src的字符串
        $str = $data->content;
        //封面图路径
        $coverpath = $data->coverpath;
        //封面图名字
        $cover = $data->cover;
        //正则匹配img标签的src里面的路径数据规则
        $pattern = '/<img\s+src="(.*?)".*?>/';
        preg_match_all($pattern,$str,$matches);
        //旧图片路径数组
        $url = $matches[1];
        //封面图原文件
        $url[count($url)] = $coverpath.'/'.$cover;
        //封面图缩放t_文件
        $url[count($url)] = $coverpath.'/t_'.$cover;

        //循环删除单篇文章所有图片
        for($i=0;$i<count($url);$i++)
        {
            //路径开头不需要/号
            $newUrl = ltrim($url[$i],'/');
            echo @unlink($newUrl);
        }

        $bool = DB::table('Article')->where('id', '=', $id)->delete();
        echo $bool;
    }

    public function ajax(Request $request)
    {
        $file = $request->file('file');//获取文件对象
        if ( !$file -> isValid() ) {
            return  0;
        }
        //记录数据
        $clientName =   $file -> getClientOriginalName();
        $tmpName    =   $file ->getFileName();
        $realPath   =   $file -> getRealPath();
        $extension  =   $file -> getClientOriginalExtension();
        $mimeTye    =   $file -> getMimeType();

        $newName    = 'cover_'.date('YmdHis').'.'.$extension;

        $request->file('file')->move('uploads/cover/'.date('Y-m-d'), $newName);
        Image::make('../public/uploads/cover/'.date('Y-m-d').'/'.$newName)->resize(290,150)->save('../public/uploads/cover/'.date('Y-m-d').'/t_'.$newName);

        return $newName;//返回文件名
    }


}
