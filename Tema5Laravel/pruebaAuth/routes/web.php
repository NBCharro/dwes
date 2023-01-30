<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// No necesita autorizacion
// Route::get('/catalogo', function () {
//     return view('catalogo');
// });

// No necesita autorizacion para paginas unicas
// Route::get('/catalogo', function () {
//     return view('catalogo');
// })->middleware('auth')->name("catalogo");


Route::get('/catalogo', [HomeController::class, 'catalogo'])->name('catalogo');
