<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablaController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\VistaController;

// ruta de todas las vistas
Route::get('/', [VistaController::class,'appVista']);
Route::get('/editar',[VistaController::class,'editarVista']);
Route::get('/registro',[VistaController::class,'formVista']);
Route::get('/tabla',[TablaController::class,'todasLicencias']);
Route::get('/jtable',[VistaController::class,'vistaJtabla']);

// ruta de todos los metodos en la tabla
Route::get('/buscar/{id}',[TablaController::class,'buscarLicencia'])->name('buscar');
Route::get('/delete/{id}',[TablaController::class,'eliminarLicencia'])->name('eliminar');

// ruta para enviar valores al servidor
Route::post('/update',[FormController::class,'actualizarLicencia'])->name('actualizar');
Route::post('/cargar',[FormController::class,'cargarLicencia'])->name('guardar');
