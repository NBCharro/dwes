<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function inicio()
    {
        return view('main-page');
    }
    public function querySQL(){
        // $articulos = Articulo::all()->orderBy('precio','desc')->->limit(5)->get();
        $articulos = Articulo::where('nombre','like','a%')->orderBy('nombre','asc')->get();
        $articulos = Articulo::where('nombre','like','a%s.')->orderBy('nombre','asc')->get();
        $articulos = Articulo::where('nombre', 'like', 'a%')->orWhere('nombre', 'like', 'a%')->orderBy('precio', 'desc')->get();
        $articulos = Articulo::where('nombre', 'like', 's%')->where('precio', '>', '100')->where('precio', '<', '200')->get();
        $articulos = Articulo::where('stock', '<', '100')->count()->get();
        $articulos = Articulo::where('precio', '>', '500')->avg('stock')->get();
        $articuloMin = Articulo::min('precio');
        $articuloMax = Articulo::max('precio');
        $articulos = Articulo::where('precio', $articuloMin)->orWhere('precio', $articuloMax)->get();
        dump($articuloMin);
        dump($articuloMin);
        dump($articuloMax);
        dump($articulos);
    }
}
