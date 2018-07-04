<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} : @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body class="no-padding-margin">
    <header>
        @include('parts/header')
    </header>
    <main>
        <section>
            @yield('content')
        </section>
    </main>
    <footer>
        @include('parts/footer')
    </footer>
</body>
<script type="text/javascript" src="{{ URL::asset('/js/script.js') }}"></script>
</html>