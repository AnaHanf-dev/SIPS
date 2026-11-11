<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\LogadoWebMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\LogadoAdminMiddleware;

Route::get('/', function () {
    return view('index');
})->name('inicio');

Route::get('/entrar', function () {
    return view('entrar');
})->name('entrar');


Route::get('/logint', [LoginController::class, 'mostrarlogin'])->name('log');

Route::get('/home', [HomeController::class, 'mostrarHome_teste'])->middleware(LogadoWebMiddleware::class)->name('home');

Route::get('/painel', [AdminController::class, 'mostrarAdmin'])->middleware(LogadoAdminMiddleware::class)->name('painel');