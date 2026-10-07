<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\funcionarios;
use Illuminate\Support\Facades\Hash;


class FuncionarioController extends Controller
{
    public function cadastro_html(Request $request){
        return view('cadastro_funcionario');
    }

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

            return json_response()->json(['mensagem' => 'Funcionário cadastrado com sucesso!','error' => 'n'], 200);
        } catch (\Throwable $th) {
            return json_response()->json(['mensagem' => 'Erro ao cadastrar funcionário', 'error' => 's', 'msg_erro' => $th->getMessage()], 200);
        }

    }
}
