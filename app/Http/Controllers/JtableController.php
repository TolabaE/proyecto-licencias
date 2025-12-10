<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class JtableController extends Controller
{
    public $urlApi = 'http://localhost:5800/';
    
    // creo un nuevo metodo para usarlo en jtable,me trae a todas las licencias.
    public function traerRegistroJtable(){
        $response = Http::get($this->urlApi);
        $datos = $response->json();//parseo los datos que vienen en json
        $licencias = $datos['licencias'];
        return response()->json(['status'=>200,'result'=>$licencias]);
    }

    //metodo para actualizar un usuario por id.
    
}
