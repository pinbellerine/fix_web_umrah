@extends('layouts.adddata')

@section('title', 'Transaction - Ubah Data Transaksi')


@section('content')
    <div class="flex items-center justify-center  min-h-screen mb-8 mt-20">

        <form action="" method="POST" enctype="multipart/form-data" class="w-full">
            @csrf
            <div class="mt-8 mb-16 px-8 py-8 bg-white text-black rounded-2xl">

                <div class="flex items-center mb-8 justify-center">
                    <!-- Header Dashboard -->
                    <div class="px-2">
                        <h2 class="text-xl font-medium text-black"><span class="text-[#F1B900]">Ubah Data</span> Transaksi
                        </h2>
                    </div>
                </div>

                <div class="relative mx-2 px-10 py-8 mb-8 bg-[#EFF3F4] p-6 rounded-xl">
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
                            <select name="nama_peserta" required
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1">
                                <option value="Ali" disabled selected hidden>Ali</option>
                                <option value="Ali">Ali</option>
                                <option value="Budi">Budi</option>
                                <option value="Citra">Citra</option>
                                <!-- Tambahkan opsi lain di sini -->
                            </select>


                            <!-- NIK/No. KTP -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">NIK/No. KTP</label>
                            <textarea placeholder="NIK/No. KTP" readonly name="nik" required
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">999999999</textarea>

                            <!-- NIK/No. KTP -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Jumlah</label>
                            <textarea placeholder="Rp" name="nik" required
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Rp87.500.000</textarea>

                            <!-- Tempat Lahir -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Tanggal pembayaran</label>
                            <input name="tanggal_lahir" required type="date"
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></input>

                            <!-- Tanggal Lahir -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Jenis Perjalanan</label>
                            <select name="nama_peserta" required
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1">
                                <option value="Umrah" disabled selected hidden>Umrah</option>
                                <option value="Ali">Haji</option>
                                <option value="Budi">Umrah</option>
                                <option value="Citra">Wisata Luar Negeri</option>
                                <option value="Citra">Wisata Domestik</option>
                                <!-- Tambahkan opsi lain di sini -->
                            </select>
                        </div>

                        <!-- Kolom Kanan -->
                        <div>
                            <!-- Nama Jamaah -->
                            <label class="block text-sm mb-2 font-medium text-gray-700">Kode khusus perjalanan</label>
                            <textarea name="nama_peserta" required placeholder="Kode khusus perjalanan"
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">3911205</textarea>




                            <!-- NIK/No. KTP -->
                            <label class="block text-sm mb-4 font-medium mt-4 text-gray-700">Kategori</label>
                            <div class="flex items-center text-sm gap-x-4 space-x-4 mt-2">
                                <label class="flex items-center">
                                    <input type="radio" checked name="lunas" value="L" required class="mr-2">
                                    DP
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="lunas" value="P" required class="mr-2">
                                    Pelunasan
                                </label>
                            </div>

                            <!-- NIK/No. KTP -->
                            <label class="block text-sm mb-4 font-medium mt-12 text-gray-700">Keterangan</label>
                            <div class="flex items-center text-sm gap-x-4 space-x-4 mt-2">
                                <label class="flex items-center">
                                    <input type="radio" checked name="jenis_kelamin" value="L" required
                                        class="mr-2">
                                    Lunas
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="jenis_kelamin" value="P" required class="mr-2">
                                    Belum Lunas
                                </label>
                            </div>

                            <!-- Foto Diri -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-12">Foto Bukti Transaksi</label>
                            <div class="w-full bg-white rounded-lg p-2 text-center relative">
                                <input name="foto_peserta" required type="file" id="fileInput" class="hidden">
                                <label for="fileInput"
                                    class="cursor-pointer flex flex-col items-center justify-center w-full h-[130px]">
                                    <div id="previewContainer" class="flex flex-col items-center justify-center">
                                    </div>
                                    <img id="previewImage" src="/images/foto.jpeg"
                                        class=" w-full h-full object-cover rounded-lg" />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex items-center my-12">
                    <button type="submit"
                        class="w-full bg-orange-400 text-white text-sm ml-2 px-5 py-3 rounded-lg hover:bg-orange-500 transition">
                        Ubah
                    </button>
                </div>
            </div>
        </form>

    @endsection
