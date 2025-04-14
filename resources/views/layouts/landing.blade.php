<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Default Title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/png" href="{{ asset('logobiru.png') }}">
        @vite('resources/css/app.css')
        @vite(['resources/js/app.js'])
    </head>
    <section class="h-auto w-full">

        <x-navbar-wlcm></x-navbar-wlcm>

        <main class="container mx-auto py-4">
            @yield('content')  
        </main>
        
        <x-footer-wlcm></x-footer-wlcm>
    </section>
</html>
