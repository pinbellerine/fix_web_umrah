<div class="flex items-center justify-between my-8 mx-8">
    <!-- Header Dashboard -->
    <div class="px-2 flex items-center space-x-3">
        <a href="javascript:history.back()">
            <i class="fa-solid fa-chevron-left"></i>
        </a>
        <h2 class="text-xl font-medium text-black">Tambah Data Transaksi</h2>
    </div>
</div>

<div class="w-dvh mx-8 mt-8 mb-16 px-8 py-8 bg-white text-black rounded-2xl">

    <div class="flex items-center mb-8 justify-between">
        <!-- Header Dashboard -->
        <div class="px-2">
            <h2 class="text-xl font-medium text-black">Data Peserta</h2>
        </div>
    </div>

    <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="relative mx-2 px-10 py-8 mb-8 bg-[#EFF3F4] p-6 rounded-xl">
            <!-- Judul -->
            <div class="text-left mb-6">
                <h2 class="text-lg font-semibold">Biodata</h2>
            </div>
            <!-- Form -->
            <div class="grid grid-cols-2 gap-6">
                <!-- Kolom Kiri -->
                <div>
                    <!-- Nama Jamaah -->
                    <label class="block text-sm mb-2 font-medium text-gray-700">Nama Peserta</label>
                    <textarea name="nama_peserta" class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none" required></textarea>


                    <!-- Foto Bukti -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-5">Foto Bukti Transaksi</label>
                    <div class="w-full bg-white rounded-lg p-2 text-center relative">
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-2">
                            <input name="foto_bukti_transaksi" type="file" id="fileInput" class="hidden" accept="image/*">
                            <label for="fileInput"
                                class="cursor-pointer flex flex-col items-center justify-center w-full h-[216px]">
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

                <!-- Kolom Kanan -->
                <div>
                    <!-- Total Tagihan -->
                    <label class="block text-sm mb-2 font-medium text-gray-700">Total Tagihan</label>
                    <textarea name="total_tagihan" class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none" required></textarea>

                    <!-- Tanggal Pembayaran -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Tanggal Pembayaran</label>
                    <input  name="tanggal_pembayaran" type="date" class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></input>

                    <!-- Setoran Tagihan -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Setoran Tagihan</label>
                    <textarea name="setoran_tagihan" class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none" required></textarea>

                    <!-- Kategori -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Kategori</label>
                    <textarea name="kategori" class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none" required></textarea>
                </div>
            </div>

            <!-- Keterangan -->
            <div class="mt-6">
                <label class="block text-sm mb-3 font-medium text-gray-700">Keterangan</label>
                <div class="flex items-center text-sm gap-x-4 space-x-4 mt-2">
                    <label class="flex items-center">
                        <input type="radio"  name="keterangan" value="Lunas" class="mr-2" required>
                        Lunas
                    </label>
                    <label class="flex items-center">
                        <input type="radio"name="keterangan" value="Belum Lunas" class="mr-2">
                        Belum Lunas
                    </label>
                </div>
                <button type="submit" class="bg-green-500 text-white text-sm px-5 py-3 rounded-lg mt-4">
                    Simpan
                </button>
            </div>
        </div>
    </form>

    <div class="flex items-center my-12 justify-between">
        <!-- Header Dashboard -->
        <div>
            <a href="/dashboard"
                class="bg-green-500 text-white text-sm ml-2 px-5 py-3 rounded-lg hover:bg-green-600 transition">
                Simpan
            </a>
        </div>
    </div>
</div>
