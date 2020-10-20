@extends('main')

@section('title')
  Ayuda
@stop

@section('header')
  @include('partials.header')
@endsection

@section('content')
  @include('partials.alerts')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 id="containers">Ayuda</h2>
        </div>
      </div>
      <div class="col-lg-12">
        <p>
          Esta es la página de ayuda. Solo es cuestión de agregar funcionalidades
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
