<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserCheckLoginMiddleware
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
        if(Auth::check()){
            if(Auth::User()->permission != "Admin"){
                return $next($request); 
            }
            else{
                return redirect('quantri');  
            }  
        }   
        else{
            return $next($request); 
        }
    }
}
