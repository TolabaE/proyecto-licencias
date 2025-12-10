<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    //metodo para actualizar un registro
    public function actualizarRegistroJtable(Request $request){
        try {
            $datos_registro = $request->all(); //trae todos los valores incluyendo el token.
            //accedo a esos valores del formulario
            $dataInicio = $request->input('fechaInicio');
            $dataFin = $request->input('fechaFin');

            //aqui lo que hago es cambiar el formato en que me llega los valores de la fecha.
            $fechaInicio = substr($dataInicio,0,10);
            $fechaFin = substr($dataFin,0,10);
            //aqui actualizo esos nuevo valores al formdata y enviarlo al servidor
            $datos_registro['fechaInicio'] = $fechaInicio;
            $datos_registro['fechaFin'] = $fechaFin;

            $response = Http::post($this->urlApi."update", $datos_registro);

            $resultado = $response->json();
            //verifico las respuesta del servidor
            if (isset($resultado['status']) && $resultado['status'] == 200){
                return response()->json(['Result'=>"OK",'Record'=>"success"]);
            }else{
                return response()->json(['Result'=>"ERROR",'Record'=>"error"]);
            }

        } catch (\Throwable $th) {
            return back()->withErrors(['conexion' => 'No se pudo conectar con el servidor externo.']);
        }
    }
    //metodo para eliminar un usuario por id.
    public function eliminarRegistroJtable(Request $request){
        $id = $request->input('id');
        //paso el id al servidor para que elimine la licencia
        $response = Http::delete($this->urlApi."delete/$id");
        $resultado = $response->json();
        Log::info($resultado);
        //verifico las respuesta del servidor
        if (isset($resultado['status']) && $resultado['status'] == 200){
            return response()->json(['Result'=>"OK",'Record'=>"success"]);
        }else{
            return response()->json(['Result'=>"ERROR",'Record'=>"error"]);
        }
    }

    //metodo para crear una nueva licencia
    public function guardarRegistroJtable(Request $request){
        try {
            $datos_registro = $request->all(); //trae todos los valores incluyendo el token.
            //realizo el envio de los datos al servidor
            $response = Http::post($this->urlApi."insert", $datos_registro);

            $resultado = $response->json();
            //verifico las respuesta del servidor
            if (isset($resultado['status']) && $resultado['status'] == 200){
                return response()->json(['Result'=>"OK",'Record'=>"success"]);
            }else{
                return response()->json(['Result'=>"ERROR",'Record'=>"error"]);
            }

        } catch (\Throwable $th) {
            return back()->withErrors(['conexion' => 'No se pudo conectar con el servidor externo.']);
        }
    }
}
