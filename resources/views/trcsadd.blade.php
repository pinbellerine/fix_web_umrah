@extends('layouts.adddata')

@section('title', 'Dashboard - Tambah Data Transaksi')

@section('content')
<div class="flex items-center justify-center min-h-screen mb-8 mt-20">
    <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data" class="w-full">
        @csrf
        <div class="mt-8 mb-16 px-8 py-8 bg-white text-black rounded-2xl">

            <div class="flex items-center mb-8 justify-center">
                <div class="px-2">
                    <h2 class="text-xl font-medium text-black">
                        <span class="text-[#0ACC00]">Tambah Data</span> Transaksi
                    </h2>
                </div>
            </div>

            <div class="relative mx-2 px-10 py-8 mb-8 bg-[#EFF3F4] p-6 rounded-xl">
                <div class="text-left mb-6">
                    <h2 class="text-lg font-semibold">Transaksi</h2>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <!-- Kolom Kiri -->
                    <div>
                        <label class="block text-sm mb-2 font-medium text-gray-700">Nama Peserta</label>
                        <select name="nama_peserta" id="namaPesertaSelect" required
                            class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1">
                            <option value="" disabled selected hidden>Nama Peserta</option>
                            @foreach($namaPeserta as $peserta)
                                <option value="{{ $peserta }}">{{ $peserta }}</option>
                            @endforeach
                        </select>

                        <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">NIK/No. KTP</label>
                        <textarea readonly id="nikField" name="nik"
                            class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></textarea>

                        <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Total Tagihan</label>
                        <input type="number" name="total_tagihan" placeholder="Rp"
                            class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1" required>

                        <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Tanggal Pembayaran</label>
                        <input name="tanggal_pembayaran" type="date"
                            class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1" required>

                        <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Jenis Perjalanan</label>
                        <input readonly id="jenisPerjalananField" name="jenis_perjalanan"
                            class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">
                    </div>

                    <!-- Kolom Kanan -->
                    <div>
                        <label class="block text-sm mb-2 font-medium text-gray-700">Kode Khusus Perjalanan</label>
                        <input readonly id="kodePerjalananField" name="kode_khusus_perjalanan"
                            placeholder="Kode Khusus Perjalanan"
                            class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none" required>

                        <label class="block text-sm mb-2 font-medium mt-4 text-gray-700">Kategori</label>
                        <div class="flex items-center text-sm gap-x-4 space-x-4 mt-2">
                            <label class="flex items-center">
                                <input type="radio" name="kategori" value="DP" required class="mr-2">
                                DP
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="kategori" value="Pelunasan" required class="mr-2">
                                Pelunasan
                            </label>
                        </div>

                        <label class="block text-sm mb-2 font-medium mt-6 text-gray-700">Setoran Tagihan</label>
                        <input type="number" name="setoran_tagihan" placeholder="Rp"
                            class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1" required>

                        <label class="block text-sm mb-2 font-medium mt-6 text-gray-700">Keterangan</label>
                        <div class="flex items-center text-sm gap-x-4 space-x-4 mt-2">
                            <label class="flex items-center">
                                <input type="radio" name="keterangan" value="Lunas" required class="mr-2">
                                Lunas
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="keterangan" value="Belum Lunas" required class="mr-2">
                                Belum Lunas
                            </label>
                        </div>

                        <label class="block text-sm mb-2 font-medium text-gray-700 mt-6">Foto Bukti Transaksi</label>
                        <div class="w-full bg-white rounded-lg p-2 text-center relative">
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-2">
                                <input name="foto_bukti_transaksi" type="file" id="fileInput" required class="hidden">
                                <label for="fileInput"
                                    class="cursor-pointer flex flex-col items-center justify-center w-full h-[120px]">
                                    <div id="previewContainer" class="flex flex-col items-center justify-center">
                                        <i class="fa-regular fa-image text-3xl text-gray-400"></i>
                                        <p class="mt-2 text-sm text-gray-400">
                                            <i class="fa-solid fa-circle-exclamation mr-1"></i>
                                            Seret dan lepas atau klik untuk pilih gambar
                                        </p>
                                    </div>
                                    <img id="previewImage" class="hidden w-full h-full object-cover rounded-lg" />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center my-12">
                <button type="submit"
                    class="w-full bg-green-500 text-white text-sm ml-2 px-5 py-3 rounded-lg hover:bg-green-600 transition">
                    Simpan
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Script AJAX untuk ambil data berdasarkan nama_peserta -->
<script>
    document.getElementById('namaPesertaSelect').addEventListener('change', function () {
        const nama = this.value;

        fetch(`/get-peserta-data?nama_peserta=${encodeURIComponent(nama)}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('nikField').value = data.nik || '';
                document.getElementById('jenisPerjalananField').value = data.jenis_perjalanan || '';
                document.getElementById('kodePerjalananField').value = data.kode_khusus_perjalanan || '';
            })
            .catch(error => {
                console.error('Gagal ambil data peserta:', error);
            });
    });
</script>
@endsection
