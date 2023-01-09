<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaControlador extends Controller
{
    public function raiz()
    {
        return view('inicio')->with(['texto' => 'Pagina inicial']);
    }

    public function inventario()
    {
        return view('inicio')->with(['texto' => 'Inventario']);
    }
}
