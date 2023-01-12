@extends ('layouts.mainLayout')

{{-- @if ($texto == 'Articulos')
    @section('pageTitle', 'Articulos')
    @elseif($texto == 'Clientes')
    @section('pageTitle', 'Clientes')
    @elseif($texto == 'Facturas')
    @section('pageTitle', 'Facturas')
    @else
    @section('pageTitle', 'Administrador')
    @endif --}}

@switch($texto)
    @case('Articulos')
        @section('pageTitle', 'Articulos')
    @break

    @case('Clientes')
        @section('pageTitle', 'Clientes')
    @break

    @case('Facturas')
        @section('pageTitle', 'Facturas')
    @break

    @default
        @section('pageTitle', 'Administrador')
    @endswitch

    @section('pageContent')
        @include('components.adminHeader')
        @include('components.navbarAdmin')
        <h1>Administrador: {{ $texto }}</h1>
        <br />
        <a href="{{ route('inicio') }}">
            <h2>Ir a inicio</h2>
        </a>
        <br>
        <br>
    @endsection
