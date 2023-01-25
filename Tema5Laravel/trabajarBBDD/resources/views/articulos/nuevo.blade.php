@extends('layouts.main-layout')
@section('page-title', 'Nuevo Artículo')
@section('content-area')
    <h1>Nuevo Artículo</h1>
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
        <form action="{{ route('articulos.store') }}" method="post">
            @csrf
            <legend>Nuevo Artítulo</legend>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    {{-- <label for="form_nombre">Nombre</label>
                    <input type="text" name="form_nombre" id="form_nombre" class="form-control" /> --}}
                    <label for="nombre">Nombre</label>
                    <input type="text" value="{{ old('nombre') }}" name="nombre" id="nombre"
                        class="form-control" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    {{-- <label for="form_descripcion">Descripcion</label>
                    <textarea name="form_descripcion" id="form_descripcion" class="form-control"></textarea> --}}
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-4">
                    <label for="precio">Precio</label>
                    <input type="number" value="{{ old('nombre') }}" name="precio" id="precio"
                        class="form-control" min="0.01" step="0.01" />
                </div>
                <div class="input-field col-sm-4 text-center">
                    <label>Envío a domicilio</label><br />
                    {{-- <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="form_envio" id="form_envio1" autocomplete="off"
                            value="N" checked />
                        <label class="btn btn-outline-secondary" for="form_envio1">NO</label>
                        <input type="radio" class="btn-check" name="form_envio" id="form_envio2" autocomplete="off"
                            value="S" />
                        <label class="btn btn-outline-secondary" for="form_envio2">SI</label>
                    </div> --}}
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="envio" id="envio1" autocomplete="off"
                            value="N" checked />
                        <label class="btn btn-outline-secondary" for="envio1">NO</label>
                        <input type="radio" class="btn-check" name="envio" id="envio2" autocomplete="off"
                            value="S" {{ old('envio') == 'S' ? 'checked' : '' }} />
                        <label class="btn btn-outline-secondary" for="envio2">SI</label>
                    </div>
                </div>
                <div class="input-field col-sm-4">
                    {{-- <label for="form_stock">Stock</label>
                    <input type="number" name="form_stock" id="form_stock" class="form-control" min="0" /> --}}
                    <label for="stock">Stock</label>
                    <input type="number" value="{{ old('nombre') }}" name="stock" id="stock"
                        class="form-control" min="0" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    {{-- <label for="form_observaciones">Observaciones</label>
                    <textarea name="form_observaciones" id="form_observaciones" class="form-control"></textarea> --}}
                    <label for="observaciones">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" class="form-control">{{ old('descripcion') }}</textarea>
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
