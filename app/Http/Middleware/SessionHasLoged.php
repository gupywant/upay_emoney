<?php

namespace App\Http\Middleware;

use Closure;

class SessionHasLoged
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
        if($request->session()->exists('loged')) {
            return $next($request);
        }else{
            if(session('alert')){
                return redirect(route('login'))->with('alert','Username atau Password salah!!!');
            }else{
                return redirect(route('login'))->with('alert','Login Terlebih Dahulu');
            }
        }
    }
}
