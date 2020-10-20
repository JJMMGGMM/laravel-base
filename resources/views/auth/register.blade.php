@extends('main')

@section('title')
  Registro
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
            <h3 id="containers"><b>Registro</b></h3>
          </div>
          <form action="{{ route('registro.realizar_registro') }}" method="post" id="frm_registro">
            {{ csrf_field() }}
            <div class="form-group">
              <div class="col-8">
                <label>Alias</label>
                <input class="form-control form-control-sm" type="text" name="alias" value="{{ old('alias') }}" maxlength="50">
              </div>
            </div>
            <div class="form-group">
              <div class="col-8">
                <label>Correo</label>
                <input class="form-control form-control-sm" type="text" name="correo" value="{{ old('correo') }}" maxlength="50">
              </div>
            </div>
            <div class="form-group">
              <div class="col-8">
                <label>Contraseña</label>
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
              <div class="col-4">
                <label>Captcha</label>
                <input class="form-control form-control-sm" type="text" name="detalle_captcha" maxlength="6">
              </div>
            </div>
            <div class="form-group">
              <div class="col-6">
                <img src="{{ captcha_src('inverse') }}"
                  alt="captcha"
                  class="captcha-img"
                  data-refresh-config="default">
                  &nbsp;
                <button type="button" class="btn btn-info btn-reload" id="recargar_captcha">
                  <i class="fa fa-sync-alt"></i>
                </button>
              </div>
            </div>
            <!--
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="validar" id="validar_chk">
                <label class="custom-control-label" for="validar_chk">Continuar registro</label>
              </div>
            </div>
            -->
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
      $('#frm_registro').on('click', '#enviar_datos', function (event) {
        setTimeout(function () {
          disableButton();
        }, 0);
      });

      function disableButton() {
        $('#frm_registro .btn-submit')
          .find('span.btn-txt').text('Espere...');
        $('#frm_registro .btn-submit')
          .append('<i class="icon-rotate-right icon-spin icon-white"></i>');
        $('#frm_registro :input')
          .prop('disabled', true);
      }

      $('#recargar_captcha').on('click', function () {
        var captcha = $('img.captcha-img');
        var config = captcha.data('refresh-config');
        var captcha_url = '{{ url("generar-captcha") }}';

        $('#frm_registro :input').prop('disabled', true);
        $('#frm_registro .btn-reload').find('i').addClass('icon-spin');

        $.ajax({
          method: 'get',
          url: captcha_url,
        }).done(function (response) {
          captcha.prop('src', response);
          // necesario para evitar envío formulario
          // antes de cargar nuevo captcha
          setTimeout(function () {
            $('#frm_registro :input').prop('disabled', false);
            $('#frm_registro .btn-reload').find('i').removeClass('icon-spin');
          }, 2000);
        });
      });
    });
  </script>
@endsection

@section('footer')
  @include('partials.footer')
@endsection
