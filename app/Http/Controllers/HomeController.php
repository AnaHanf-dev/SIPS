<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function mostrarHome_teste(Request $request){
        $funcionario = $request->funcionario;
        $admin = $request->admin;
        return view('home_teste')->with('funcionario', $funcionario)->with('admin', $admin);
    }

    public function mostrarHome(Request $request){
        $funcionario = $request->funcionario;
        $admin = $request->admin;
        return view('home')->with('funcionario', $funcionario)->with('admin', $admin);
    }
}
