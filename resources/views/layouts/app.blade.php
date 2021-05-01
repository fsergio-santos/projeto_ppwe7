<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">   

    <title>{{ config('app.name', 'Sistema') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('lib/bootstrap/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">


</head>
<body class="app sidebar-mini rtl">

    <header>
        @include('layouts.header')
    </header>

    <aside>
        @include('layouts.sidebar')
    </aside>

    <main class="app-content">
       @yield('content')
    </main>

    <script src="{{ asset('lib/bootstrap/js/jquery-3.3.1.min.js') }}" ></script>
    <script src="{{ asset('lib/bootstrap/js/main.js') }}" ></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('lib/bootstrap/js/popper.min.js') }}" ></script>

    @yield('javascript')
</body>
</html>
