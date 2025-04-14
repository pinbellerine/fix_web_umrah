<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Default Title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="icon" type="image/png" href="{{ asset('logobiru.png') }}">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        @vite('resources/css/app.css')
        @vite(['resources/js/app.js'])
    </head>
    
    <section class="container mx-auto px-4">

    <x-navbarwlcm>  </x-navbarwlcm>


    @php
        $page = request()->segment(1) === 'dashboard' ? 'dashboard' : 'transaction';
        $type = request()->segment(2) ?? 'datawl';
    @endphp

    <x-navbar :type="$type" :page="$page"></x-navbar>
    
    <main>
            @yield('content')  
    </main>

    </section>
</html>
