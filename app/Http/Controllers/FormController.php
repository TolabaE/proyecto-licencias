<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class FormController extends Controller
{
    
    //guardo la url.
    public $apiUrl = "http://localhost:5800/";

    //metodo para guardar una licencia en la base de datos
    public function cargarLicencia(Request $request){
        try {
            // $datos_registro = $request->all(); //trae todos los valores incluyendo el token.
            
            $datos_registro = $request->except('_token');//me trae todos los datos, menos el token.
            
            //envio los datos al sevidor
            $response = Http::post($this->apiUrl."insert", $datos_registro);
            $resultado = $response->json();
            //verifico las respuesta del servidor
            if (isset($resultado['status']) && $resultado['status'] == 200){
                return response()->json(['status'=>200,'msg'=>"success"]);
            }else{
                return response()->json(['status'=>400,'msg'=>"error"]);
            }

        } catch (\Throwable $th) {
            return back()->withErrors(['conexion' => 'No se pudo conectar con el servidor externo.']);
        }
    }

    //metodo que recibe los valores y actualiza una licencia
    public function actualizarLicencia(Request $request){
        try {
            $licenciaActualizada = $request->except('_token');//obtengo los valores del formulario.
            //envio los datos al servidor.
            $response = Http::post($this->apiUrl.'update/', $licenciaActualizada);
            $resultado = $response->json();
            if (isset($resultado['status']) && $resultado['status'] == 200){
                return response()->json(['status'=>200,'msg'=>"success"]);
            }else{
                return response()->json(['status'=>400,'msg'=>"error"]);
            }
        } catch (\Throwable $th) {
            return back()->withErrors(['conexion' => 'No se pudo conectar con el servidor externo.']);
        }
    }
}
