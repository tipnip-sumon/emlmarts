<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserLoginAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        prx($request->session()->all());
        // if($request->session()->has('FRONT_USER_LOGIN')){

        // }else{
        //     return redirect("/");
        // }
        // return $next($request);
    }
}
