@extends('main')

@section('title')
  404 - No encontrado
@stop

@section('header')
  @include('partials.header')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <center>
          <div class="col-lg-8">
            <div class="card text-white bg-danger">
              <div class="card-body">
                <h4 class="card-title">
                  No encontrado
                </h4>
                <span class="fa-stack fa-4x">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-times fa-stack-1x" style="color:#E74C3C"></i>
                </span>
                <br><br>
                El recurso fue movido, editado o borrado de este sitio.
                <br><br>
                <p class="card-text">
                  <a class="btn btn-primary" href="{{ route('inicio') }}" title="Ir al inicio">
                    <i class="fa fa-home"></i> Ir al inicio
                  </a>
                </p>
              </div>
            </div>
          </div>
        </center>
      </div>
    </div>
  </div>
@endsection

@section('footer')
  @include('partials.footer')
@endsection
