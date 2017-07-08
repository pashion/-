<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( $request->session()->has('admins') ) {
            return $next($request);
        }else{
            //跳转到登录界面
            return redirect('/')->with('error', '请先登录');
        }
    }
}
