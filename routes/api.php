<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\AreaEscolaController;
use App\Http\Controllers\BlocoController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\PatrimonioController;
use App\Http\Controllers\EmprestimoController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// FUNCIONARIO CONTROLLER ROUTES

Route::post('/salvar_funcionario', [FuncionarioController::class, 'salvar_funcionario'])->name('salvar_funcionario');

Route::get('/ver_funcionario', [FuncionarioController::class, 'ver_funcionario'])->name('ver_funcionario');

Route::get('/listar_funcionarios', [FuncionarioController::class, 'listar_funcionarios'])->name('listar_funcionarios');

Route::get('/listar_funci_simples', [FuncionarioController::class, 'listar_funci_simples'])->name('listar_funci_simples');

Route::put('/alterar_funcionario', [FuncionarioController::class, 'alterar_funcionario'])->name('alterar_funcionario');

Route::delete('/deletar_funcionario', [FuncionarioController::class, 'deletar_funcionario'])->name('deletar_funcionario');


// AREA ESCOLA CONTROLLER ROUTES

Route::post('/salvar_area', [AreaEscolaController::class, 'salvar_area'])->name('salvar_area');

Route::get('/ver_area', [AreaEscolaController::class, 'ver_area'])->name('ver_area');

Route::get('/listar_areas', [AreaEscolaController::class, 'listar_areas'])->name('listar_areas');

Route::put('/alterar_area', [AreaEscolaController::class, 'alterar_area'])->name('alterar_area');

Route::delete('/deletar_area', [AreaEscolaController::class, 'deletar_area'])->name('deletar_area');


// BLOCO CONTROLLER ROUTES

Route::post('/salvar_bloco', [BlocoController::class, 'salvar_bloco'])->name('salvar_bloco');

Route::get('/ver_bloco', [BlocoController::class, 'ver_bloco'])->name('ver_bloco');

Route::get('/listar_blocos', [BlocoController::class, 'listar_blocos'])->name('listar_blocos');

Route::get('/listar_blocos_simples', [BlocoController::class, 'listar_blocos_simples'])->name('listar_blocos_simples');

Route::put('/alterar_bloco', [BlocoController::class, 'alterar_bloco'])->name('alterar_bloco');

Route::delete('/deletar_bloco', [BlocoController::class, 'deletar_bloco'])->name('deletar_bloco');


// SALA CONTROLLER ROUTES

Route::post('/salvar_sala', [SalaController::class, 'salvar_sala'])->name('salvar_sala');

Route::get('/ver_sala', [SalaController::class, 'ver_sala'])->name('ver_sala');

Route::get('/listar_salas', [SalaController::class, 'listar_salas'])->name('listar_salas');

Route::get('/listar_salas_simples', [SalaController::class, 'listar_salas_simples'])->name('listar_salas_simples');

Route::put('/alterar_sala', [SalaController::class, 'alterar_sala'])->name('alterar_sala');

Route::delete('/deletar_sala', [SalaController::class, 'deletar_sala'])->name('deletar_sala');


// PATRIMONIO CONTROLLER ROUTES

Route::post('/salvar_patrimonio', [PatrimonioController::class, 'salvar_patrimonio'])->name('salvar_patrimonio');

Route::get('/ver_patrimonio', [PatrimonioController::class, 'ver_patrimonio'])->name('ver_patrimonio');

Route::get('/listar_patrimonios', [PatrimonioController::class, 'listar_patrimonios'])->name('listar_patrimonios');

Route::get('/listar_patri_simples', [PatrimonioController::class, 'listar_patri_simples'])->name('listar_patri_simples');

Route::get('/buscar_por_codigo', [PatrimonioController::class, 'buscar_por_codigo'])->name('buscar_por_codigo');

Route::put('/alterar_patrimonio', [PatrimonioController::class, 'alterar_patrimonio'])->name('alterar_patrimonio');

Route::delete('/deletar_patrimonio', [PatrimonioController::class, 'deletar_patrimonio'])->name('deletar_patrimonio');


// EMPRESTIMO CONTROLLER ROUTES

Route::post('/salvar_emprestimo', [EmprestimoController::class, 'salvar_emprestimo'])->name('salvar_emprestimo');

Route::get('/ver_emprestimo', [EmprestimoController::class, 'ver_emprestimo'])->name('ver_emprestimo');

Route::get('/listar_emprestimos', [EmprestimoController::class, 'listar_emprestimos'])->name('listar_emprestimos');

Route::get('/listar_emprestimos_simples', [EmprestimoController::class, 'listar_emprestimos_simples'])->name('listar_emprestimos_simples');

Route::put('/alterar_emprestimo', [EmprestimoController::class, 'alterar_emprestimo'])->name('alterar_emprestimo');

Route::delete('/deletar_emprestimo', [EmprestimoController::class, 'deletar_emprestimo'])->name('deletar_emprestimo');