<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TablaController extends Controller
{
    public $urlApi = 'http://localhost:5800/';

    //metodo para eliminar una licencia por id
    public function eliminarLicencia($id){
        //indico la api con el id de la licencia a eliminar
        $response = Http::delete($this->urlApi."delete/$id");
        $resultado = $response->json();
        $status = "eliminar";
        if (isset($resultado['status']) && $resultado['status'] == 200){
                //si la respuesta es exitosa, retorna la vista con el mensaje exitoso.
                return view('alert',compact('status'));
            }else{
                //caso contrario que me muestre el error en la vista.
                return view('error',[ 'response' => $resultado]);
            }
    }

    public function todasLicencias(){
        //hago un llamado al servidor para traer todos los valores y mostrarlo en la vista.
        $response = Http::get($this->urlApi);
        $datos = $response->json();//parseo los datos que vienen en json
        $registros = $datos['licencias'];//accedo al arreglo de registro
        return view('tabla',['registro' => $registros]);
    }

    public function buscarLicencia($id){
        //llamamos a la api para traer todas las licencias.
        $response = Http::get($this->urlApi);
        $resultado = $response->json();
        $licencias = $resultado['licencias'];

        $licencia_encontrada = null;
        //buscamos por id la licenciar y obtener sus valores.
        foreach ($licencias as $usuario) {
            if ($usuario['id'] === (int) $id) {
                $licencia_encontrada = $usuario;
                break;//detenemos el proceso.
            }
        }
        return view('editor',['licencia' => $licencia_encontrada]);
    }
}
