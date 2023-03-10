<header class="container-fluid main-header p-4">
    <h1 class="display-4 text-white">{{ $nombre }}</h1>
    <nav class="pt-1">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{ route('inicio') }}"
                    class="nav-link menu-item {{ Route::is('inicio') ? 'active' : '' }}">Inicio</a></li>
            <li class="nav-item"><a href="{{ route('empresa') }}"
                    class="nav-link menu-item {{ Route::is('empresa') ? 'active' : '' }}">Empresa</a></li>
            <li class="nav-item"><a href="{{ route('discos.index') }}"
                    class="nav-link menu-item
                        {{ Route::is('discos.index') || Route::is('discos.show') ? 'active' : '' }}
                    ">Discos</a>
            </li>
            <li class="nav-item"><a href="{{ route('contacto') }}"
                class="nav-link menu-item {{ Route::is('contacto') ? 'active' : '' }}">Contacto</a>
            </li>
            <li class="nav-item"><a href="{{ route('discos.create') }}"
                    class="nav-link menu-item
                        {{ Route::is('discos.create') ? 'active' : '' }}
                    ">Agregar</a>
            </li>

        </ul>
    </nav>
</header>
