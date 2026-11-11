<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\LogadoWebMiddleware;

Route::get('/', function () {
    return view('index');
})->name('inicio');

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/logint', [LoginController::class, 'mostrarlogin'])->name('log');

Route::get('/home', [HomeController::class, 'mostrarHome'])->middleware(LogadoWebMiddleware::class)->name('home');

