@extends('layouts.main-layout')
@section('page-title', 'Disco guardado')
@section('content-area')
    <h1>Disco guardado</h1>
    <hr />
    <div class='container-fluid'>
        <h2>El disco {{ $disco }} del {{ $autor }} se ha guardado correctamente</h2>
        <br />
        <h2>
            <a href="{{ route('discos.index') }}">Volver al catalogo de discos</a>
        </h2>
    </div>
@endsection
