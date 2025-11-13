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
            $datos_registro = $request->all(); //trae los valores que posee el formulario
            //envio los datos al sevidor
            $response = Http::post($this->apiUrl."insert", $datos_registro);
            $resultado = $response->json();
            $status = "crear";// es un variable para manejar los estados de alerta en el frontend
            if (isset($resultado['status']) && $resultado['status'] == 200){
                return view('alert',compact('status'));
            }else{
                return view('error',[ 'response' => $resultado]);
            }

        } catch (\Throwable $th) {
            return back()->withErrors(['conexion' => 'No se pudo conectar con el servidor externo.']);
        }
    }

    public function actualizarLicencia(Request $request){
        try {
            $licenciaActualizada = $request->all();//obtengo los valores del formulario.
            $response = Http::post($this->apiUrl.'update/', $licenciaActualizada);
            $resultado = $response->json();
            $status = "actualizar";
            if (isset($resultado['status']) && $resultado['status'] == 200){
                return view('alert',compact('status'));
            }else{
                return view('error',[ 'response' => $resultado]);
            }
        } catch (\Throwable $th) {
            return back()->withErrors(['conexion' => 'No se pudo conectar con el servidor externo.']);
        }
    }
}
