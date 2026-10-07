<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\area_escola;

class AreaEscolaController extends Controller
{
    // public function cadastro_html(Request $request)
    // {
    //     return view('cadastro_area');
    // }

    public function salvar_area(Request $request)
    {
        $request->validate([
            'nome_area' => 'required|string|max:255',
            'localizacao' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        try {
            $area = new area_escola();

            $area->nome_area = $request->nome_area;
            $area->localizacao = $request->localizacao;
            $area->descricao = $request->descricao;

            $area->save();

            return response()->json([
                'mensagem' => 'Área cadastrada com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao cadastrar área',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }

    public function ver_area(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $area = area_escola::find($request->id);

        if ($area) {

            return response()->json([
                'area' => $area,
                'error' => 'n'
            ], 200);

        } else {

            return response()->json([
                'mensagem' => 'Área não encontrada',
                'error' => 's'
            ], 200);
        }
    }

    public function listar_areas(Request $request)
    {
        $areas = area_escola::all();

        return response()->json([
            'areas' => $areas
        ], 200);
    }

    public function alterar_area(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:area_escola,id',
            'nome_area' => 'required|string|max:255',
            'localizacao' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        try {

            $area = area_escola::find($request->id);

            $area->nome_area = $request->nome_area;
            $area->localizacao = $request->localizacao;
            $area->descricao = $request->descricao;

            $area->save();

            return response()->json([
                'mensagem' => 'Área alterada com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao alterar área',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }

    public function deletar_area(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:area_escola,id',
        ]);

        try {

            $area = area_escola::find($request->id);

            $area->delete();

            return response()->json([
                'mensagem' => 'Área deletada com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao deletar área',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }
}