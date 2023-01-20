@extends ('layouts.main-layout')
@section('page-title', 'Discos')
@section('content-area')
    <h1>Catálogo de Discos</h1>
    <table class="table table-striped" id="tablaDiscos">
        <thead class='bg-secondary text-white'>
            <tr>
                <th>IMAGEN</th>
                <th>TITULO</th>
                <th>AUTOR</th>
                <th>GENERO</th>
                <th>AÑO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($discos as $disco)
                <tr>
                    <td><img src="{{ $disco->caratula }}" alt="N/D" width="100px" height="100px" /></td>
                    <td class='text-table align-middle'>{{ $disco->titulo }}</td>
                    <td class='text-table align-middle'>{{ $disco->autor }}</td>
                    <td class='text-table align-middle'>{{ $disco->genero }}</td>
                    <td class='text-table align-middle'>{{ $disco->temporada }}</td>
                    <td class='text-table align-middle'>
                        <a href="{{ route('discos.show', ['disco' => $disco]) }}">
                            <span class="material-icons text-primary">search</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
