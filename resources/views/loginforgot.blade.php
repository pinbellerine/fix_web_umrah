<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        @vite(['resources/js/app.js'])

    </head>
    <section style="
        background-image: url(/images/Login.jpg);
        background-size: cover;
        background-position: bottom;
        background-repeat: no-repeat;
        width: 100vw;
        height: 100vh;"
        class="bg-center min-h-screen w-full">

        <a href="/" class="absolute top-4 left-4 text-lg flex items-center gap-2 text-white px-4 py-2 rounded-lg shadow-md">
                <i class="fa-solid fa-angle-left"></i>
                <span>Kembali</span>
        </a>


        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-2xl shadow-[0_0_15px_2px_rgba(255,255,255,0.6)] md:mt-0 sm:max-w-md xl:p-0">
                
            <div id="forgot-first">
                <x-forgot-first></x-forgot-first>
            </div>

            <div id="forgot-sec" class="hidden">
                <x-forgot-sec></x-forgot-sec>
            </div>

            <div id="forgot-third"  class="hidden">
                <x-forgot-third></x-forgot-third>
            </div>

            <div id="forgot-fourth" class="hidden">
                <x-forgot-fourth></x-forgot-fourth>
            </div>

            </div>
        </div>
        </section>
</html>
