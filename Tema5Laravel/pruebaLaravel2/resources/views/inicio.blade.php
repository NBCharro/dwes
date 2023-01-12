{{-- {{ $titulo }}
         {!!  !!} Sirve para que lea las etiquetas HTML como etiquetas y no como texto. NO recomendado.
    {!! $titulo !!} --}}

@extends('layouts.mainLayout')
@section('pageTitle', 'Bienvenidos')
@section('pageContent')
    {{-- La estructura mas utilizada es FOREACH --}}
    <ul>
        @foreach ($paginas as $pagina)
            @if ($loop->first || $loop->last)
                <li><strong>{{ $pagina }}</strong></li>
            @else
                <li>{{ $pagina }}</li>
            @endif
        @endforeach
    </ul>
    {{-- FORELSE: funciona como FOREACH pero si el array esta vacio hace @empty --}}
    <ul>
        @forelse ($pedidos as $pedido)
            <li>{{ $pedido }}</li>
        @empty
            <li>No hay pedidos</li>
        @endforelse
    </ul>
    {{-- Los array bidimensionales funcionan igual que con PHP --}}
    <table width='60%' border='1'>
        <thead style='background:lavender;'>
            <tr>
                <th colspan='3'>PEDIDOS</th>
            </tr>
            <tr>
                <th>NUM</th>
                <th>PRODUCTO</th>
                <th>PRECIO</th>
            </tr>
        </thead>
        <tbody style='text-align:center;'>
            @foreach ($pedidosBidimensional as $pedido)
                <tr>
                    <td>{{ $pedido['num'] }}</td>
                    <td>{{ $pedido['producto'] }}</td>
                    <td>{{ $pedido['precio'] }} €</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- EJERCICIO 10 --}}
    @include('components.navbar')

    <br>
    {!! $titulo !!}
    <br>
    <button type="button" class="btn btn-primary">Primary</button>
    <button type="button" class="btn btn-secondary">Secondary</button>
    <br>
    <a href="{{ route('saludo') }}">Saludo</a>
    <br><br>
    <a href="{{ route('suma') }}">Suma</a>
    <br><br>
    <h2>Números del 1 al 10</h2>
    <ul>
        @for ($i = 1; $i <= 10; $i++)
            <li>{{ $i }}</li>
        @endfor
    </ul>
    <br>
    <?php $i = 2; ?>
    @php
        $i = 2;
    @endphp
    <ul>
        @while ($i <= 10)
            <li>{{ $i }}</li>
            <?php $i += 2; ?>
        @endwhile
    </ul>
@endsection
