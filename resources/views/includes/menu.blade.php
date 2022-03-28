<!-- Right Side Of Navbar -->
<ul class="navbar-nav ms-auto">
    <!-- Authentication Links -->

    @if (!Auth::check())

        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
        </li>
    @else

    @if (Auth::user()->hasRole('user'))

        <li class="nav-item">
            <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('agenda') }}">Agenda</a>
        </li>
    @else
    
        <li class="nav-item">
            <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('agenda') }}">Agenda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('administrar') }}">Administrar</a>
        </li>

    @endif

    <li class="nav-item dropdown">

        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Mi cuenta
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                Cerrar sesión
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    @endif
</ul>
