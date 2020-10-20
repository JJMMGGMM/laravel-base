@extends('main')

@section('title')
  Inicio
@stop

@section('extra_css_styles')
  <!-- extra css -->
@endsection

@section('header')
  @include('partials.header')
@endsection

@section('content')
  @include('partials.alerts')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h1 id="containers">Inicio</h1>
        </div>
        <div class="jumbotron">
          <h1 class="display">¡Saludos!</h1>
          <p class="lead">
            Estructura para inicializar cualquier tipo de proyecto básico-mediano,
            hecha con laravel 5.2 y bootstrap 4. Sin ajax y con jquery solamente
            para mejorar un poco la presentación visual.
          </p>
        </div>
      </div>
      <div class="col-lg-12">
        <p>
          Esta es la página de inicio. Solo es cuestión de agregar funcionalidades
          y cambiar un poco la apariencia o reemplazarla toda, para comenzar
          desde un pequeño blog personal hasta una aplicación de control de información.
        </p>
      </div>
    </div>
  </div>
@endsection

@section('footer')
  @include('partials.footer')
@endsection

@section('extra_js_libraries')
  <!-- extra js -->
@endsection
