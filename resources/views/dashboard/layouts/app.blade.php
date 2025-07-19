<!doctype html>
<html
  lang="en"
  class="layout-menu-fixed layout-compact"
  data-assets-path="{{ asset('styles/dashboard/') }}"
  data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8"/>
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
  <title>{{ env('APP_NAME') }} | @yield('title')</title>
  <meta name="description" content=""/>
  <link rel="icon" type="image/x-icon" href="{{ asset('styles/dashboard/img/favicon/favicon.ico'); }}"/>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('styles/dashboard/vendor/fonts/iconify-icons.css'); }}"/>
  <link rel="stylesheet" href="{{ asset('styles/dashboard/vendor/css/core.css'); }}"/>
  <link rel="stylesheet" href="{{ asset('styles/dashboard/css/demo.css'); }}"/>
  <link rel="stylesheet" href="{{ asset('styles/dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); }}"/>
  <link rel="stylesheet" href="{{ asset('styles/dashboard/vendor/libs/apex-charts/apex-charts.css'); }}"/>
  <script src="{{ asset('styles/dashboard/vendor/js/helpers.js'); }}"></script>
  <script src="{{ asset('styles/dashboard/js/config.js'); }}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    .swal2-container {
      z-index: 2000 !important;
    }

    .swal2-backdrop-show {
      background-color: rgba(0, 0, 0, 0.6) !important;
    }

    .swal2-container.swal2-backdrop-show {
      background: none !important;
      backdrop-filter: none !important;
    }
  </style>
  @stack('styles')
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    @include('dashboard.layouts.sidebar')

    <!-- Layout container -->
    <div class="layout-page">
      @include('dashboard.layouts.navbar')
      <!-- Content wrapper -->
      <div class="content-wrapper">
        @yield('content')

        @include('dashboard.layouts.footer')
        <div class="content-backdrop fade"></div>
      </div>
    </div>
  </div>
  <div class="layout-overlay layout-menu-toggle"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('dashboard.layouts.toast')
<script src="{{ asset('styles/dashboard/vendor/libs/jquery/jquery.js'); }}"></script>
<script src="{{ asset('styles/dashboard/vendor/libs/popper/popper.js'); }}"></script>
<script src="{{ asset('styles/dashboard/vendor/js/bootstrap.js'); }}"></script>
<script src="{{ asset('styles/dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); }}"></script>
<script src="{{ asset('styles/dashboard/vendor/js/menu.js'); }}"></script>
<script src="{{ asset('styles/dashboard/vendor/libs/apex-charts/apexcharts.js'); }}"></script>
<script src="{{ asset('styles/dashboard/js/main.js'); }}"></script>
<script src="{{ asset('styles/dashboard/js/dashboards-analytics.js'); }}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
@stack('scripts')
</body>
</html>
