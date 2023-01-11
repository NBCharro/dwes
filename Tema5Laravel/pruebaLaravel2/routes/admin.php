<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminControlador;

/*
* Rutas del administrador
*/

Route::prefix('admin')->group(function () {
    Route::get('articulos', [AdminControlador::class, 'articulos'])
        ->name('articulos');
    Route::get('clientes', [AdminControlador::class, 'clientes'])
        ->name('clientes');
    Route::get('facturas', [AdminControlador::class, 'facturas'])
        ->name('facturas');
    Route::get('/', [AdminControlador::class, 'admin'])
        ->name('admin');
});
