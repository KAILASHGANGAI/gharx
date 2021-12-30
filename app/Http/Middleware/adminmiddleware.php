<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('admin_user') && ($request->path() !='/Admin_login')){
            return redirect('/Admin_login')->with('fail','You must be logged in');
        }

        if(session()->has('admin_user') && ($request->path() == '/Admin_login' ) ){
            return back();
        }
    
        return $next($request);
    }
}
