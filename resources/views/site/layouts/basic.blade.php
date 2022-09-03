<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Gestão - @yield('title')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('css/basic.css')}}">
    </head>
    <body>
        @include('site.layouts._partials.navbar')
        @yield('content')
    </body>
</html>
