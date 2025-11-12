<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TablaController extends Controller
{
    public $url_api = 'http://localhost:5800/';

    //metodo para eliminar una licencia por id
    public function eliminarLicencia($id){
        //indico la api con el id de la licencia a eliminar
        $response = Http::delete($this->url_api."delete/$id");
        $resultado = $response->json();
        if (isset($resultado['status']) && $resultado['status'] == 200){
                //si la respuesta es exitosa, retorna la vista con el mensaje exitoso.
                return view('alert');
            }else{
                //caso contrario que me muestre el error en la vista.
                return view('error',[ 'response' => $resultado]);
            }
    }

    public function todasLicencias(){
        //hago un llamado al servidor para traer todos los valores y mostrarlo en la vista.
        $response = Http::get($this->url_api);
        $datos = $response->json();//parseo los datos que vienen en json
        $registros = $datos['licencias'];//accedo al arreglo de registro
        return view('tabla',['registro' => $registros]);
    }

    public function actualizarLicencia($id){
        $response = Http::get($this->url_api);
        $resultado = $response->json();
        $licencias = $resultado['licencias'];

        $licencia_encontrada = null;
        //buscamos por id la licencia que queremos actualizar y obtener sus valores.
        foreach ($licencias as $usuario) {
            if ($usuario['id'] === (int) $id) {
                $licencia_encontrada = $usuario;
                break;//detenemos el proceso.
            }
        }
        return view('editor',['licencia' => $licencia_encontrada]);
    }
}