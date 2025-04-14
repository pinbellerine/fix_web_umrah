<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Default Title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('logobiru.png') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])
</head>

<section class="container mx-auto px-4">

    <x-navbarwlcm> </x-navbarwlcm>

    <a href="{{ url()->previous() ?? route('') }}" class="absolute top-20 left-8 text-lg flex items-center gap-2 text-black px-4 py-2 rounded-lg">
        <i class="fa-solid fa-angle-left"></i>
        <span>Kembali</span>
    </a>

    <main>
        @yield('content')
    </main>

</section>

</html>
