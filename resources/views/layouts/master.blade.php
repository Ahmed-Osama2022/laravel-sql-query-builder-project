<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  {{-- @vite('resources/js/app.js') --}}
  <title>@yield('title', 'Query Builder | Project')</title>
</head>

<body>
  {{-- <x-navbar></x-navbar> --}}
  {{-- OR: the most common use --}}
  @include('partials.navbar')

  <div class="container">
    @yield('content')
  </div>


  @yield('scripts')
</body>

</html>
