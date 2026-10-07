<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\salas;

class SalaController extends Controller
{
    // public function cadastro_html(Request $request)
    // {
    //     return view('cadastro_sala');
    // }

    public function salvar_sala(Request $request)
    {
        $request->validate([
            'nome_sala' => 'required|string|max:255',
            'id_bloco' => 'required|integer|exists:bloco,id',
            'descricao' => 'nullable|string',
        ]);

        try {

            $sala = new salas();

            $sala->nome_sala = $request->nome_sala;
            $sala->id_bloco = $request->id_bloco;
            $sala->descricao = $request->descricao;

            $sala->save();

            return response()->json([
                'mensagem' => 'Sala cadastrada com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao cadastrar sala',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }

    public function ver_sala(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $sala = salas::find($request->id);

        if ($sala) {

            return response()->json([
                'sala' => $sala,
                'error' => 'n'
            ], 200);

        } else {

            return response()->json([
                'mensagem' => 'Sala não encontrada',
                'error' => 's'
            ], 200);
        }
    }

    public function listar_salas(Request $request)
    {
        $salas = salas::all();

        return response()->json([
            'salas' => $salas
        ], 200);
    }

    public function listar_salas_simples(Request $request)
    {
        $salas = salas::select(
            'id',
            'nome_sala',
            'id_bloco'
        )->get();

        return response()->json([
            'salas' => $salas
        ], 200);
    }

    public function alterar_sala(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:salas,id',
            'nome_sala' => 'required|string|max:255',
            'id_bloco' => 'required|integer|exists:bloco,id',
            'descricao' => 'nullable|string',
        ]);

        try {

            $sala = salas::find($request->id);

            $sala->nome_sala = $request->nome_sala;
            $sala->id_bloco = $request->id_bloco;
            $sala->descricao = $request->descricao;

            $sala->save();

            return response()->json([
                'mensagem' => 'Sala alterada com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao alterar sala',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }

    public function deletar_sala(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:salas,id',
        ]);

        try {

            $sala = salas::find($request->id);

            $sala->delete();

            return response()->json([
                'mensagem' => 'Sala deletada com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao deletar sala',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }
}