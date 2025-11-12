<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class FormController extends Controller
{
    public function vistaForm (){
        return view('formulario');
    }

    //metodo para guardar una licencia en la base de datos
    public function cargarLicencia(Request $request){
        $url_api = "http://localhost:5800/insert";
        $datos_registro = $request->all(); //trae los valores que posee el formulario
        
        try {
            //envio los datos al sevidor
            $response = Http::post($url_api, $datos_registro);
            $resultado = $response->json();
            if (isset($resultado['status']) && $resultado['status'] == 200){
                return view('exitos');
            }else{
                return view('error',[ 'response' => $resultado]);
            }

        } catch (\Throwable $th) {
            return back()->withErrors(['conexion' => 'No se pudo conectar con el servidor externo.']);
        }
    }
}
