<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>@yield('pageTitle', 'just page')</title>
    </head>
    <body>
    <header>@yield('header')</header>
    <main>
        @if ($aside)
        <aside> @yield('aside')</aside>
        @endif
        <div class="content">
            <h1>@yield('pageTitle')</h1>
            @yield('content')
        </div>
    </main>
    <footer>@yield('footer')</footer>
    </body>
</html>
