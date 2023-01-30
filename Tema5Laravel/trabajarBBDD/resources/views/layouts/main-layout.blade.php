<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js">
    </script>
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('inicio') }}">
                Inicio
            </a>
            <a class="navbar-brand" href="{{ route('articulos.index') }}">
                Mostrar Artículos
            </a>
            <a class="navbar-brand" href="{{ route('articulos.create') }}">
                Nuevo
            </a>
            <a class="navbar-brand" href="{{ route('querySQL') }}">
                Querys
            </a>
        </nav>
        @yield('content-area')
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#miTabla').DataTable();
    });
</script>
</html>
