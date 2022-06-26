<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Products List') }}@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <link rel='stylesheet' id='swank-google-fonts-css'  href='http://fonts.googleapis.com/css?family=Old+Standard+TT%3A400%2C400italic%2C700%7CMontserrat%3A400%2C700&#038;ver=1.0.0' type='text/css' media='all' />
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="/images/favicon.ico">
</head>
<body>
    <div id="app" class="container">
            <header>
                <div class="card bg-light mt-3">
                    <div class="card-header">
                        <h4 class="mt-1">Products</h4>
                    </div>
                </div>
            </header>
            <main>
              @yield('content')
            </main>
            <footer>

            </footer>
    </div>


</body>
</html>
