<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\FunciToken;
use Illuminate\Support\Facades\Hash;
use Ap\Models\funcionarios;
use Carbon\Carbon;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has('token') && $request->has('id_funcionario')) {
            $token = FunciToken::where('id_funcionario', $request->id_funcionario)
            ->where('token', $request->token)
            ->where('valido_ate', '>', Carbon::now())
            ->first();
            if($token) {
                return $next($request);
            }
            return response()->json(['message' => 'Token inválido ou expirado', 'erro' => 's'], 200); // Return termina a função, é como se ele tivesse um ELSE nessa parte
        }else{
            return response()->json(['message' => 'Token não fornecido', 'erro' => 's'], 200);
        }
    }
}
