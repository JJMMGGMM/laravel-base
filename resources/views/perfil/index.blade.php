@extends('main')

@section('title')
  Perfil
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
            <div class="page-header">
              <h3 id="containers"><b>Perfil</b></h3>
            </div>
            <div class="card text-white bg-info">
              <div class="card-body">
                <h4 class="card-title">
                  Información del <b>usuario</b>
                </h4>
                @include('partials.alerts')
                <span class="fa-stack fa-4x">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-user fa-stack-1x" style="color:#3498DB"></i>
                </span>
                <p class="card-text">
                  <strong>{{ Auth::user()->alias }}</strong>
                  <br>
                  {{ Auth::user()->correo }}
                  <br><br>
                  Registrado desde el
                  <strong>
                  {{
                    Date::createFromTimestamp(
                      strtotime(Auth::user()->creacion)
                    )->format('D, j M, Y (h:i a)')
                  }}
                  </strong>
                  <br>
                  @if (!empty(Auth::user()->activacion))
                    Activado desde
                    <strong>
                    {{
                      Date::createFromTimeStamp(
                        strtotime(Auth::user()->activacion)
                      )->diffForHumans()
                    }}
                    </strong>
                  @else
                    <strong>NO ACTIVADO</strong>
                    &raquo; <a href="{{ route('perfil.guardarOpConfirmarCorreo') }}">Activar</a>
                  @endif
                  <br>
                  @if (!empty(Auth::user()->modificacion))
                    Última modificación
                    <strong>
                    {{
                      Date::createFromTimeStamp(
                        strtotime(Auth::user()->modificacion)
                      )->diffForHumans()
                    }}
                    </strong>
                  @else
                    <strong>NO MODIFICADO</strong>
                  @endif
                  <br><br>
                  <a class="btn btn-primary btn-sm" href="{{ route('perfil.editarAlias') }}" title="Editar alias">
                    <i class="fa fa-pencil"></i> Editar alias
                  </a>
                  <a class="btn btn-secondary btn-sm" href="{{ route('perfil.editarCorreo') }}" title="Editar correo">
                    <i class="fa fa-envelope"></i> Editar correo
                  </a>
                  <a class="btn btn-warning btn-sm" href="{{ route('perfil.editarContrasenia') }}" title="Editar contraseña">
                    <i class="fa fa-key"></i> Editar contraseña
                  </a>
                  <a class="btn btn-danger btn-sm" href="{{ route('perfil.borrarUsuario') }}" title="Borrar usuario">
                    <i class="fa fa-times-circle"></i> Borrar usuario
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
