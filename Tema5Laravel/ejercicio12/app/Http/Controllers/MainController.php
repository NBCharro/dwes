<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function inicio()
    {
        return view("inicio")->with(["nombre" => "TopDiscos"]);
    }

    public function empresa()
    {
        return view("empresa")->with(["nombre" => "TopDiscos"]);
    }

    public function discos()
    {
        $discos = [
            ['id' => 104, 'titulo' => 'Back in Black', 'autor' => 'AC/CD', 'genero' => 'Heavy Metal', 'anio' => '1980'],
            ['id' => 106, 'titulo' => 'Sgt. Peppers Lonely Hearts Club Band', 'autor' => 'Beatles', 'genero' => 'Rock', 'anio' => '1967'],
            ['id' => 107, 'titulo' => 'Revolver', 'autor' => 'Beatles', 'genero' => 'Rock', 'anio' => '1966'],
            ['id' => 101, 'titulo' => 'Thriller', 'autor' => 'Michael Jackson', 'genero' => 'Pop', 'anio' => '1982'],
            ['id' => 102, 'titulo' => 'History', 'autor' => 'Michael Jackson', 'genero' => 'Pop', 'anio' => '1995'],
            ['id' => 103, 'titulo' => 'Dangerous', 'autor' => 'Michael Jackson', 'genero' => 'Pop', 'anio' => '1991'],
            ['id' => 105, 'titulo' => 'The Dark Side of the Moon', 'autor' => 'Pink Floyd', 'genero' => 'Rock', 'anio' => '1972'],
        ];
        return view("discos")->with([
            "nombre" => "TopDiscos",
            "discos" => $discos
        ]);
    }

    public function contacto()
    {
        return view("contacto")->with(["nombre" => "TopDiscos"]);
    }
}
