@extends('layouts.adddata')

@section('title', 'Transaksi - Data Arsip')


@section('content')
<div class="flex justify-center  min-h-screen mb-8 mt-20">

<form action="" enctype="multipart/form-data" class="w-full">
    <div class="mt-8 mb-16 px-8 py-8 bg-white text-black rounded-2xl">

        <div class="flex mb-2 items-center justify-center">
            <!-- Header Dashboard -->
            <div class="px-2">
                <h2 class="text-xl font-medium text-black"><span class="text-blue-400">Arsip </span>Data Peserta</h2>
            </div>
        </div>
        
        <div class="flex mt-8 justify-between items-center bg-white p-0 rounded-lg">
            <!-- Search Input -->
            <div class="flex items-center flex-grow">
                <!-- Input Background -->
                <div class="bg-gray-100 py-4 pl-6 pr-11 rounded-tl-3xl rounded-tr-3xl flex items-center flex-grow">

                    <!-- Wrapper Input -->
                    <div class="relative w-full">
                        <!-- Icon Search -->
                        <i
                            class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>

                        <!-- Input -->
                        <input type="text" placeholder="Cari"
                            class="pl-12 pr-4 py-4 w-full h-[43px] border text-black rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                </div>
            </div>
        </div>


        <div class="relative overflow-x-auto mb-2 bg-gray-100 p-6 rounded-br-xl rounded-bl-xl">
            <div class="overflow-x-auto">


                <!-- tabel -->
                <table
                    class="w-full min-w-max rounded-xl text-md font-semibold bg-white text-left rtl:text-right text-gray-500">
                    <thead class="text-md text-gray-700">
                        <tr class=" border-b text-center">
                            <th scope="col" class="px-6 py-3">
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Jamaah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal daftar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Peserta
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr data-open-part class="bg-white hover:bg-gray-50 text-black text-center">
                            <td class="px-6 py-4">
                                <img src="/images/foto.jpeg" alt="Foto" class="w-10 h-10 rounded-full">
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center">
                                    jjj
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center">
                                    21-06-2023
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                            <a href="/viewdataarsipwl" class="flex justify-center items-center gap-2 bg-blue-200 text-blue-500 py-2 px-4 rounded-md w-fit mx-auto">
                            Lihat data
                            </a>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div id="kategoriData" class="flex justify-center items-center gap-2 bg-blue-200 text-blue-500 py-2 px-4 rounded-md w-fit mx-auto">
                                    Umrah
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">

                                <div class="flex justify-center items-center gap-4">

                                <!-- Tombol recovery -->
                                <button data-open-recov type="button" class="text-blue-400 text-lg hover:text-blue-500">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                </button>

                                <!-- Tombol Hapus -->
                                <button data-open-del type="button" class="text-red-500 hover:text-red-600">
                                    <i class="fa-solid fa-trash-can text-lg"></i>
                                </button>

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- pop up delete -->
                <div id="delmodal"
                    class="fixed text-black inset-0 flex items-center justify-center bg-gray-900 bg-opacity-80 hidden">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-1/4">
                        <!-- Isi Modal -->
                        <div class="mt-2 flex justify-center items-center text-red-500 text-center text-4xl">
                            <i class="fa-solid fa-trash-can"></i>
                        </div>

                        <div class="mt-4 flex justify-center items-center text-black text-center text-md">
                            <p>Anda yakin akan menghapus data?</p>
                        </div>

                        <!-- Footer Modal -->
                        <div class="mt-4 flex justify-center items-center space-x-4">
                            <button data-close-del class="px-6 py-2 bg-gray-300 text-black rounded-lg">
                                Batal
                            </button>
                            <button data-close-del class="px-4 py-2 bg-red-500 text-white rounded-lg">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>

                <!-- pop up recov -->
                <div id="recovmodal"
                    class="fixed text-black inset-0 flex items-center justify-center bg-gray-900 bg-opacity-80 hidden">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-1/4">
                        <!-- Isi Modal -->
                        <div class="mt-2 flex justify-center items-center text-blue-400 text-center text-4xl">
                        <i class="fa-solid fa-arrows-rotate"></i>
                        </div>

                        <div class="mt-4 flex justify-center items-center text-black text-center text-md">
                            <p>Anda yakin akan pulihkan data?</p>
                        </div>

                        <!-- Footer Modal -->
                        <div class="mt-4 flex justify-center items-center space-x-4">
                            <button data-close-recov class="px-6 py-2 bg-gray-300 text-black rounded-lg">
                                Batal
                            </button>
                            <button data-close-recov class="px-4 py-2 bg-blue-400 text-white rounded-lg">
                                Pulihkan
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>

<script>
    const div = document.getElementById('kategoriData');
    const text = div.textContent.trim();

    // Reset dulu semua warna
    div.classList.remove(
        'bg-blue-200', 'text-blue-500',
        'bg-purple-200', 'text-purple-500',
        'bg-orange-200', 'text-orange-500',
        'bg-green-200', 'text-green-500',
        'bg-yellow-200', 'text-yellow-500'
    );

    // Tambahkan class sesuai isi
    switch (text) {
        case 'Wisata Luar Negeri':
            div.classList.add('bg-purple-200', 'text-purple-500');
            break;
        case 'Wisata Domestik':
            div.classList.add('bg-orange-200', 'text-orange-500');
            break;
        case 'Umrah':
            div.classList.add('bg-green-200', 'text-green-500');
            break;
        case 'Haji':
            div.classList.add('bg-yellow-200', 'text-yellow-500');
            break;
        default:
            div.classList.add('bg-blue-200', 'text-blue-500'); // fallback
    }
</script>


@endsection