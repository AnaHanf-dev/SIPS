<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\FunciToken;
use App\Models\funcionarios;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

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
            $funcionario_id = Cookie::get('funcionario_id');
            $token = Cookie::get('token');
            $token_usuario = FunciToken::where('funcionario_id', $funcionario_id)
            ->where('token', $token)
            ->where('valido_ate', '>', Carbon::now())
            ->first();
            if($token_usuario){
                $funcionario = funcionarios::find($funcionario_id);
                $request->funcionario = $funcionario;
                return $next($request);

            }else{
                Cookie::forget('token');
                Cookie::forget('funcionario_id');
                return redirect()->route('log');
            }
        }else{
            Cookie::forget('token');
            Cookie::forget('funcionario_id');
            return redirect()->route('log');
        }
    }
}
