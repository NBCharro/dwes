@extends ('layouts.main')
@section('tituloPagina', 'Artículos')
@section('content-area')
    <main class="text-center" id="articulos">
        <h1>Artículos</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    @foreach ($articulos[0] as $key => $articulo)
                        <th scope="col">@mayus($key)</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($articulos as $articulo)
                    <tr>
                        <td>{{ $articulo['id'] }}</td>
                        <td>{{ $articulo['titulo'] }}</td>
                        <td>{{ $articulo['autor'] }}</td>
                        <td>{{ $articulo['genero'] }}</td>
                        <td>{{ $articulo['año'] }}</td>
                        <td><img src="{{ url("/images/{$articulo['imagen']}") }}" alt="{{ $articulo['titulo'] }}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
