@extends('main')

@section('title')
  Perfil - Reestablecer usuario
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
            <h3 id="containers"><b>Reestablecer usuario</b></h3>
          </div>
          <form action="{{ route('perfil.guardarOpRecuperarUsuario') }}" method="post" id="frm_perfil">
            {{ csrf_field() }}
            <div class="form-group">
              <div class="col-8">
                <label>Correo</label>
                <input class="form-control form-control-sm" type="text" name="correo" value="{{ old('correo') }}" maxlength="50">
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

      $('#recargar_captcha').on('click', function () {
        var captcha = $('img.captcha-img');
        var config = captcha.data('refresh-config');
        var captcha_url = '{{ url("generar-captcha") }}';

        $('#frm_perfil :input').prop('disabled', true);
        $('#frm_perfil .btn-reload').find('i').addClass('fa-spin');

        $.ajax({
          method: 'get',
          url: captcha_url,
        }).done(function (response) {
          captcha.prop('src', response);
          // necesario para evitar envío formulario
          // antes de cargar nuevo captcha
          setTimeout(function () {
            $('#frm_perfil :input').prop('disabled', false);
            $('#frm_perfil .btn-reload').find('i').removeClass('fa-spin');
          }, 2000);
        });
      });
    });
  </script>
@endsection

@section('footer')
  @include('partials.footer')
@endsection
