<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistaController extends Controller
{
    //retorna la vista principal de la app
    public function appVista(){
        return view('app');
    }

    //retorna la vista para editar una licencia
    public function editarVista(){
        return view('editor');
    }

    public function formVista (){
        return view('formulario',['status'=>"200"]);
    }
}

