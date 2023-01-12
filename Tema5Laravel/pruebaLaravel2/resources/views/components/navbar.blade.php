<ol class="navbar">
    @foreach ($paginasBidimensional as $key => $pagina)
        <li><a href="{{ route($key) }}">{{ $pagina }}</a></li>
    @endforeach
</ol>
