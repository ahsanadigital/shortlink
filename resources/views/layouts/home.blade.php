<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{!! empty($title) ? config('app.name') : $title !!}</title>
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

  <!-- Fonts -->
  {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}

  <!-- Main Style -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/global.css') }}" />

  <!-- Addons -->
  @yield('header')
</head>
<body>

  @include('layouts.home.navbar')

  @yield('content')

  @include('layouts.home.footer')

  <!-- Main Script -->
  <script src="{{ asset('js/app.js') }}"></script>

  <script>
    window.laravel = '{!! json_encode(['url' => config('app.url'), 'name' => config('app.name')]) !!}';
  </script>


  <!-- Script Addon -->
  @yield('footer')
</body>
</html>
