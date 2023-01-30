<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::all();
        return view('articulos.listar')->with(['articulos' => $articulos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacion
        $reglas = [
            'nombre' => 'required|max:50|unique:articulos,nombre',
            'descripcion' => 'required',
            'precio' => 'required|gte:0',
            'stock' => 'required|gte:0',
            'envio' => 'required|in:N,S',
        ];
        // Si no valida vuelve al formulario automaticamente
        $request->validate($reglas);
        // Cuando se valida se guarda en la BD

        // Metodo largo, por si tenemos que hacer algun cambio como trim()
        // $articulo = new Articulo();
        // $articulo->nombre = $request->form_nombre;
        // $articulo->descripcion = $request->form_descripcion;
        // $articulo->precio = $request->form_precio;
        // $articulo->envio = $request->form_envio;
        // $articulo->stock = $request->form_stock;
        // $articulo->observaciones = $request->form_observaciones;
        // $articulo->save();

        // Metodo corto. Los campos en el formulario deberian ser iguales que en la tabla
        // Articulo::create($request->all());

        // Metodo intermedio. Es una mezcla, usando el create pero sin usar el objeto. Es mas usado.
        Articulo::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'envio' => $request->envio,
            'stock' => $request->stock,
            'observaciones' => $request->observaciones,
        ]);

        // Una vez guardado en la BD vamos a otra vista
        // return view('articulos.guardado')->with(['articulo' => $request->form_nombre]);
        return view('articulos.guardado')->with(['articulo' => $request->nombre]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        return view('articulos.mostrar-articulo')->with(['articulo' => $articulo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        // $articulos = Articulo::all()->orderBy('precio','desc')->limit(5)->get();
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
        dump($articuloMax);
        dump($articulos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        //
    }
}
