<?php

use App\Http\Controllers\Admin\AdminControlador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolaControlador;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HolaControlador::class, 'raiz'])->name("inicio");

Route::match(['get', 'post'], '/saludo/{nombre?}/{apellido?}', [HolaControlador::class, 'saludo'])->name("saludo");

// Route::get('/suma/{numero1?}/{numero2?}/{numero3?}', [HolaControlador::class, 'suma'])->name("suma");
// Route::match(['get', 'post'], '/suma/{numero1?}/{numero2?}/{numero3?}', [HolaControlador::class, 'suma'])->name("suma");
Route::match(['get', 'post'], '/suma/{numero1?}/{numero2?}/{numero3?}', [HolaControlador::class, 'sumaClases'])->name("suma");
