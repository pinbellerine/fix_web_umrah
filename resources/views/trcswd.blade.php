@extends('layouts.dashboard')

@section('title', 'Transaksi - Transaksi Wisata Domestik')


@section('content')
    @props(['type', 'page'])

    <div class="w-dvh mx-2 my-8 px-6 py-10 bg-white text-white rounded-2xl">

        <div class="flex items-center mb-4 justify-between">
            <!-- Header Dashboard -->
            <div class="px-2">
                <h2 class="text-xl font-medium text-black">Data Transaksi</h2>
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
                        <i
                            class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>

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
                <button
                    class="bg-white border border-gray-300 text-blue-500 px-4 py-2 text-sm rounded-full flex items-center space-x-2 hover:bg-gray-100 transition">
                    <i class="fa-solid fa-arrows-rotate mr-4"></i>
                    Refresh
                </button>
                <a href="/tambahdatatransaksi"
                    class="bg-white border border-gray-300 px-4 py-2 text-sm text-green-500 rounded-full flex items-center space-x-2 hover:bg-gray-100 transition">
                    <i class="fa-solid fa-plus mr-4"></i>
                    Tambah Data
                </a>
            </div>
        </div>


        <div class="relative overflow-x-auto mb-2 bg-gray-100 p-6 rounded-tr-xl rounded-br-xl rounded-bl-xl">
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
                                Jumlah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal setor
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr data-open-part class="bg-white hover:bg-gray-50 text-black text-center">
                            <td class="px-6 py-4">
                                <img src="{{ asset('/images/foto.jpeg') }}" alt="Foto" class="w-10 h-10 rounded-full">
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center">
                                    Sukardi Santari
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center text-green-500">
                                    Rp7.000.000
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center">
                                    30-06-2024
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center gap-4">

                                    <!-- Tombol Lihat -->
                                    <a href="/viewtransactionwd" class="text-blue-400 hover:text-blue-500">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="/changetransactionwd" class="text-yellow-500 hover:text-yellow-600">
                                        <i class="fa-solid fa-pen-to-square text-lg"></i>
                                    </a>

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

            </div>
        </div>
    @endsection
