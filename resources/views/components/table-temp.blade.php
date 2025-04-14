@props(['type', 'page', 'title'])

<div class="w-dvh mx-8 my-8 px-6 py-10 bg-white text-white rounded-2xl">

    <div class="flex items-center mb-4 justify-between">
        <!-- Header Dashboard -->
        <div class="px-2">
            <h2 class="text-xl font-medium text-black">Data {{ $title }}</h2>
        </div>
    </div>

    <div class="flex justify-between items-center bg-white p-0 rounded-lg">
    <!-- Search Input -->
    <div class="flex items-center flex-grow">
        <!-- Input Background -->
        <div class="bg-gray-100 py-4 pl-6 pr-11 rounded-tl-3xl flex items-center flex-grow"
            style="border-top-right-radius: 70px 40px;">

            <!-- Wrapper Input -->
            <div class="relative w-full">
                <!-- Icon Search -->
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>

                <!-- Input -->
                <input type="text" placeholder="Cari"
                    class="pl-12 pr-4 py-4 w-full h-[43px] border text-black rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

        </div>
        <!-- Kotak di Sebelah Kanan Input -->
        <div class="relative h-[75px] w-[40px] flex-shrink-0">
            <div class="absolute inset-0 bg-gray-100"></div>
            <div class="h-full w-full bg-white flex items-center justify-center relative"
                style="border-bottom-left-radius: 100px 110px;">
            </div>
        </div>
    </div>

    <!-- Button Group -->
    <div class="flex space-x-2 flex-shrink-0">
        <button class="bg-white border border-gray-300 text-blue-500 px-4 py-2 text-sm rounded-full flex items-center space-x-2 hover:bg-gray-100 transition">
            <i class="fa-solid fa-arrows-rotate mr-4"></i>
            Refresh
        </button>
        <a href="{{ url((request()->is('transaction/*') ? '/transaction/' : '/dashboard/') . $type . '/tambahdata') }}" class="bg-white border border-gray-300 px-4 py-2 text-sm text-green-500 rounded-full flex items-center space-x-2 hover:bg-gray-100 transition">
            <i class="fa-solid fa-plus mr-4"></i>
            Tambah Data
        </a>
    </div>
    </div>


    <div class="relative overflow-x-auto mx-0 mb-2 bg-gray-100 p-6 rounded-tr-xl rounded-br-xl rounded-bl-xl">
        <div class="overflow-x-auto">
        @if ($page == 'dashboard')
            @if ($type == 'datawl')
            <x-table-data></x-table-data>
            @elseif ($type == 'datawd')
            <x-table-data></x-table-data>
            @elseif ($type == 'dataju')
            <x-table-data></x-table-data>
            @elseif ($type == 'datajh')
            <x-table-data></x-table-data>
            @endif
        @elseif ($page == 'transaction')
            @if ($type == 'datawl')
            <x-table-trcs></x-table-trcs>
            @elseif ($type == 'datawd')
            <x-table-trcs></x-table-trcs>
            @elseif ($type == 'dataju')
            <x-table-trcs></x-table-trcs>
            @elseif ($type == 'datajh')
            <x-table-trcs></x-table-trcs>
            @endif
        @endif
        </div>
        </div>
</div>
