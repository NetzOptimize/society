<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserType
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->usertype_id == 1) {
            return $next($request);
        }

        abort(403, 'Access Denied');
    }
}

