<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function mostrarHome(Request $request){
        $funcionario = $request->funcionario;
        return view('home')->with('funcionario', $funcionario);
    }
}
