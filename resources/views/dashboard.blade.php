<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="icon" type="image/png" href="{{ asset('logobiru.png') }}">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        @vite('resources/css/app.css')
        @vite(['resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </head>
    <section class="container mx-auto px-4">

        <x-navbarwlcm>  </x-navbarwlcm>

        <x-navbar></x-navbar>

        <x-newtrcs :dataTransaksi="$dataTransaksi" />

        <div class="max-w-screen-xl mx-6 my-8 rounded-2xl">
            <div class="flex items-center justify-between w-full px-4 py-4">
                <!-- Header Dashboard -->
                <div>
                    <h2 class="text-2xl font-medium text-black">Data Peserta</h2>
                </div>

                <!-- Button -->
                <button class=" text-white bg-[#5CC1F3] hover:bg-blue-300 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 flex items-center gap-2">
                    <span class="selectedOption">Seluruh Data</span>
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>

            <div class=" grid grid-cols-2 gap-8">
            <x-chart type="datawl"></x-chart>
            <x-chart type="datajh"></x-chart>
            <x-chart type="datawd"></x-chart>
            <x-chart type="dataju"></x-chart>
            </div>
        </div>

    </section>
</html>
