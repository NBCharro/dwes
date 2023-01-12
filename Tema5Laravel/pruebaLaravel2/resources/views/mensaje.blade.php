@extends('layouts.mainLayout')
@section('pageTitle', 'Saludo')
@section('pageContent')
    <h1>{{ $texto }}</h1>
    <ul>
        <li>
            <a href="{{ Route('inicio') }}">Incio</a>
        </li>
        <li>
            <a href="{{ Route('suma') }}">Suma</a>
        </li>
    </ul>
@endsection()
