<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title> 
     <link rel="stylesheet" href="assets/css/aos.css" />
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/glightbox-min.css" />
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="antialiased">
<x-header />
    @livewireScripts

    @yield('content')

 <script src="assets/js/typed.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/glightbox-min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
