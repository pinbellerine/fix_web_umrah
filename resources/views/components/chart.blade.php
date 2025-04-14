@props(['type'])

@php
    // Buat ID unik berdasarkan tipe data
    $chartId = "chart-" . $type;
@endphp

<div class="w-full bg-[#EFF3F4] rounded-3xl shadow-sm p-8">
  <div class="bg-white p-6 rounded-2xl">
    <!-- Navbar -->
  <div class="flex items-center justify-between mb-6">
        <!-- Header Dashboard -->
        <div class="px-2">
            <h2 id="title-{{ $chartId }}" class="text-xl font-medium text-black">}</h2>
        </div>

        <!-- Tombol di Kanan -->
        <div class="relative inline-block w-32">
        <button data-chart-id="{{ $chartId }}" class="dropdownButton text-black bg-white hover:bg-gray-100 border border-gray-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 w-full text-left flex justify-between items-center">
            <span class="selectedOption">5 Tahun</span>
            <i class="fa-solid fa-chevron-right transition-transform transform ml-auto"></i>
        </button>

        <div class="dropdownMenu absolute left-0 top-full mt-2 z-50 bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-full hidden">
            <ul class="py-2 text-sm text-gray-700">
                <li><a href="#" data-value="5 Tahun" class="dropdown-item block px-4 py-2 hover:bg-gray-100">5 Tahun</a></li>
                <li><a href="#" data-value="1 Tahun" class="dropdown-item block px-4 py-2 hover:bg-gray-100">1 Tahun</a></li>
                <li><a href="#" data-value="1 Bulan" class="dropdown-item block px-4 py-2 hover:bg-gray-100">1 Bulan</a></li>
                <li><a href="#" data-value="1 Minggu" class="dropdown-item block px-4 py-2 hover:bg-gray-100">1 Minggu</a></li>
            </ul>
        </div>
    </div>

    </div>

    <div class="chart" id="{{ $chartId }}" data-type="{{ $type }}"></div>
  </div>
</div>
