<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\funcionarios;
use App\Models\FunciToken;
use Illuminate\Support\Facades\Hash;


class FuncionarioController extends Controller
{

    // public function cadastro_html(Request $request){
    //     return view('cadastro_funcionarios');
    // }

    public function salvar_funcionarios(Request $request){
        $request->validate([
            'nome_funcionarios' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:funcionarioss',
            'senha' => 'required|string',
            'cargo' => 'required|string|max:255',
            'NIF' => 'required|string|unique:funcionarioss',
        ]);

        try {
            $funcionarios = new funcionarioss();
            $funcionarios->nome_funcionarios = $request->nome_funcionarios;
            $funcionarios->email = $request->email;
            $funcionarios->senha = Hash::make($request->senha);
            $funcionarios->cargo = $request->cargo;
            $funcionarios->NIF = $request->NIF;
            $funcionarios->save();

            return response()->json(['mensagem' => 'Funcionário cadastrado com sucesso!','error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['mensagem' => 'Erro ao cadastrar funcionário', 'error' => 's', 'msg_erro' => $th->getMessage()], 200);
        }

    }

    public function ver_funcionarios(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);
        $funcionarios = funcionarioss::find($request->id);
        if($funcionarios){
            return response()->json(['funcionarios' => $funcionarios, 'error' => 'n'], 200);
        }else{
            return response()->json(['mensagem' => 'Funcionário não encontrado', 'error' => 's'], 200);
        }
    }

    public function listar_funcionarioss(Request $request){
        $funcionarioss = funcionarioss::all();
        return response()->json(['funcionarioss' => $funcionarioss], 200);
    }

    public function listar_funci_simples(Request $request){
        $funcionarioss = funcionarioss::select('nome_funcionarios', 'email', 'NIF', 'senha')->get();
        return response()->json(['funcionarioss' => $funcionarioss], 200);
    }

    public function alterar_funcionarios(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:funcionarioss,id',
            'nome_funcionarios' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'senha' => 'required|string',
            'cargo' => 'required|string|max:255',
            'NIF' => 'required|string',
        ]);

        try {
            $funcionarios = funcionarioss::find($request->id);

            if($funcionarios->NIF != $request->NIF){
                $funci_nif_igual = funcionarioss::where('NIF', $request->NIF)->first();
                if($funci_nif_igual){
                    return response()->json(['mensagem' => 'NIF já cadastrado para outro funcionário', 'error' => 's'], 200);
                }
            }

            if($funcionarios->email != $request->email){
                $funci_email_igual = funcionarioss::where('email', $request->email)->first();
                if($funci_email_igual){
                    return response()->json(['mensagem' => 'Email já cadastrado para outro funcionário', 'error' => 's'], 200);
                }
            }

            $funcionarios->nome_funcionarios = $request->nome_funcionarios;
            $funcionarios->email = $request->email;
            $funcionarios->senha = Hash::make($request->senha);
            $funcionarios->cargo = $request->cargo;
            $funcionarios->NIF = $request->NIF;
            $funcionarios->save();

            return response()->json(['mensagem' => 'Funcionário alterado com sucesso!','error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['mensagem' => 'Erro ao alterar funcionário', 'error' => 's', 'msg_erro' => $th->getMessage()], 200);
        }

    }

    public function deletar_funcionarios(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:funcionarioss,id',
        ]);

        try {
            $funcionarios = funcionarioss::find($request->id);
            $funcionarios->delete();

            return response()->json(['mensagem' => 'Funcionário deletado com sucesso!','error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['mensagem' => 'Erro ao deletar funcionário', 'error' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|',
            'senha' => 'required|',
        ]);


        $funcionario = funcionarios::where('email','=', $request->email)->first();
        if($funcionario){
            if(Hash::check($request->senha, $funcionario->senha)){
                $user_token = new FunciToken();
                $user_token->id_funcionario = $funcionario->id;
                $user_token->token = Hash::make($funcionario->id . $funcionario->email . now());
                $user_token->valido_ate = now()->addDays(7);
                $user_token->save();
                return response()->json(['message' => 'Login realizado com sucesso' , 'erro' => 'n', 'token' => $user_token->token],200 );

            }else{
            return response()->json(['message' => 'funcionarios ou senha não encontrado', 'erro' => 's'],200);
        }

        }else{
            return response()->json(['message' => 'Email não encontrado', 'erro' => 's'],200);
        }
    }

    public function logout(Request $request){
        $request->validate([
            'token' => 'required|string',
            'id_funcionario' => 'required|integer',
        ]);

        $token = FunciToken::where('id_funcionario', $request->id_funcionario)
        ->where('token', $request->token)
        ->first();

        if($token){
            $token->delete();
            return response()->json(['message' => 'Logout realizado com sucesso', 'erro' => 'n'], 200);
        }else{
            return response()->json(['message' => 'Token inválido ou não encontrado', 'erro' => 's'], 200);
        }
    }

}
        
