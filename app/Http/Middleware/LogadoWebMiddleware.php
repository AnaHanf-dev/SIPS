<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\FunciToken;
use App\Models\funcionarios;
use Illuminate\Support\Facades\Cookie;

class LogadoWebMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Cookie::has('token') && Cookie::has('funcionario_id')){
        return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
