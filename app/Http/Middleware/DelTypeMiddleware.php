<?php

namespace App\Http\Middleware;

use Closure;

use DB;

class DelTypeMiddleware
{

    public function handle($request, Closure $next)
    {
        $id = $request->input('id');
        $num = DB::select('select count(*) num from second_type where tid ='.$id)[0]->num;
        //判断该类别下是否还有子类别,如果有则不删除,反之则删除
        if($num > 0 ){
            //返回的值会被ajax接收,ajax不在执行本身的请求
            return '确定删除吗？删除请先把子类删除完毕！';

            //如果此次请求的方式不是get、活着为想违背的请求,则报405(Method not allow)错误
            //return redirect('/SecoundType');
        }
        return $next($request);
    }
}
