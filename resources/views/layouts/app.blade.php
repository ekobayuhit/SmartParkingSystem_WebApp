<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/smartparkingv1.css')}}" rel="stylesheet">

    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}" defer></script>
    <script src="{{ asset('lib/superfish/hoverIntent.js') }}"></script>
    <script src="{{ asset('lib/superfish/superfish.min.js') }}"></script>
    <script src="{{ asset('lib/magnific-popup/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/smartparkingv1.js') }}" defer></script>
  </head>
  <body>
    @yield('navbar')
    <main>
      @yield('content')
    </main>
    @yield('footer')
  </body>
</html>
