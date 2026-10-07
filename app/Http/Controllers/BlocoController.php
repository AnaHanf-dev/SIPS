<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bloco;

class BlocoController extends Controller
{
    // public function cadastro_html(Request $request)
    // {
    //     return view('cadastro_bloco');
    // }

    public function salvar_bloco(Request $request)
    {
        $request->validate([
            'nome_bloco' => 'required|string|max:255',
            'id_area' => 'required|integer|exists:area_escola,id',
            'descricao' => 'nullable|string',
        ]);

        try {

            $bloco = new bloco();

            $bloco->nome_bloco = $request->nome_bloco;
            $bloco->id_area = $request->id_area;
            $bloco->descricao = $request->descricao;

            $bloco->save();

            return response()->json([
                'mensagem' => 'Bloco cadastrado com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao cadastrar bloco',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }

    public function ver_bloco(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $bloco = bloco::find($request->id);

        if ($bloco) {

            return response()->json([
                'bloco' => $bloco,
                'error' => 'n'
            ], 200);

        } else {

            return response()->json([
                'mensagem' => 'Bloco não encontrado',
                'error' => 's'
            ], 200);
        }
    }

    public function listar_bloco(Request $request)
    {
        $bloco = bloco::all();

        return response()->json([
            'bloco' => $bloco
        ], 200);
    }

    public function listar_bloco_simples(Request $request)
    {
        $bloco = bloco::select(
            'id',
            'nome_bloco',
            'id_area'
        )->get();

        return response()->json([
            'bloco' => $bloco
        ], 200);
    }

    public function alterar_bloco(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:bloco,id',
            'nome_bloco' => 'required|string|max:255',
            'id_area' => 'required|integer|exists:area_escola,id',
            'descricao' => 'nullable|string',
        ]);

        try {

            $bloco = bloco::find($request->id);

            $bloco->nome_bloco = $request->nome_bloco;
            $bloco->id_area = $request->id_area;
            $bloco->descricao = $request->descricao;

            $bloco->save();

            return response()->json([
                'mensagem' => 'Bloco alterado com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao alterar bloco',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }

    public function deletar_bloco(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:bloco,id',
        ]);

        try {

            $bloco = bloco::find($request->id);

            $bloco->delete();

            return response()->json([
                'mensagem' => 'Bloco deletado com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao deletar bloco',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }
}