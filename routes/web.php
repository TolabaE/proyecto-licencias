<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablaController;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('app');
});

Route::get('/exitos', function () {
    return view('exitos');
});

Route::get('/registro',[FormController::class,'vistaForm']);


Route::get('/tabla',[TablaController::class,'todasLicencias']);
Route::put('/update/{id}',[TablaController::class,'actualizarLicencia'])->name('actualizar');
Route::delete('/delete/{id}',[TablaController::class,'eliminarLicencia'])->name('eliminar');

Route::post('/cargar',[FormController::class,'cargarLicencia']);