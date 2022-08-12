<!doctype html>
<html lang="en">
  <head>
    @include('layout.head')
  </head>
  <body>
    @include('layout.navbar')
    <main role="main" class="container">
        @yield('main')
    </main><!-- /.container -->
    @include('layout.script')
  </body>
</html>
