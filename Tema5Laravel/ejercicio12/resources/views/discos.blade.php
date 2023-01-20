@extends('layouts.main-layout')
@section('content-area')
    <div class="container-fluid py-4">
        <div class="row text-center">
            <h1>Discos</h1>
        </div>
        <div class="row py-4">
            <table class='table table-striped'>
                <thead class='bg-secondary text-white'>
                    <tr>
                        <th scope='col'>DISCO</th>
                        <th scope='col'>TITULO</th>
                        <th scope='col'>AUTOR</th>
                        <th scope='col'>GENERO</th>
                        <th scope='col'>AÑO</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($discos as $disco)
                        <?php
                        $id = $disco['id'];
                        $ruta = url('/images') . "/{$id}.png";
                        ?>
                        <tr>
                            <td><img src="{{ $ruta }}" alt="N/D" width="80px" height="80px" /></td>
                            <td class='text-table align-middle'>{{ $disco['titulo'] }}</td>
                            <td class='text-table align-middle'>{{ $disco['autor'] }}</td>
                            <td class='text-table align-middle'>{{ $disco['genero'] }}</td>
                            <td class='text-table align-middle'>{{ $disco['anio'] }}</td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
