<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Grill') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('public/css/all.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet"> --}}
    {{-- <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
</head>
<body>
    <div id="app">
        @include('layouts.header')
        <main class="py-4">
            @if (session('add_product'))
            <div class="alert alert-success" role="alert">
                {{ session('add_product') }}
            </div>
        @endif
        @if (session('edit_product'))
            <div class="alert alert-info" role="alert">
                {{ session('edit_product') }}
            </div>
        @endif
        @if (session('delete_product'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete_product') }}
            </div>
        @endif

            @yield('content')
        </main>
        <footer class="" style="float:down">
        @include('layouts.footer')
        </footer>
    </div>
</body>
</html>
