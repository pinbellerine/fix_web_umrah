@extends('layouts.adddata')

@section('title', 'Dashboard - Profil Peserta')


@section('content')
<div class="flex items-center justify-center  min-h-screen mb-8 mt-20">

<form action="" method="POST" enctype="multipart/form-data" class="w-full">
    @csrf
    <div class="mt-8 mb-16 px-8 py-8 bg-white text-black rounded-2xl">

        <div class="flex mb-2 items-center justify-center">
            <!-- Header Dashboard -->
            <div class="px-2">
                <h2 class="text-xl font-medium text-black">Data Perjalanan</h2>
            </div>
        </div>
        <div class="relative mx-2 mt-8 px-10 py-8 mb-8 bg-[#EFF3F4] p-6 rounded-xl">
            <!-- Judul -->
            <div class="text-left mb-6">
                <h2 class="text-lg font-semibold">Perjalanan</h2>
            </div>

            <!-- Form -->
            <div class="grid grid-cols-2 gap-6">
                <!-- Kolom Kiri -->
                <div>
                    <!-- No. Paspor -->
                    <label class="block text-sm mb-2 font-medium text-gray-700">Jenis perjalanan</label>
                    <textarea readonly name="no_paspor" required placeholder="No. Paspor"
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Haji</textarea>

                    <!-- Biaya -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Biaya</label>
                    <textarea name="issuing_office" required placeholder="Rp"
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></textarea>

                    <!-- Hotel -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Hotel</label>
                    <textarea name="issuing_office" required placeholder="Hotel"
                        class="w-full h-[100px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></textarea>
                </div>

                <!-- Kolom Kanan -->
                <div>
                    <!-- Date of issued -->
                    <label class="block text-sm mb-2 font-medium text-gray-700">Date of issued</label>
                    <input type="date" name="date_of_issued" required
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></input>

                    <!-- Tanggal Lahir -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-5">Date of expiry</label>
                    <input type="date" name="date_of_expiry" required
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></input>

                    <!-- Transportasi -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-6">Transportasi</label>
                    <textarea name="issuing_office" required placeholder="Transportasi"
                        class="w-full h-[100px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></textarea>
                </div>
            </div>

            <div>
            <label class="block text-sm mb-2 font-medium text-gray-700 mt-5">Kode khusus perjalanan</label>

            <div class="flex gap-4 items-center">
                <!-- Textarea -->
                <textarea name="issuing_office" required placeholder="Kode khusus perjalanan"
                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md resize-none"></textarea>
            </div>
            </div>

        <!-- Kolom Kanan -->
        <div>
            <!-- Date of issued -->
            <label class="block text-sm mt-4 mb-2 font-medium text-gray-700">Catatan</label>
            <!-- Editor tampilan -->
            <div class="relative w-full">
  <!-- Textarea -->
  <textarea data-open-surat1 id="noteArea" placeholder="Catatan"
    class="w-full h-[300px] bg-white text-sm px-2 py-1 cursor-pointer border rounded-md resize-none pr-10">halo
  </textarea>

  <!-- Gambar Preview (disembunyikan dulu) -->
  <div data-open-surat1 id="imagePreviewContainer" class="cursor-pointer bg-white w-full h-[300px] border items-center py-4 pl-8 rounded-md overflow-hidden flex justify-left">
  <img id="imagePreview" src="/images/foto.jpeg" class="w-auto h-full object-contain" />
</div>
</div>

        </div>
        </div>

        <div class="relative mx-2 px-10 py-8 mb-8 bg-[#EFF3F4] p-6 rounded-xl">
            <!-- Judul -->
            <div class="text-left mb-6">
                <h2 class="text-lg font-semibold">Paspor</h2>
            </div>

            <!-- Form -->
            <div class="grid grid-cols-2 gap-6">
                <!-- Kolom Kiri -->
                <div>
                    <!-- No. Paspor -->
                    <label class="block text-sm mb-2 font-medium text-gray-700">No. Paspor</label>
                    <textarea name="no_paspor" required placeholder="No. Paspor"
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></textarea>

                    <!-- Issuing office -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Issuing office</label>
                    <textarea name="issuing_office" required placeholder="Issuing office"
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></textarea>
                </div>

                <!-- Kolom Kanan -->
                <div>
                    <!-- Date of issued -->
                    <label class="block text-sm mb-2 font-medium text-gray-700">Date of issued</label>
                    <input type="date" name="date_of_issued" required
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></input>

                    <!-- Tanggal Lahir -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-5">Date of expiry</label>
                    <input type="date" name="date_of_expiry" required
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></input>
                </div>
            </div>
        </div>

        <div class="relative mx-2 mt-8 px-10 py-8 mb-2 bg-[#EFF3F4] p-6 rounded-xl">
            <!-- Judul -->
            <div class="text-left mb-6">
                <h2 class="text-lg font-semibold">Biaya</h2>
            </div>

            
            <div class="grid grid-cols-2 gap-6">
                <div class="">
                    
                <label class="block text-sm mb-2 font-medium text-gray-700">Total biaya</label>
                    <textarea name="no_paspor" required placeholder="Total Biaya"
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Rp350.000.000</textarea>
                </div>
            </div>

            <!-- Data Hubungan -->
            <div class="mt-6">
            <label class="block text-sm mb-2 font-medium text-gray-700">Riwayat pembayaran</label>
                <div class="overflow-x-auto mt-3 rounded-xl">
                <table
    class="w-full min-w-max rounded-xl text-md font-semibold bg-white text-left rtl:text-right text-gray-500">
    <thead class="text-md text-gray-700">
        <tr class=" border-b text-center">
            <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
            </th>
            <th scope="col" class="px-6 py-3">
            Nama
            </th>
            <th scope="col" class="px-6 py-3">
            Jumlah
            </th>
            <th scope="col" class="px-6 py-3">
            Tanggal setor
            </th>
            <th scope="col" class="px-6 py-3">
            Kategori
            </th>
            <th scope="col" class="px-6 py-3">
            Transaksi
            </th>
            <th scope="col" class="px-6 py-3">
            Keterangan
            </th>
        </tr>
    </thead>

    <tbody>
        <tr data-open-part class="bg-white hover:bg-gray-50 text-black text-center">
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center items-center">
                    1
                </div>
            </td>
            <td class="px-6 py-4 text-center">
            <img src="{{ asset('/images/foto.jpeg') }}" alt="Foto" class="w-10 h-10 rounded-full">
            </td>
            <td class="px-6 py-4 text-center">
            Faiz Al Fatih
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex text-green-500 justify-center items-center">
                Rp87.500.000
                </div>
            </td>
            <td class="px-10 py-4 text-center">
                <div class="flex justify-center items-center">
                12-05-2023
                </div>
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center items-center">
                DP
                </div>
            </td>
            <td class="px-6 py-4 text-center">
                <button data-open-surat2 class="flex justify-center items-center gap-2 bg-blue-200 text-blue-500 py-2 px-4 rounded-md w-fit mx-auto">
                Lihat bukti
            </button>
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center items-center gap-2 bg-red-200 text-red-500 py-2 px-4 rounded-md w-fit mx-auto">
                Belum lunas
</div>
            </td>
        </tr>
    </tbody>
        </table>
                </div>
            </div>
    </div>

    <div class="flex items-center my-12">
                    <button type="submit" class="w-full bg-red-500 text-white text-sm ml-2 px-5 py-3 rounded-lg hover:bg-red-700 transition">Arsip</button>
                </div>
</form>
</div>

<!-- pop up cattan -->
<div id="surat1modal" class="fixed inset-0 bg-black bg-opacity-[90%] flex items-center justify-center h-screen hidden">
    <div class="rounded-lg top-10 flex shadow-xl relative p-4 max-h-screen">
        <!-- Tombol Close -->
        <button class="absolute top-4 right-6 text-white hover:text-gray-400 text-4xl font-bold" data-close-surat1>&times;</button>

        <!-- Bagian Kiri (Gambar) -->
        <div class="w-1/2 p-4 flex items-center justify-center">
            <img src="images/surat1.png" alt="Surat 1" class="w-80 h-auto rounded-lg shadow-md">
        </div>

        <!-- Bagian Kanan (Teks) -->
        <div class="w-1/2 text-white p-6 flex flex-col justify-start items-start">
            <p class="text-xl font-semibold">Surat keterangan terdaftar</p>
            <p class="mt-2 text-md">Nomor : S-20130/KT/KPP.320103/2022</p>
        </div>
    </div>
</div>

<!-- pop up cattan -->
<div id="surat2modal" class="fixed inset-0 bg-black bg-opacity-[90%] flex items-center justify-center h-screen hidden">
    <div class="rounded-lg top-10 flex shadow-xl relative p-4 max-h-screen">
        <!-- Tombol Close -->
        <button class="absolute top-4 right-6 text-white hover:text-gray-400 text-4xl font-bold" data-close-surat2>&times;</button>

        <!-- Bagian Kiri (Gambar) -->
        <div class="w-1/2 p-4 flex items-center justify-center">
            <img src="images/surat1.png" alt="Surat 1" class="w-80 h-auto rounded-lg shadow-md">
        </div>

        <!-- Bagian Kanan (Teks) -->
        <div class="w-1/2 text-white p-6 flex flex-col justify-start items-start">
            <p class="text-xl font-semibold">Surat pop upp2 terdaftar</p>
            <p class="mt-2 text-md">Nomor : S-20130/KT/KPP.320103/2022</p>
        </div>
    </div>
</div>

@endsection