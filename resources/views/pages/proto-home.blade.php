<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100%;" lang="en" >
  <head>
    @include('layouts.head')
    @yield('proto-head')
  </head>
  <body style="height: 100%">
    @include('layouts.navbar')
    @yield('proto-content')
    @include('layouts.footer')
  </body>
</html>
