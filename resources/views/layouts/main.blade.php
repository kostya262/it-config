<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>IT GLOBAL TODOLIST</title>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/just-validate@1.5.0/dist/js/just-validate.min.js"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  @yield('content')
</body>

</html>
