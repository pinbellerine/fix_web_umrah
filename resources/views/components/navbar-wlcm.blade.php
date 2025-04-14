<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    
    <!-- Logo -->
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('/images/logobiru.png') }}" class="h-3" alt="Logo">
      <span class="self-center text-lg text-[#27A1FF] font-semibold whitespace-nowrap">Elkhadijah</span>
    </a>

    <!-- Menu Navigasi -->
    <div class="hidden md:flex md:w-auto mr-4 ml-auto" id="navbar-sticky">
      <ul class="flex flex-col md:flex-row md:space-x-8 font-medium p-4 md:p-0 mt-4 md:mt-0 border border-gray-100 rounded-lg bg-gray-50 md:border-0 md:bg-white">
        <li>
          <x-navbarlink-wlcm href="/" :active="request()->is('/*')">Beranda</x-navbarlink-wlcm>
        </li>
        <li>        
          <x-navbarlink-wlcm href="/tentang" :active="request()->is('tentang*')">Tentang</x-navbarlink-wlcm>
        </li>
        <li>        
          <x-navbarlink-wlcm href="/portofolio" :active="request()->is('portofolio*')">Portofolio</x-navbarlink-wlcm>
        </li>
        <li>        
          <a href="https://www.instagram.com/elkhadijah.official?igsh=d3Q1eHh6dno0OHBv" class="hover:text-blue-700" target="_blank">Hubungi</a>
        </li>
        @auth
            @if(Auth::user()->role === 'admin')
            <li>
                <x-navbarlink-wlcm href="/dashboard" :active="request()->is('dashboard*')">Dashboard</x-navbarlink-wlcm>
            </li>
            @endif
        @endauth
      </ul>
    </div>

    <!-- Tombol Menu Mobile + Login -->
    <div class="flex items-center space-x-3 md:ml-4">
    @auth
    <div class="relative inline-block text-left">
    <!-- Tombol Gambar Profil -->
    <button id="dropdownButton" type="button" class="inline-flex justify-center w-full" onclick="toggleDropdown()">
        <img src="/logobiru.png" alt="Profil" class="w-8 rounded-full">
    </button>

    <!-- Dropdown Menu -->
    <div id="dropdownMenu" class="justify-center hidden absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg z-50">
        <a href="/viewadminprofil" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
            Profil
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center w-full gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <!-- Icon Logout (Heroicons Logout) -->
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout
            </button>
        </form>
    </div>
</div>
@else
    <a href="/login" class="text-black bg-white border border-black hover:bg-gray-50 font-medium rounded-md text-sm px-6 py-2 text-center">Masuk</a>
@endauth

      <!-- Tombol Menu Mobile -->
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
    </div>

  </div>
</nav>
<script>
    function toggleDropdown() {
        const menu = document.getElementById('dropdownMenu');
        menu.classList.toggle('hidden');
    }

    // Optional: Tutup dropdown saat klik di luar
    window.addEventListener('click', function (e) {
        const button = document.getElementById('dropdownButton');
        const menu = document.getElementById('dropdownMenu');

        if (!button.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
</script>