@extends ('layouts.main-layout')
@section('page-title', 'Articulos')
@section('content-area')
    <h1>Catálogo de Artículos</h1>
    <table class="table table-striped">
        <thead class='bg-secondary text-white'>
            <tr>
                <th>#</th>
                <th>Artículo</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td>{{ $articulo->id }}</td>
                    <td>{{ $articulo->nombre }}</td>
                    <td class="text-nowrap">@priceformat($articulo->precio)</td>
                    {{-- <td><img src="{{ $articulo->imagen }}" alt="{{ $articulo->nombre }}" class="imagenTabla"></td> --}}
                    <td>{{ $articulo->descripcion }}</td>
                    <td>
                        <a href="{{ route('articulos.show', ['articulo' => $articulo]) }}">
                            <span class="material-icons">search</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
