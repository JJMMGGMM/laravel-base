@extends('main')

@section('title')
  Perfil - Editar correo
@stop

@section('extra_css_styles')
  <link href="{{ asset('css/webapp.css') }}" rel="stylesheet">
@endsection

@section('header')
  @include('partials.header')
@endsection

@section('content')
  <div class="container">
    <div class="page-header">
      <h3 id="containers">Editar <b>correo</b></h3>
    </div>
  </div>
  @include('partials.alerts')
  <div class="container">
    <form action="{{ route('perfil.guardarOpActualizarCorreo') }}" method="post" id="frm_perfil">
      {{ csrf_field() }}
      <div class="form-group">
        <div class="form-row">
          <div class="col-6">
            <label>Nuevo correo</label>
            <input class="form-control form-control-sm" type="text" name="correo" value="{{ old('correo') }}" maxlength="50">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-6">
            <label>Contraseña actual</label>
            <input class="form-control form-control-sm" type="password" name="contra" maxlength="150">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-6">
            <label>Confirmar contraseña</label>
            <input class="form-control form-control-sm" type="password" name="confirmar_contra" maxlength="150">
          </div>
        </div>
      </div>
      <div class="form-group">
        <button type="button" class="btn btn-sm btn-secondary btn-back" id="btn_back">
          &laquo; Regresar
        </button>
        <button type="submit" class="btn btn-sm btn-success btn-submit" id="enviar_datos">
          <span class="btn-txt">Enviar datos</span>
        </button>
        <button type="reset" class="btn btn-sm btn-danger">
          Limpiar todo
        </button>
      </div>
    </form>
  </div>
@endsection

@section('extra_js_functions')
  <script type="text/javascript">
    $(document).ready(function () {
      let btn_back = document.getElementById('btn_back');

      btn_back.addEventListener('click', function (event) {
        let url = '{{ route("perfil.index") }}';
        window.location.href = url;
      });
      
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
