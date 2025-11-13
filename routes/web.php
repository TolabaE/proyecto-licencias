<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablaController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\VistaController;

Route::get('/', [VistaController::class,'appVista']);
Route::get('exitos',[VistaController::class,'exitoVista']);
Route::get('editar',[VistaController::class,'editarVista']);

Route::get('/registro',[FormController::class,'vistaForm']);
Route::get('/tabla',[TablaController::class,'todasLicencias']);

Route::put('/buscar/{id}',[TablaController::class,'buscarLicencia'])->name('actualizar');
Route::delete('/delete/{id}',[TablaController::class,'eliminarLicencia'])->name('eliminar');

Route::post('/cargar',[FormController::class,'cargarLicencia']);
Route::post('/update',[FormController::class,'actualizarLicencia'])->name('update');
