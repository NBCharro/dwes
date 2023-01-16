<?php

use App\Http\Controllers\HolaControlador;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HolaControlador::class, "inicio"])->name('inicio');
Route::get('/empresa', [HolaControlador::class, "empresa"])->name('empresa');
Route::get('/articulos', [HolaControlador::class, "articulos"])->name('articulos');
Route::get('/contacto', [HolaControlador::class, "contacto"])->name('contacto');
