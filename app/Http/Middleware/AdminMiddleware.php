<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$userType): Response
    {
        if(Auth::user()->usertype_id != $userType)
        {
            return redirect('home')->with('error', 'You are not authorized to access this page');
        }else{
            return $next($request);
        }
        
    }
}
