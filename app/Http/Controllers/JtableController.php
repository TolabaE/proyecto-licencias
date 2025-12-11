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
        return response()->json(['Result'=>"OK",'Records'=>$licencias,'TotalRecordCount'=>count($licencias)]);
    }

    //metodo para actualizar un registro
    public function actualizarRegistroJtable(Request $request){
        $datos_registro = $request->except('_token');//me trae todos los datos, menos el token.
        //realizo el envio de los valores al servidor
        $response = Http::post($this->urlApi."update", $datos_registro);
        $resultado = $response->json();//parseo el resultado
        log::info($datos_registro);
        //verifico las respuesta del servidor
        if (isset($resultado['status']) && $resultado['status'] == 200){
            return response()->json(['Result'=>"OK",'Record'=>$datos_registro]);
        }else{
            return response()->json(['Result'=>"ERROR",'Record'=>$resultado['errores']]);
        }
    }

    //metodo para eliminar un usuario por id.
    public function eliminarRegistroJtable(Request $request){
        $id = $request->input('id');
        //paso el id al servidor para que elimine la licencia
        $response = Http::delete($this->urlApi."delete/$id");
        $resultado = $response->json();
        //verifico las respuesta del servidor
        if (isset($resultado['status']) && $resultado['status'] == 200){
            return response()->json(['Result'=>"OK",'Record'=>"success"]);
        }else{
            return response()->json(['Result'=>"ERROR",'Record'=>"error"]);
        }
    }

    //metodo para crear una nueva licencia
    public function guardarRegistroJtable(Request $request){
        $nuevo_registro = $request->all(); //trae todos los valores incluyendo el token.
        //realizo el envio de los datos al servidor
        $response = Http::post($this->urlApi."insert", $nuevo_registro);
        $resultado = $response->json();
        Log::info($nuevo_registro);
        //verifico las respuesta del servidor
        if (isset($resultado['status']) && $resultado['status'] == 200){
            //aca tengo un gran problema, jquery necesita que el servidor me devuelva la nueva licencia con el id asignado, para agregarlo sin refrescar la pagina.
            //voy a forzar refrescar la pagina para que se carge con su id 
            return response()->json(['Result'=>"OK",'Record'=>"success"]);
        }else{
            return response()->json(['Result'=>"ERROR",'Record'=>"Campos incompletos"]);
        }
    }
}
