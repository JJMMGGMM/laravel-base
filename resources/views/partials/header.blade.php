@section('header')
  <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
    <div class="container">
      <a href="{{ route('index') }}" class="navbar-brand"><img src="{{ asset('img/logo.svg') }}" style="width:25px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('inicio') }}">
              <i class="fa fa-home"></i>
              Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ayuda') }}">
              <i class="fa fa-question"></i>
              Ayuda
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="opt_menu">
              <i class="fa fa-chess-pawn"></i>
              Opciones
              <span class="caret"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="opt_menu">
              <a class="dropdown-item" href="#">
                <i class="fa fa-chess-knight"></i>
                Ejemplo 1
              </a>
              <a class="dropdown-item" href="#">
                <i class="fa fa-chess-rook"></i>
                Ejemplo 2
              </a>
              <!-- sep -->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <i class="fa fa-chess-bishop"></i>
                Ejemplo 3
              </a>
              <a class="dropdown-item" href="#">
                <i class="fa fa-chess-queen"></i>
                Ejemplo 4
              </a>
              <!-- sep -->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <i class="fa fa-chess-king"></i>
                Ejemplo 5
              </a>
            </div>
          </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-male"></i>
              Opción
            </a>
          </li>
          <li class="nav-item dropdown">
            @if (Auth::check() == true)
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="profile_menu">
                <i class="fa fa-cog"></i> Administrar <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profile_menu">
                <a class="dropdown-item" href="{{ route('perfil.index') }}">Perfil</a>
                <a class="dropdown-item" href="{{ route('salir') }}">Salir</a>
              </div>
            @else
              <li class="nav-item">
                <a class="nav-link" href="{{ url('ingresar') }}">Ingresar</a>
              </li>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection
