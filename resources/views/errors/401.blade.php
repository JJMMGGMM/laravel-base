@extends('main')

@section('title')
  401 - No autorizado
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
                  No autorizado
                </h4>
                <span class="fa-stack fa-4x">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-hand-paper fa-stack-1x" style="color:#E74C3C"></i>
                </span>
                <br><br>
                Vaya al inicio y reintente nuevamente.
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
