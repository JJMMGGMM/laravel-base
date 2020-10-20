@section('footer')
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="list-unstyled">
            <li class="float-lg-right"><a id="top" href="#top">Ir arriba</a></li>
            @if (Auth::check() == true)
              <li class="nav-item">
                <b>{{ Auth::user()->alias }}</b>
              </li>
            @else
              <li>
                <a href="{{ url('ingresar') }}">Ingresar</a>
              </li>
            @endif
            <li><a href="{{ route('inicio') }}">Inicio</a></li>
            <li><a href="{{ route('ayuda') }}">Ayuda</a></li>
          </ul>
          <p><a href="#">Bitbank</a> &copy; {{ date('Y') }}. Derechos pendientes.</p>
          <p>Tema diseñado por <a href="https://bootswatch.com/">Bootswatch</a>.</p>
        </div>
      </div>
    </div>
  </footer>
@endsection
