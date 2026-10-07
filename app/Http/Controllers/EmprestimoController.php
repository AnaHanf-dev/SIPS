<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\emprestimo;

class EmprestimoController extends Controller
{
    // public function cadastro_html(Request $request)
    // {
    //     return view('cadastro_emprestimo');
    // }

    public function salvar_emprestimo(Request $request)
    {
        $request->validate([
            'id_patrimonio' => 'required|integer|exists:patrimonio,id',
            'id_funcionario' => 'required|integer|exists:funcionarios,id',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'nullable|date|after_or_equal:data_emprestimo',
        ]);

        try {

            $emprestimo = new emprestimo();

            $emprestimo->id_patrimonio = $request->id_patrimonio;
            $emprestimo->id_funcionario = $request->id_funcionario;
            $emprestimo->data_emprestimo = $request->data_emprestimo;
            $emprestimo->data_devolucao = $request->data_devolucao;

            $emprestimo->save();

            return response()->json([
                'mensagem' => 'Empréstimo cadastrado com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao cadastrar empréstimo',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }

    public function ver_emprestimo(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $emprestimo = emprestimo::find($request->id);

        if ($emprestimo) {

            return response()->json([
                'emprestimo' => $emprestimo,
                'error' => 'n'
            ], 200);

        } else {

            return response()->json([
                'mensagem' => 'Empréstimo não encontrado',
                'error' => 's'
            ], 200);
        }
    }

    public function listar_emprestimos(Request $request)
    {
        $emprestimos = emprestimo::all();

        return response()->json([
            'emprestimo' => $emprestimos
        ], 200);
    }

    public function listar_emprestimos_simples(Request $request)
    {
        $emprestimos = emprestimo::select(
            'id',
            'id_patrimonio',
            'id_funcionario',
            'data_emprestimo',
            'data_devolucao'
        )->get();

        return response()->json([
            'emprestimos' => $emprestimos
        ], 200);
    }

    public function alterar_emprestimo(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:emprestimo,id',
            'id_patrimonio' => 'required|integer|exists:patrimonio,id',
            'id_funcionario' => 'required|integer|exists:funcionarios,id',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'nullable|date|after_or_equal:data_emprestimo',
        ]);

        try {

            $emprestimo = emprestimo::find($request->id);

            $emprestimo->id_patrimonio = $request->id_patrimonio;
            $emprestimo->id_funcionario = $request->id_funcionario;
            $emprestimo->data_emprestimo = $request->data_emprestimo;
            $emprestimo->data_devolucao = $request->data_devolucao;

            $emprestimo->save();

            return response()->json([
                'mensagem' => 'Empréstimo alterado com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao alterar empréstimo',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }

    public function deletar_emprestimo(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:emprestimo,id',
        ]);

        try {

            $emprestimo = emprestimo::find($request->id);

            $emprestimo->delete();

            return response()->json([
                'mensagem' => 'Empréstimo deletado com sucesso!',
                'error' => 'n'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'mensagem' => 'Erro ao deletar empréstimo',
                'error' => 's',
                'msg_erro' => $th->getMessage()
            ], 200);
        }
    }
}