<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>@yield('title')</title>
    @yield('styles')
</head>

<body class="bg-dark ">
    @include('layouts._partials.navbar')
    <div class="container">
        @yield('content')
    </div>
    @yield('scripts')
</body>

</html>
