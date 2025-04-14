<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="bg-[#EFF3F4]">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        @vite('resources/css/app.css')
        @vite(['resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </head>
    <section class="container mx-auto px-4">

    @php
        $page = request()->segment(1) === 'dashboard' ? 'dashboard' : 'transaction';
        $type = request()->segment(2) ?? 'datawl'; // Default ke 'datawl' jika tidak ada segment 2

        // Mapping nama label berdasarkan type
        $labels = [
            'datawl' => 'Data Wisata Luar Negeri',
            'datawd' => 'Data Wisata Domestik',
            'dataju' => 'Data Peserta Jamaah Umrah',
            'datajh' => 'Data Peserta Jamaah Haji'
        ];

        $title = $labels[$type] ?? 'Data Tidak Diketahui';
    @endphp
        
        <x-navbar :type="$type" :page="$page"></x-navbar>
        <x-table-temp :type="$type" :page="$page" :title="$title"></x-table-temp>

    </section>
</html>
