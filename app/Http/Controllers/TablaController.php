<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TablaController extends Controller
{
    public $urlApi = 'http://localhost:5800/';

    public function todasLicencias($statusExtra = []){
        //hago un llamado al servidor para traer todos los valores y mostrarlo en la vista.
        $response = Http::get($this->urlApi);
        $datos = $response->json();//parseo los datos que vienen en json
        $registros = $datos['licencias'];//accedo al arreglo de registro
        return view('tabla',[
            'registro' => $registros,
            'status' => $statusExtra['status'] ?? 'tabla' //le paso el estado tabla o sino el valor que reciba por parametro
        ]);
    }

    //metodo para eliminar una licencia por id
    public function eliminarLicencia($id){
        //indico la api con el id de la licencia a eliminar
        $response = Http::delete($this->urlApi."delete/$id");
        $resultado = $response->json();
        if (isset($resultado['status']) && $resultado['status'] == 200){
                //si la respuesta es exitosa, retorna el metodo todasLicencias y le paso el status de la licencia elimina.
                return $this->todasLicencias(['status'=>"eliminar"]);
            }else{
                //caso contrario que me muestre el error en la vista tabla
                return $this->todasLicencias(['status'=>"error"]);
            }
    }

    //metodo para buscar una licencia por id y mostrar sus valores en el formulario.
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

    // creo un nuevo metodo para usarlo en jtable.
    public function traerRegistroJtable(){
        $response = Http::get($this->urlApi);
        $datos = $response->json();//parseo los datos que vienen en json
        $licencias = $datos['licencias'];
        return response()->json(['status'=>200,'result'=>$licencias]);
    }
}
