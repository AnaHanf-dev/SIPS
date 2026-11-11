<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function mostrarAdmin (Request $request){
        return view('Painel');
    }
}
