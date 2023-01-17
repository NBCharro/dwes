<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container-fluid">
        <div id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('inicio') ? 'active' : '' }}" href="{{ route('inicio') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('empresa') ? 'active' : '' }}"
                        href="{{ route('empresa') }}">Empresa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('articulos') ? 'active' : '' }}"
                        href="{{ route('articulos') }}">Artículos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('contacto') ? 'active' : '' }}"
                        href="{{ route('contacto') }}">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
