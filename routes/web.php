<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablaController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\JtableController;
use App\Http\Controllers\VistaController;

// ruta de todas las vistas
Route::get('/', [VistaController::class,'appVista']);
Route::get('/editar',[VistaController::class,'editarVista']);
Route::get('/registro',[VistaController::class,'formVista']);
Route::get('/tabla',[TablaController::class,'todasLicencias']);
Route::get('/jtable',[VistaController::class,'vistaJtabla']);

//aqui estan todas las rutas para usar en la vista jtable
Route::get('/listar',[JtableController::class,'traerRegistroJtable'])->name('list');
Route::post('/actualizar',[JtableController::class,'actualizarRegistroJtable'])->name('update');
Route::post('/eliminar',[JtableController::class,'eliminarRegistroJtable'])->name('destroy');
Route::post('/guardar',[JtableController::class,'guardarRegistroJtable'])->name('create');

// Ruta de prueba TEMPORAL
Route::post('/prueba-ajax', function (Illuminate\Http\Request $request) {
    // Si esto funciona, el problema está en la ruta original o middleware
    \Illuminate\Support\Facades\Log::info('Ruta de prueba alcanzada con éxito.', $request->all());
    return response()->json(['Result' => 'OK']);
});

// ruta de todos los metodos en la tabla
Route::get('/buscar/{id}',[TablaController::class,'buscarLicencia'])->name('buscar');
Route::get('/delete/{id}',[TablaController::class,'eliminarLicencia'])->name('eliminar');

// ruta para enviar valores al servidor
Route::post('/update',[FormController::class,'actualizarLicencia'])->name('actualizar');
Route::post('/cargar',[FormController::class,'cargarLicencia'])->name('guardar');
