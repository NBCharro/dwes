@extends ('layouts.main-layout')
@section('page-title', 'Articulos')
@section('content-area')
    <h1>Catálogo de Artículos</h1>
    <table class="table table-striped">
        <thead class='bg-secondary text-white'>
            <tr>
                <th>#</th>
                <th>Artículo</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Envío</th>
                <th>Stock</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td>{{ $articulo->id }}</td>
                    <td>{{ $articulo->nombre }}</td>
                    <td>{{ $articulo->descripcion }}</td>
                    <td class="text-nowrap">@priceformat($articulo->precio)</td>
                    <td>{{ $articulo->envio }}</td>
                    <td>{{ $articulo->stock }}</td>
                    <td>{{ $articulo->observaciones }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
