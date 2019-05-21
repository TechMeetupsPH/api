<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Techmeetups PH</title>

    @section('styles')
    <link rel="stylesheet" href="/css/app.css" />
    @show
  </head>
  <body>

    @include('_header')

    <main>
        @yield('content')
    </main>

    @include('_footer')

    @section('scripts')
    <script src="/js/app.js"></script>
    @show
  </body>
</html>
