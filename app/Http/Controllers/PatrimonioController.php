<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patrimonio;

class PatrimonioController extends Controller
{
    // public function cadastro_html(Request $request)
    // {
    //     return view('cadastro_patrimonio');
    // }

    public function salvar_patrimonio(Request $request)
    {
        $request->validate([
            'nome_patrimonio' => 'required|string|max:150',
            'n_patrimonio' => 'required|string|max:20|unique:patrimonio,n_patrimonio',
            'id_salas' => 'required|integer|exists:salas,id',
            'id_responsa' => 'required|integer|exists:funcionarios,id',
            'descricao' => 'nullable|string',
        ]);

        try {

            $patrimonio = new patrimonio();

            $patrimonio->nome_patrimonio = $request->nome_patrimonio;
            $patrimonio->n_patrimonio = $request->n_patrimonio;
            $patrimonio->id_salas = $request->id_salas;
            $patrimonio->id_responsa = $request->id_responsa;
            $patrimonio->descricao = $request->descricao;

            $patrimonio->save();

            return response()->json([
                'mensagem' => 'Patrimônio cadastrado com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao cadastrar patrimônio',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }

    public function ver_patrimonio(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $patrimonio = patrimonio::find($request->id);

        if ($patrimonio) {

            return response()->json([
                'patrimonio' => $patrimonio,
                'error' => 'n'
            ], 200);

        } else {

            return response()->json([
                'mensagem' => 'Patrimônio não encontrado',
                'error' => 's'
            ], 200);
        }
    }

    public function listar_patrimonios(Request $request)
    {
        $patrimonios = patrimonio::all();

        return response()->json([
            'patrimonios' => $patrimonios
        ], 200);
    }

    public function listar_patri_simples(Request $request)
    {
        $patrimonios = patrimonio::select(
            'id',
            'nome_patrimonio',
            'n_patrimonio',
            'id_salas',
            'id_responsa'
        )->get();

        return response()->json([
            'patrimonios' => $patrimonios
        ], 200);
    }

    public function buscar_por_codigo(Request $request)
    {
        $request->validate([
            'n_patrimonio' => 'required|string',
        ]);

        $patrimonio = patrimonio::where(
            'n_patrimonio',
            $request->n_patrimonio
        )->first();

        if ($patrimonio) {

            return response()->json([
                'patrimonio' => $patrimonio,
                'error' => 'n'
            ], 200);

        } else {

            return response()->json([
                'mensagem' => 'Patrimônio não encontrado',
                'error' => 's'
            ], 200);
        }
    }

    public function alterar_patrimonio(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:patrimonio,id',
            'nome_patrimonio' => 'required|string|max:150',
            'n_patrimonio' => 'required|string|max:20',
            'id_salas' => 'required|integer|exists:salas,id',
            'id_responsa' => 'required|integer|exists:funcionarios,id',
            'descricao' => 'nullable|string',
        ]);

        try {

            $patrimonio = patrimonio::find($request->id);

            if ($patrimonio->n_patrimonio != $request->n_patrimonio) {

                $codigo_igual = patrimonio::where(
                    'n_patrimonio',
                    $request->n_patrimonio
                )->first();

                if ($codigo_igual) {

                    return response()->json([
                        'mensagem' => 'Número de patrimônio já cadastrado',
                        'error' => 's'
                    ], 200);
                }
            }

            $patrimonio->nome_patrimonio = $request->nome_patrimonio;
            $patrimonio->n_patrimonio = $request->n_patrimonio;
            $patrimonio->id_salas = $request->id_salas;
            $patrimonio->id_responsa = $request->id_responsa;
            $patrimonio->descricao = $request->descricao;

            $patrimonio->save();

            return response()->json([
                'mensagem' => 'Patrimônio alterado com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao alterar patrimônio',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }

    public function deletar_patrimonio(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:patrimonio,id',
        ]);

        try {

            $patrimonio = patrimonio::find($request->id);

            $patrimonio->delete();

            return response()->json([
                'mensagem' => 'Patrimônio deletado com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao deletar patrimônio',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }
}