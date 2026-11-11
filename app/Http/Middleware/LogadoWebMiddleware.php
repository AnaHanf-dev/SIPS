<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\FunciToken;
use App\Models\funcionarios;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use App\Models\Admin;

class LogadoWebMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Cookie::has('user_token') && Cookie::has('id_funcionario')){
            $id_funcionario = Cookie::get('id_funcionario');
            $token = Cookie::get('user_token');
            $token_funcionario = FunciToken::where('id_funcionario', $id_funcionario)
            ->where('token', $token)
            ->where('valido_ate', '>', Carbon::now())
            ->first();
            if($token_funcionario){
                $funcionario = funcionarios::find($id_funcionario);
                $request->funcionario = $funcionario;
                $admin = Admin::where('id_funcionario', $id_funcionario)->first();
                if($admin){
                    $request->admin = 'S';
                }else{
                    $request->admin = 'N';
                }
                return $next($request);

            }else{
                Cookie::forget('user_token');
                Cookie::forget('id_funcionario');
                return redirect()->route('log');
            }
        }else{
            Cookie::forget('user_token');
            Cookie::forget('id_funcionario');
            return redirect()->route('log');
        }
    }
}
