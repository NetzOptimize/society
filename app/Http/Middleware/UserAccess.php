<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$usertype): Response
    {
        
        if(Auth::user()->usertype_id != $usertype)
        {
            if(Auth::user()->usertype_id == User::RESIDENT)
            {
                return redirect()->route('user.home')->with('error','You are not allowed to access this page');
            }elseif(Auth::user()->usertype_id == User::ADMIN)
            {
                return $next($request);
            }
            return redirect()->route('home')->with('error','You are not allowed to access this page');
        }else{
            return $next($request);
        }
    }
}
