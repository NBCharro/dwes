@extends('layouts.mainLayout')
@section('pageTitle', 'Suma')
@section('pageContent')
    <h1>{{ @mayus($texto) }}</h1>

    <a href="{{ Route('inicio') }}">Inicio</a>

@endsection()
