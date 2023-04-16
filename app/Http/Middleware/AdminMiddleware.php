<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->email == 'admin@gmail.com'){
            return $next($request);
    }else{
        return response()->json(['errors' => 'You are not Admin'], 401);
    } 
    }
}
