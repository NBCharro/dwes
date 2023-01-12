{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>

<body>
    {{ $titulo }}
    {{-- {!!  !!} Sirve para que lea las etiquetas HTML como etiquetas y no como texto. NO recomendado.
    {!! $titulo !!}
</body>

</html> --}}

@extends('layouts.mainLayout')
@section('pageTitle', 'Bienvenidos')
@section('pageContent')
    {!! $titulo !!}
    <br>
    <button type="button" class="btn btn-primary">Primary</button>
    <button type="button" class="btn btn-secondary">Secondary</button>
    <br>
    <a href="{{ route('saludo') }}">Saludo</a>
    <br><br>
    <a href="{{ route('suma') }}">Suma</a>
@endsection
