<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaControlador extends Controller
{
    public function inicio()
    {
        return view("inicio");
    }
    public function empresa()
    {
        return view("empresa");
    }
    public function articulos()
    {
        $articulos = [
            ["id" => 1, "titulo" => "Back in Black", "autor" => "AC/DC", "genero" => "Heavy Metal", "año" => 1980, "imagen" => "backInBlack.jpg"],
            ["id" => 2, "titulo" => "Thriller", "autor" => "Michael Jackson", "genero" => "Pop", "año" => 1982, "imagen" => "thriller.jpg"],
            ["id" => 3, "titulo" => "Dangerous", "autor" => "Michael Jackson", "genero" => "Pop", "año" => 1991, "imagen" => "dangeous.jpg"],
            ["id" => 4, "titulo" => "The Dark Side", "autor" => "Pink Floyd", "genero" => "Rock", "año" => 1972, "imagen" => "theDarkSide.jpg"],
        ];
        return view("articulos")->with(["articulos" => $articulos]);
    }
    public function contacto()
    {
        return view("contacto");
    }
}
