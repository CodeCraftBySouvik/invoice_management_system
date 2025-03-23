<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Invoice Management System</title>

    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="_token" content="{{ csrf_token() }}">

    <!-- Favicons-->
    <link rel="shortcut icon" href="@if(isset($site_meta->site_favicon) && $site_meta->site_favicon != '') {{ asset('assets/uploads/company/'.$site_meta->site_favicon) }} @else {{ env('COMMON_HOST') . 'assets/frontend/img/favicon.ico' }} @endif" type="image/x-icon">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    {{-- toaster --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ env('COMMON_HOST') . 'assets/vendor/bootstrap/dist/css/bootstrap.min.css' }}">

    <!-- Slick Slider -->
    <!-- <link rel="stylesheet" href="{{ env('COMMON_HOST') . 'assets/frontend/css/swiper-bundle.min.css' }}"> -->
    <!-- <link rel="stylesheet" href="{{ env('COMMON_HOST') . 'assets/frontend/css/glightbox.min.css' }}"> -->

    <!-- Main css -->
    <link href="{{ env('COMMON_HOST') . 'assets/frontend/css/style.css' }}" rel="stylesheet">

	@yield('customcss')
</head>

<body>
    @include('includes.frontend.header')
    
    <main class="main__content_wrapper">
        @yield('content')
    </main>

    @include('includes.frontend.footer')

	<!-- JS Files -->
    <!-- jQuery -->
    <script src="{{ env('COMMON_HOST') . 'assets/frontend/js/jquery.min.js' }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}


    <!-- Boostrap JS -->
    <script src="{{ env('COMMON_HOST') . 'assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js' }}"></script>

    <!-- Slick Swiper -->
    <!-- <script src="{{ env('COMMON_HOST') . 'assets/frontend/js/swiper-bundle.min.js' }}"></script> -->
    <!-- <script src="{{ env('COMMON_HOST') . 'assets/frontend/js/glightbox.min.js' }}"></script> -->

    <!-- Custom Js File -->
    <script src="{{ env('COMMON_HOST') . 'assets/frontend/js/script.js' }}"></script>
    {{-- toaster js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	@yield('customjs')
   <script>
      $(document).ready(function() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
              // Set Background Color Manually
        };
        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @endif
        @if (session('warning'))
            toastr.warning('{{ session('warning') }}');
        @endif
        @if (session('error'))
            toastr.error('{{ session('error') }}');
        @endif
    });
   </script>
</body>
</html>
