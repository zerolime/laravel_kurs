<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @section('scripts')
            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}" defer></script>
        @show
        @section('styles')
            <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @show

        <title>@yield('pageTitle', 'just page')</title>
    </head>
    <body>
        <header>@yield('header', View::make('pageBlocks.header'))</header>
        <main>
            @if ($aside ?? null)
                <aside> @yield('aside')</aside>
            @endif
            <div class="content">
                <h1>@yield('pageTitle', 'just page')</h1>
                @yield('content')
            </div>
        </main>
        <footer>@yield('header', View::make('pageBlocks.footer'))</footer>
    </body>
</html>
