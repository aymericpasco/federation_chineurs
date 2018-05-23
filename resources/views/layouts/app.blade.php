<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="has-navbar-fixed-top">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fédération') }}</title>

    <!-- Scripts -->
    {{--<script src="{{ mix('js/app.js') }}" defer></script>--}}
    <script  src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" href="//cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css">--}}
</head>
<body class="site-body">
    <div id="app" class="site-body">
        @include('includes.navbar')

        @include('includes.notification')

        <main class="site-content">
            @yield('content')
        </main>

        @include('includes.footer')
    </div>

</body>
</html>
