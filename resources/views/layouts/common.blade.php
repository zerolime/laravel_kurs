<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
    </head>
    <body>
    <header>@yield('header')</header>
    <main>
        <aside> @yield('aside')</aside>
        <div class="content">@yield('content')</div>
    </main>
    <footer>@yield('footer')</footer>
    </body>
</html>
