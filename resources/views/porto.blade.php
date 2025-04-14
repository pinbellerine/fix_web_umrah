@extends('layouts.landing')

@section('title', 'Tentang - Elkhadijah')

@section('content')
<section class="mt-20 mb-8 w-full flex flex-col items-center justify-center">
    <div class="border-2 border-gray-400 rounded-full py-2 px-5 text-center">
        <h1 class="text-md text-gray-800">Elkhadijah Mecca Medina</h1>
    </div>

    <p class="mt-10 text-4xl text-[#27A1FF] font-semibold text-center">Portofolio</p>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-8 px-10 mx-6 mt-14">
    <!-- Gambar 1 (atas kiri - setengah tinggi) -->
    <div class="col-span-2 md:col-span-2 row-span-1 h-80">
        <img src="images/portoimg/porto13.png" alt="Gambar 1" class="w-full h-full object-cover rounded-xl shadow-md">
    </div>

    <!-- Gambar 2 (Kanan atas) -->
    <div class="col-span-1 md:col-span-1 row-span-2">
        <img src="images/portoimg/porto4.png" alt="Gambar 2" class="w-full h-full object-cover rounded-xl shadow-md">
    </div>

    <!-- Gambar 3 (Tengah kiri) -->
    <div class="col-span-1 md:col-span-1 row-span-2">
        <img src="images/portoimg/porto7.png" alt="Gambar 3" class="w-full h-full object-cover rounded-xl shadow-md">
    </div>

    <!-- Gambar 4 (Tengah) -->
    <div class="col-span-1 md:col-span-1">
        <img src="images/portoimg/porto6.png" alt="Gambar 4" class="w-full h-full object-cover rounded-xl shadow-md">
    </div>

    <!-- Gambar 5 (Bawah kanan - setengah tinggi) -->
    <div class="col-span-2 md:col-span-2 row-span-1 h-80">
        <img src="images/portoimg/porto16.png" alt="Gambar 5" class="w-full h-full object-cover rounded-xl shadow-md">
    </div>
</div>

<div class="w-full px-16 mx-8 mt-6">
    <div class="grid grid-cols-2 gap-6">
        <!-- Gambar 6 (Kiri) -->
        <div class="w-full">
            <img src="images/portoimg/porto3.png" alt="Gambar 6" class="w-full h-60 object-cover rounded-xl shadow-md">
        </div>

        <!-- Gambar 7 (Kanan) -->
        <div class="w-full">
            <img src="images/portoimg/porto12.png" alt="Gambar 7" class="w-full h-60 object-cover rounded-xl shadow-md">
        </div>
    </div>
</div>

<div class="w-full px-16 mx-8 mt-6">
        <!-- Gambar 8 -->
        <div class="w-full">
            <img src="images/portoimg/porto10.png" alt="Gambar 7" class="w-full h-96 object-cover rounded-xl shadow-md">
        </div>
    </div>
</div>

<div class="w-full px-16 mt-6">
    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Gambar 9 (Kiri besar) -->
        <div class="col-span-1 md:col-span-1 row-span-2">
            <img src="images/portoimg/porto5.png" alt="Gambar 9" class="w-full h-full object-cover rounded-xl shadow-md">
        </div>

        <!-- Gambar 10 (Kanan atas) -->
        <div class="col-span-1 md:col-span-2 h-80">
            <img src="images/portoimg/porto2.png" alt="Gambar 10" class="w-full h-full object-cover rounded-xl shadow-md">
        </div>

        <!-- Gambar 11 (Kanan bawah) -->
        <div class="col-span-1 md:col-span-2 h-80">
            <img src="images/portoimg/porto1.png" alt="Gambar 11" class="w-full h-full object-cover rounded-xl shadow-md">
        </div>
    </div>
</div>

<div class="w-full px-16 mt-6">
    <div class="grid grid-cols-5 gap-6">
        <!-- Gambar 12 (Lebar 3/5) -->
        <div class="col-span-3 h-96">
            <img src="images/portoimg/porto15.png" alt="Gambar 12" class="w-full h-full object-cover rounded-xl shadow-md">
        </div>

        <!-- Gambar 13 (Lebar 2/5) -->
        <div class="col-span-2 h-96">
            <img src="images/portoimg/porto9.png" alt="Gambar 13" class="w-full h-full object-cover rounded-xl shadow-md">
        </div>
    </div>
</div>

<div class="w-full px-16 mt-6">
    <div class="grid grid-cols-5 gap-6">
        <!-- Gambar 14 (Lebar 2/5 - Kiri) -->
        <div class="col-span-2 h-80">
            <img src="images/portoimg/porto8.png" alt="Gambar 14" class="w-full h-full object-cover rounded-xl shadow-md">
        </div>

        <!-- Gambar 15 (Lebar 3/5 - Kanan) -->
        <div class="col-span-3 h-80">
            <img src="images/portoimg/porto11.png" alt="Gambar 15" class="w-full h-full object-cover rounded-xl shadow-md">
        </div>
    </div>
</div>

<div class="w-full px-16 mx-8 mt-6">
        <!-- Gambar 16 -->
        <div class="w-full">
            <img src="images/portoimg/porto14.png" alt="Gambar 7" class="w-full h-96 object-cover rounded-xl shadow-md">
        </div>
    </div>
</div>

</section>
@endsection
