<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Estructura para inicializar cualquier tipo de proyecto básico-mediano">
    <meta name="author" content="Bitbank">

    <title>@yield('title') :: Laravel-base </title>

    @yield('token')

    <!-- gracias a bootswatch.com por la plantilla html -->
    <!-- bibliotecas css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- estilos color plantilla -->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">

    <!-- fuentes texto -->
    <link href="{{ asset('css/lato.css') }}" rel="stylesheet">

    <!-- fontawesome -->
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/solid.css') }}" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- bibliotecas css extras -->
    @yield('extra_css_libraries')

    <!-- estilos css extras -->
    @yield('extra_css_styles')
  </head>
  <body>
    <div id="wrapper">
      <!-- menu página -->
      @yield('header')
      
      <!-- contenido página -->
      @yield('content')

      <!-- pie página -->
      @yield('footer')
    </div>

    <!-- bibliotecas javascript -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- funciones plantilla -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- bibliotecas javascript extras -->
    <script src="{{ asset('js/scroll.js') }}"></script>
    @yield('extra_js_libraries')

    <!-- funciones javascript extras  -->
    @yield('extra_js_functions')
  </body>
</html>