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

    public function salvar_funcionario(Request $request){
        $request->validate([
            'nome_funcionario' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:funcionarios',
            'senha' => 'required|string',
            'cargo' => 'required|string|max:255',
            'NIF' => 'required|string|unique:funcionarios',
        ]);

        try {
            $funcionarios = new funcionarios();
            $funcionarios->nome_funcionario = $request->nome_funcionario;
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

    public function ver_funcionario(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);
        $funcionarios = funcionarios::find($request->id);
        if($funcionarios){
            return response()->json(['funcionarios' => $funcionarios, 'error' => 'n'], 200);
        }else{
            return response()->json(['mensagem' => 'Funcionário não encontrado', 'error' => 's'], 200);
        }
    }

    public function listar_funcionarios(Request $request){
        $funcionarios = funcionarios::all();
        return response()->json(['funcionarios' => $funcionarios], 200);
    }

    public function listar_funci_simples(Request $request){
        $funcionarios = funcionarios::select('nome_funcionario', 'email', 'NIF', 'senha')->get();
        return response()->json(['funcionarios' => $funcionarios], 200);
    }

    public function alterar_funcionario(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:funcionarios,id',
            'nome_funcionario' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'senha' => 'required|string',
            'cargo' => 'required|string|max:255',
            'NIF' => 'required|string',
        ]);

        try {
            $funcionarios = funcionarios::find($request->id);

            if($funcionarios->NIF != $request->NIF){
                $funci_nif_igual = funcionarios::where('NIF', $request->NIF)->first();
                if($funci_nif_igual){
                    return response()->json(['mensagem' => 'NIF já cadastrado para outro funcionário', 'error' => 's'], 200);
                }
            }

            if($funcionarios->email != $request->email){
                $funci_email_igual = funcionarios::where('email', $request->email)->first();
                if($funci_email_igual){
                    return response()->json(['mensagem' => 'Email já cadastrado para outro funcionário', 'error' => 's'], 200);
                }
            }

            $funcionarios->nome_funcionario = $request->nome_funcionario;
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

    public function deletar_funcionario(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:funcionarios,id',
        ]);

        try {
            $funcionarios = funcionarios::find($request->id);
            $funcionarios->delete();

            return response()->json(['mensagem' => 'Funcionário deletado com sucesso!','error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['mensagem' => 'Erro ao deletar funcionário', 'error' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'senha' => 'required',
        ]);


        $funcionario = funcionarios::where('email','=', $request->email)->first();
        if($funcionario){
            if(Hash::check($request->senha, $funcionario->senha)){
                $user_token = new FunciToken();
                $user_token->id_funcionario = $funcionario->id;
                $user_token->token = Hash::make($funcionario->id . $funcionario->email . now());
                $user_token->valido_ate = now()->addDays(7);
                $user_token->save();

                return response()->json(['message' => 'Login realizado com sucesso' , 'erro' => 'n', 'token' => $user_token->token,"funcionario_id" => $funcionario->id],200 );

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
        
