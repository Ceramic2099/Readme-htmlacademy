<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Readme: @yield('title')</title>
    @vite(['resources/css/main.css', 'resources/js/main.js'])
</head>
<body class="page">
<!-- Header -->
@yield('header')

<!-- Main Content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
@include('partials.footer')

<!-- JavaScript -->
</body>
</html>
