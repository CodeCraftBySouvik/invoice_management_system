<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $site_meta->site_name ?? 'Website' }} - Free Trial {{ ucwords($page['term']) }}</title>
    <meta name="description" content="Admin panel developed by Imdad Next Web. Coded in Laravel.">
    <meta name="author" content="Imdad Next Web">
    <meta name="_token" content="{{ csrf_token() }}">

    <!-- Favicons-->
    {{-- <link rel="shortcut icon" href="@if(isset($site_meta->site_favicon) && $site_meta->site_favicon != '') {{ asset('assets/uploads/company/'.$site_meta->site_favicon) }} @else {{ asset('frontend/img/favicon.ico') }} @endif" type="image/x-icon"> --}}
    <link rel="shortcut icon" href="{{ env('COMMON_HOST') . 'assets/admin/img/favicon.ico' }}" type="image/x-icon">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ env('COMMON_HOST') . 'assets/vendor/bootstrap/dist/css/bootstrap.min.css' }}">
    <link rel="stylesheet" href="{{ env('COMMON_HOST') . 'assets/vendor/bootstrap-icons/font/bootstrap-icons.min.css' }}">

    <!-- Menu fonts-->
    <!-- <link href="{{ asset('vendor/metisMenu.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('vendor/slicknav.min.css') }}" rel="stylesheet"> -->

    <!-- Main styles -->
    <link href="{{ env('COMMON_HOST') . 'assets/admin/css/admin.css' }}" rel="stylesheet">
    <!-- Custom styles -->
    <link href="{{ env('COMMON_HOST') . 'assets/admin/css/custom.css' }}" rel="stylesheet">
    @yield('customcss')
</head>

<body class="" id="page-top">
    <!-- <div class="container-fluid"> -->
      <!-- <div class="row"> -->
      <div class="d-flex">
      @if(isset(($properties['is_hide_navigation'])) && ($properties['is_hide_navigation']))
      @else
        @include('includes.admin.navigation')
      @endif

      <main class="main w-100 position-relative1">
        <div class="main-inner w-100 position-relative1">
          @yield('content')
        </div>

        @if(isset(($properties['is_hide_footer'])) && ($properties['is_hide_footer']))
        @else
          @include('includes.admin.footer')
        @endif
      </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    
    <!-- Upgrade Modal -->
    <div class="modal fade" id="upgradeModal" tabindex="-1" aria-labelledby="upgradeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <div class="form-group text-center">
              <label>Please upgrade your account to get this business management tools</label>
            </div>
            <div class="buttons d-flex align-items-center justify-content-center mt-4">
              <button type="button" class="btn btn-primary-app v2" data-bs-dismiss="modal">Upgrade Later</button>
              <!-- <button type="button" class="btn btn-primary-app" data-bs-dismiss="modal">Upgrade Now</a> -->
              <a href="{{ config('app.main_front_url') }}/pricing" class="btn btn-primary-app">Upgrade Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ env('COMMON_HOST') . 'assets/admin/js/jquery.min.js' }}"></script>

    <!-- Boostrap JS -->
    <script src="{{ env('COMMON_HOST') . 'assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js' }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ env('COMMON_HOST') . 'assets/admin/js/admin.js' }}"></script>
    <script src="{{ env('COMMON_HOST') . 'assets/admin/js/admin-trial.js' }}"></script>
	@yield('customjs')
</body>
</html>
