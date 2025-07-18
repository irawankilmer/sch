<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>{{ env('APP_NAME'); }} - @yield('title')</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('styles/dashboard/img/favicon/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('styles/dashboard/vendor/fonts/iconify-icons.css'); }}" />
    <link rel="stylesheet" href="{{ asset('styles/dashboard/vendor/css/core.css'); }}" />
    <link rel="stylesheet" href="{{ asset('styles/dashboard/css/demo.css'); }}" />
    <link rel="stylesheet" href="{{ asset('styles/dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); }}" />
    <link rel="stylesheet" href="{{ asset('styles/dashboard/vendor/css/pages/page-auth.css'); }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    @stack('styles')
    <script src="{{ asset('styles/dashboard/vendor/js/helpers.js'); }}"></script>
    <script src="{{ asset('styles/dashboard/js/config.js'); }}"></script>
  </head>

  <body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('styles/dashboard/vendor/libs/jquery/jquery.js'); }}"></script>
    <script src="{{ asset('styles/dashboard/vendor/libs/popper/popper.js'); }}"></script>
    <script src="{{ asset('styles/dashboard/vendor/js/bootstrap.js'); }}"></script>
    <script src="{{ asset('styles/dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); }}"></script>
    <script src="{{ asset('styles/dashboard/vendor/js/menu.js'); }}"></script>
    <script src="{{ asset('styles/dashboard/js/main.js'); }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    @stack('scripts')
  </body>
</html>
