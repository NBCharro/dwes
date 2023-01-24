@extends('layouts.main-layout')
@section('content-area')
    <div class="container-fluid py-4">
        <div class="row text-center">
            <h1>ERROR</h1>
        </div>
        <div class="row text-center">
            <h3>{{ $error }}</h3>
        </div>
    </div>
@endsection
