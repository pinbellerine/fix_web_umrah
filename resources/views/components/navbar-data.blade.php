@php
    // Fetch counts directly if not provided through controller
    if (!isset($counts)) {
        $counts = [
            'wisataLuarNegeriCount' => \App\Models\WisataLuarNegeri::count(),
            'wisataDomestikCount' => \App\Models\WisataDomestik::count(),
            'jamaahUmrahCount' => \App\Models\JamaahUmrah::count(),
            'jamaahHajiCount' => \App\Models\JamaahHaji::count(),
        ];
    }
@endphp

@if (request()->is('dashboard*'))
    <!-- Navbar 1 (Untuk Dashboard) -->
    <div class="grid grid-cols-4 gap-4 px-2 mt-4 py- bg">
        <a href="/dashboard/datawl"
            class="{{ request()->is('dashboard/datawl') ? 'bg-white bg-opacity-25 hover:bg-white hover:bg-opacity-50' : 'bg-white bg-opacity-50 hover:bg-white hover:bg-opacity-25' }}
               text-gray-800 p-6 rounded-xl block">
            <p class="pb-2 text-lg">Wisata Luar Negeri</p>
            <p class="text-4xl font-semibold">{{ $counts['wisataLuarNegeriCount'] }}</p>
        </a>

        <a href="/dashboard/datawd"
            class="{{ request()->is('dashboard/datawd') ? 'bg-white bg-opacity-25 hover:bg-white hover:bg-opacity-50' : 'bg-white bg-opacity-50 hover:bg-white hover:bg-opacity-25' }}
               text-gray-800 p-6 rounded-xl block">
            <p class="pb-2 text-lg">Wisata Domestik</p>
            <p class="text-4xl font-semibold">{{ $counts['wisataDomestikCount'] }}</p>
        </a>

        <a href="/dashboard/dataju"
            class="{{ request()->is('dashboard/dataju') ? 'bg-white bg-opacity-25 hover:bg-white hover:bg-opacity-50' : 'bg-white bg-opacity-50 hover:bg-white hover:bg-opacity-25' }}
               text-gray-800 p-6 rounded-xl block">
            <p class="pb-2 text-lg">Jamaah Umrah</p>
            <p class="text-4xl font-semibold">{{ $counts['jamaahUmrahCount'] }}</p>
        </a>

        <a href="/dashboard/datajh"
            class="{{ request()->is('dashboard/datajh') ? 'bg-white bg-opacity-25 hover:bg-white hover:bg-opacity-50' : 'bg-white bg-opacity-50 hover:bg-white hover:bg-opacity-25' }}
               text-gray-800 p-6 rounded-xl block">
            <p class="pb-2 text-lg">Jamaah Haji</p>
            <p class="text-4xl font-semibold">{{ $counts['jamaahHajiCount'] }}</p>
        </a>
    </div>
@elseif (request()->is('transaction*'))
    <!-- Navbar 2 (Untuk Transaction) -->
    <div class="grid grid-cols-4 gap-4 px-2 mt-4 py- bg">
        <a href="{{ url('transaction/datawl') }}"
            class="{{ request()->is('transaction/datawl') ? 'bg-white bg-opacity-25 hover:bg-white hover:bg-opacity-50' : 'bg-white bg-opacity-50 hover:bg-white hover:bg-opacity-25' }}
               text-gray-800 p-6 rounded-xl block">
            <p class="pb-2 text-lg">Wisata Luar Negeri</p>
            <p class="text-4xl font-semibold">{{ $counts['wisataLuarNegeriCount'] }}</p>
        </a>

        <a href="{{ url('transaction/datawd') }}"
            class="{{ request()->is('transaction/datawd') ? 'bg-white bg-opacity-25 hover:bg-white hover:bg-opacity-50' : 'bg-white bg-opacity-50 hover:bg-white hover:bg-opacity-25' }}
               text-gray-800 p-6 rounded-xl block">
            <p class="pb-2 text-lg">Wisata Domestik</p>
            <p class="text-4xl font-semibold">{{ $counts['wisataDomestikCount'] }}</p>
        </a>

        <a href="{{ url('transaction/dataju') }}"
            class="{{ request()->is('transaction/dataju') ? 'bg-white bg-opacity-25 hover:bg-white hover:bg-opacity-50' : 'bg-white bg-opacity-50 hover:bg-white hover:bg-opacity-25' }}
               text-gray-800 p-6 rounded-xl block">
            <p class="pb-2 text-lg">Jamaah Umrah</p>
            <p class="text-4xl font-semibold">{{ $counts['jamaahUmrahCount'] }}</p>
        </a>

        <a href="{{ url('transaction/datajh') }}"
            class="{{ request()->is('transaction/datajh') ? 'bg-white bg-opacity-25 hover:bg-white hover:bg-opacity-50' : 'bg-white bg-opacity-50 hover:bg-white hover:bg-opacity-25' }}
               text-gray-800 p-6 rounded-xl block">
            <p class="pb-2 text-lg">Jamaah Haji</p>
            <p class="text-4xl font-semibold">{{ $counts['jamaahHajiCount'] }}</p>
        </a>
    </div>
@endif
