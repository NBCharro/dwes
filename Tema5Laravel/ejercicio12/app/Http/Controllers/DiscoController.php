<?php

namespace App\Http\Controllers;

use App\Models\Disco;
use Illuminate\Http\Request;

class DiscoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $discos = Disco::all();
            return view('discos.listar')->with(['discos' => $discos, "nombre" => "TopDiscos"]);
        } catch (\Throwable $e) {
            return view('error')->with(["error" => "No se ha podido acceder a la base de datos, intentelo de nuevo mas tarde", "nombre" => "TopDiscos"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $discos = Disco::all(['genero']);
        $generos = [];
        foreach ($discos as $disco) {
            if (!in_array($disco->genero, $generos)) {
                $generos[] = $disco->genero;
            }
        }
        return view('discos.nuevo')->with(["nombre" => "TopDiscos", 'generos' => $generos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'titulo' => 'required|max:100',
            'autor' => 'required|max:50',
            'genero' => 'required|in:Pop,Rock,Rap,Heavy,Indie,Otros',
            'temporada' => 'required',
            'caratula' => 'required',
            'precio' => 'required|gte:0',

        ];
        $request->validate($reglas);

        Disco::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'genero' => $request->genero,
            'temporada' => $request->temporada,
            'caratula' => $request->caratula,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
        ]);

        return view('discos.guardado')->with(["nombre" => "TopDiscos", 'disco' => $request->titulo, 'autor' => $request->autor]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disco  $disco
     * @return \Illuminate\Http\Response
     */
    public function show(Disco $disco)
    {
        return view('discos.mostrar-disco')->with(['disco' => $disco, "nombre" => "TopDiscos"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disco  $disco
     * @return \Illuminate\Http\Response
     */
    public function edit(Disco $disco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disco  $disco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disco $disco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disco  $disco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disco $disco)
    {
        //
    }
}
