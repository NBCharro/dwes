@extends ('layouts.mainLayout')
@section('pageTitle', 'Admin')
@section('pageContent')
    @include('components.adminHeader')
    @include('components.navbar')
    <h1>Administrador: {{ $texto }}</h1>
    <br />
    <a href="{{ route('inicio') }}">
        <h2>Ir a inicio</h2>
    </a>
@endsection
