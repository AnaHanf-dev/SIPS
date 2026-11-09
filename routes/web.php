<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('index');
})->name('inicio');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/logint', [LoginController::class, 'mostrarlogin'])->name('log');


