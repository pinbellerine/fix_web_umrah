@extends('layouts.profil')

@section('title', 'Dashboard - Profil Peserta')


@section('content')
<div class="flex items-center justify-center  min-h-screen mb-8 mt-20">

<form action="" method="POST" enctype="multipart/form-data" class="w-full">
    @csrf
    <div class="mt-8 mb-16 px-8 py-8 bg-white text-black rounded-2xl">

        <div class="flex mb-2 items-center justify-center">
            <!-- Header Dashboard -->
            <div class="px-2">
                <h2 class="text-xl font-medium text-black">Data Transaksi</h2>
            </div>
        </div>

        

        <div class="flex justify-center items-center my-8 w-max-4xl h-[250px] bg-transparent p-4 gap-4">
  <!-- Gambar kiri (persegi) -->
  <img src="/images/foto.jpeg" alt="Foto Persegi"
       class="w-[250px] h-[250px] object-cover rounded-md border" />
</div>
        
        <div class="relative mt-4 mx-2 px-10 py-8 mb-8 bg-[#EFF3F4] p-6 rounded-xl">
            <!-- Judul -->
            <div class="text-left mb-6">
                <h2 class="text-lg font-semibold">Transaksi</h2>
            </div>

            <!-- Form -->
            <div class="grid grid-cols-2 gap-6">
                <!-- Kolom Kiri -->
                <div>
                    <!-- Nama Jamaah -->
                    <label class="block text-sm mb-2 font-medium text-gray-700">Nama Peserta</label>
                    <textarea placeholder="NIK/No. KTP" readonly name="nik" required class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Faiz Al Fatih</textarea>
</select>


<!-- NIK/No. KTP -->
<label class="block text-sm mb-2 font-medium text-gray-700 mt-4">NIK/No. KTP</label>
<textarea placeholder="NIK/No. KTP" readonly name="nik" required class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">0002001212000001</textarea>

<!-- NIK/No. KTP -->
<label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Jumlah</label>
<textarea placeholder="Rp" readonly name="nik" required class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Rp87.500.000</textarea>

                    <!-- Tempat Lahir -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Tanggal pembayaran</label>
                    <input name="tanggal_lahir" required type="date" readonly
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></input>

                    <!-- Tanggal Lahir -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Jenis Perjalanan</label>
                    <textarea name="nama_peserta" readonly required placeholder="Jenis Perjalanan"
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Haji</textarea>
                </div>

                <!-- Kolom Kanan -->
                <div>
                    <!-- Nama Jamaah -->
                    <label class="block text-sm mb-2 font-medium text-gray-700">Kode khusus perjalanan</label>
                    <textarea name="nama_peserta" readonly required placeholder="Kode khusus perjalanan"
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">977868</textarea>

                        


<!-- NIK/No. KTP -->
<label class="block text-sm mb-4 font-medium mt-4 text-gray-700">Kategori</label>
                <div class="flex items-center text-sm gap-x-4 space-x-4 mt-2">
                    <label class="flex items-center">
                        <input type="radio" checked disabled name="jenis_kelamin" value="L" required class="mr-2">
                        DP
                    </label>
                    <label class="flex items-center">
                        <input type="radio" disabled name="jenis_kelamin" value="P" required class="mr-2">
                        Pelunasan
                    </label>
                </div>

                <!-- NIK/No. KTP -->
<label class="block text-sm mb-4 font-medium mt-12 text-gray-700">Keterangan</label>
                <div class="flex items-center text-sm gap-x-4 space-x-4 mt-2">
                    <label class="flex items-center">
                        <input type="radio" checked disabled name="jenis_kelamin" value="L" required class="mr-2">
                        Lunas
                    </label>
                    <label class="flex items-center">
                        <input type="radio" disabled name="jenis_kelamin" value="P" required class="mr-2">
                        Belum Lunas
                    </label>
                </div>

                    <!-- Foto Diri -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-12">Foto Bukti Transaksi</label>
                    <div class="w-full bg-white rounded-lg p-2 text-center relative">
                            <input name="foto_peserta" required type="file" id="fileInput" class="hidden">
                            <label for="fileInput2"
                                class="cursor-pointer flex flex-col items-center justify-center w-full h-[135px]" data-open-surat1>
                                <div id="previewContainer2" class="flex flex-col items-center justify-center">
                                </div>
                                <img id="previewImage2" src="/images/foto.jpeg" class=" w-full h-full object-cover rounded-lg" />
                            </label>
                    </div>
                </div>
            </div>
        </div>
        
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

@endsection