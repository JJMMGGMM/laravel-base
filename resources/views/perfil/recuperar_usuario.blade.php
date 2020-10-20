@extends('main')

@section('title')
  Perfil - Recuperar usuario
@stop

@section('extra_css_styles')
  <link href="{{ asset('css/webapp.css') }}" rel="stylesheet">
@endsection

@section('header')
  @include('partials.header')
@endsection

@section('content')
<div class="container">
  <div class="row">
    @include('partials.alerts')
    <div class="col-lg-12">
      <center>
        <div class="col-lg-6">
          <div class="page-header">
            <h3 id="containers"><b>Recuperar usuario</b></h3>
          </div>
          <form action="{{ route('perfil.recuperarUsuario') }}" method="post" id="frm_perfil">
            {{ csrf_field() }}
            <input type="hidden" name="usuario_id" value="{{ $usuario_id }}" id="usuario_id">
            <input type="hidden" name="tipo_operacion_id" value="{{ $tipo_operacion_id }}" id="tipo_operacion_id">
            <input type="hidden" name="token_operacion" value="{{ $token_operacion }}" id="token_operacion">
            <div class="form-group">
              <div class="col-8">
                <label>Correo</label>
                <input class="form-control form-control-sm" type="text" name="correo" value="{{ old('correo') }}" maxlength="50">
              </div>
            </div>
            <div class="form-group">
              <div class="col-8">
                <label>Nueva contraseña</label>
                <input class="form-control form-control-sm" type="password" name="contra" maxlength="150">
              </div>
            </div>
            <div class="form-group">
              <div class="col-8">
                <label>Confirmar contraseña</label>
                <input class="form-control form-control-sm" type="password" name="confirmar_contra" maxlength="150">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success btn-submit" id="enviar_datos">
                <span class="btn-txt">Enviar datos</span>
              </button>
              <button type="reset" class="btn btn-danger">
                Limpiar todo
              </button>
            </div>
          </form>
        </div>
      </center>
    </div>
  </div>
</div>
@endsection

@section('extra_js_functions')
  <script type="text/javascript">
    $(document).ready(function () {
      $('#frm_perfil').on('click', '#enviar_datos', function (event) {
        setTimeout(function () {
          disableButton();
        }, 0);
      });

      function disableButton() {
        $('#frm_perfil .btn-submit')
          .find('span.btn-txt').text('Espere...');
        $('#frm_perfil .btn-submit')
          .append('<i class="fa fa-spinner fa-pulse"></i>');
        $('#frm_perfil :input')
          .prop('disabled', true);
      }
    });
  </script>
@endsection

@section('footer')
  @include('partials.footer')
@endsection
