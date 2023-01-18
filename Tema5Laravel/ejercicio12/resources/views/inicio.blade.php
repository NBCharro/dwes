@extends('layouts.main-layout')
@section('content-area')
    <div class="container-fluid py-4">
        <div class="row text-center">
            <h1>Bienvenido a {{ $nombre }}</h1>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <img height="300" src="{{ url('/images/discos.png') }}">
            </div>
        </div>
    </div>
@endsection
