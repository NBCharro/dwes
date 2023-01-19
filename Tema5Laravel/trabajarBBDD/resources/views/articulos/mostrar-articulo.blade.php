@extends('layouts.main-layout')
@section('page-title', $articulo->nombre)
@section('content-area')
    <h1>Detalle de artículo: {{ $articulo->nombre }}</h1>
    <hr />
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">ID: </strong>
        </div>
        <div class="col-sm-10">
            {{ $articulo->id }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">NOMBRE: </strong>
        </div>
        <div class="col-sm-10">
            {{ $articulo->nombre }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">DESCRIPCIÓN: </strong>
        </div>
        <div class="col-sm-10">
            {{ $articulo->descripcion }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">PRECIO: </strong>
        </div>
        <div class="col-sm-10">
            @priceformat($articulo->precio)
        </div>
    </div>
    <!-- Resto de campos -->
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">ENVIO: </strong>
        </div>
        <div class="col-sm-10">
            {{ $articulo->envio }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">STOCK: </strong>
        </div>
        <div class="col-sm-10">
            {{ $articulo->stock }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">OBSERVACIONES: </strong>
        </div>
        <div class="col-sm-10">
            {{ $articulo->observaciones }}
        </div>
    </div>
    <hr />
    <h2><a href="{{ route('articulos.index') }}">Volver al catálogo</a></h2>
@endsection
