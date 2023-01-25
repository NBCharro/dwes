@extends('layouts.main-layout')
@section('page-title', $nombre)
@section('content-area')
    <h1>Nuevo Disco</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><strong>{{ $error }}</strong></li>
                @endforeach
            </ul>
        </div>
    @endif
    <hr />
    <div class="container-fluid">
        <form action="{{ route('discos.store') }}" method="post">
            @csrf
            <legend>Nuevo Disco</legend>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="titulo">Titulo</label>
                    <input type="text" value="{{ old('titulo') }}" name="titulo" id="titulo" class="form-control" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="autor">Autor</label>
                    <input type="text" value="{{ old('autor') }}" name="autor" id="autor" class="form-control" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="genero">Genero</label>
                    <select name="genero" id="genero" class="form-select">
                        @foreach ($generos as $genero)
                            <option {{ old('genero') == $genero ? 'selected' : '' }}>{{ $genero }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="temporada">Temporada</label>
                    <input type="text" value="{{ old('temporada') }}" name="temporada" id="temporada"
                        class="form-control" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="caratula">Caratula</label>
                    <input type="text" value="{{ old('caratula') }}" name="caratula" id="caratula"
                        class="form-control" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="precio">Precio</label>
                    <input type="number" value="{{ old('precio') }}" name="precio" id="precio" class="form-control"
                        min="0.01" step="0.01" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-6 text-lg-end">
                    <input type="submit" class="btn btn-primary" value="Enviar" />
                </div>
                <div class="input-field col-sm-6 text-lg-start">
                    <input type="reset" class="btn btn-danger" value="Borrar" />
                </div>
            </div>
        </form>
    </div>
@endsection
