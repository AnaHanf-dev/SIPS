<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\funcionarios;
use Illuminate\Support\Facades\Hash;


class FuncionarioController extends Controller
{
    // public function cadastro_html(Request $request){
    //     return view('cadastro_funcionario');
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
            $funcionario = new funcionarios();
            $funcionario->nome_funcionario = $request->nome_funcionario;
            $funcionario->email = $request->email;
            $funcionario->senha = Hash::make($request->senha);
            $funcionario->cargo = $request->cargo;
            $funcionario->NIF = $request->NIF;
            $funcionario->save();

            return response()->json(['mensagem' => 'Funcionário cadastrado com sucesso!','error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['mensagem' => 'Erro ao cadastrar funcionário', 'error' => 's', 'msg_erro' => $th->getMessage()], 200);
        }

    }

    public function ver_funcionario(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);
        $funcionario = funcionarios::find($request->id);
        if($funcionario){
            return response()->json(['funcionario' => $funcionario, 'error' => 'n'], 200);
        }else{
            return response()->json(['mensagem' => 'Funcionário não encontrado', 'error' => 's'], 200);
        }
    }

    public function listar_funcionarios(Request $request){
        $funcionarios = funcionarios::all();
        return response()->json(['funcionarios' => $funcionarios], 200);
    }

    public function listar_funci_simples(Request $request){
        $funcionarios = funcionarios::select('nome_funcionario', 'email', 'NIF')->get();
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
            $funcionario = funcionarios::find($request->id);

            if($funcionario->NIF != $request->NIF){
                $funci_nif_igual = funcionarios::where('NIF', $request->NIF)->first();
                if($funci_nif_igual){
                    return response()->json(['mensagem' => 'NIF já cadastrado para outro funcionário', 'error' => 's'], 200);
                }
            }

            if($funcionario->email != $request->email){
                $funci_email_igual = funcionarios::where('email', $request->email)->first();
                if($funci_email_igual){
                    return response()->json(['mensagem' => 'Email já cadastrado para outro funcionário', 'error' => 's'], 200);
                }
            }

            $funcionario->nome_funcionario = $request->nome_funcionario;
            $funcionario->email = $request->email;
            $funcionario->senha = Hash::make($request->senha);
            $funcionario->cargo = $request->cargo;
            $funcionario->NIF = $request->NIF;
            $funcionario->save();

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
            $funcionario = funcionarios::find($request->id);
            $funcionario->delete();

            return response()->json(['mensagem' => 'Funcionário deletado com sucesso!','error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['mensagem' => 'Erro ao deletar funcionário', 'error' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

}
        
