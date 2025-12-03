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

// ruta de todos los metodos en la tabla
Route::get('/buscar/{id}',[TablaController::class,'buscarLicencia'])->name('actualizar');
Route::get('/delete/{id}',[TablaController::class,'eliminarLicencia'])->name('eliminar');
Route::post('/update',[TablaController::class,'actualizarLicencia'])->name('update');

// ruta para enviar valores al servidor
Route::post('/cargar',[FormController::class,'cargarLicencia']);
