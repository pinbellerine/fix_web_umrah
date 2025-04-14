
@extends('layouts.adddata')

@section('title', 'Dashboard - Ubah Data Wisata Luar Negeri')

@section('content')
    <div class="flex items-center justify-center min-h-screen mb-8 mt-20">

        <form action="{{ route('wisatadomestik.update', $peserta->id) }}" method="POST" enctype="multipart/form-data" class="w-full">
            @csrf
            @method('PUT')

            <div class="mt-8 mb-16 px-8 py-8 bg-white text-black rounded-2xl">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <div class="flex items-center mb-8 justify-center">
                    <!-- Header Dashboard -->
                    <div class="px-2">
                        <h2 class="text-xl font-medium text-black"><span class="text-[#F1B900]">Ubah Data</span> Peserta
                            Wisata Domestik</h2>
                    </div>
                </div>

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
                            <textarea name="nama_peserta" required placeholder="Nama Peserta"
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ $peserta->nama_peserta }}</textarea>

                            <!-- NIK/No. KTP -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">NIK/No. KTP</label>
                            <textarea name="nik" required placeholder="NIK/No. KTP"
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ $peserta->nik }}</textarea>

                            <!-- Tempat Lahir -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Tempat Lahir</label>
                            <textarea name="tempat_lahir" required placeholder="Tempat Lahir"
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ $peserta->tempat_lahir }}</textarea>

                            <!-- Tanggal Lahir -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Tanggal Lahir</label>
                            <input name="tanggal_lahir" value="{{ $peserta->tanggal_lahir }}" required type="date"
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1">
                        </div>

                        <!-- Kolom Kanan -->
                        <div>
                            <!-- Foto Diri -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-1">Foto Diri</label>
                            <div class="w-full bg-white rounded-lg p-2 text-center relative">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-2">
                                    <input name="foto_peserta" type="file" id="fileInput" class="hidden">
                                    <label for="fileInput"
                                        class="cursor-pointer flex flex-col items-center justify-center w-full h-[120px]">
                                        <div id="previewContainer" class="flex flex-col items-center justify-center">
                                        </div>
                                        <img id="previewImage" src="{{ asset('storage/' . $peserta->foto_peserta) }}"
                                            class="w-full h-full object-cover rounded-lg" />
                                    </label>
                                </div>
                            </div>

                            <!-- Foto Ktp -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-6">Foto KTP</label>
                            <div class="w-full bg-white rounded-lg p-2 text-center relative">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-2">
                                    <input name="foto_ktp" type="file" id="fileInput2" class="hidden">
                                    <label for="fileInput2"
                                        class="cursor-pointer flex flex-col items-center justify-center w-full h-[120px]">
                                        <div id="previewContainer2" class="flex flex-col items-center justify-center">
                                        </div>
                                        <img id="previewImage2" src="{{ asset('storage/' . $peserta->foto_ktp) }}"
                                            class="w-full h-full object-cover rounded-lg" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mt-6">
                        <label class="block text-sm mb-3 font-medium text-gray-700">Jenis Kelamin</label>
                        <div class="flex items-center text-sm gap-x-4 space-x-4 mt-2">
                            <label class="flex items-center">
                                <input type="radio" name="jenis_kelamin" value="L" {{ $peserta->jenis_kelamin == 'L' ? 'checked' : '' }} required class="mr-2">
                                Laki-laki (L)
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="jenis_kelamin" value="P" {{ $peserta->jenis_kelamin == 'P' ? 'checked' : '' }} required class="mr-2">
                                Perempuan (P)
                            </label>
                        </div>
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
                            <!-- Jenis perjalanan -->
                            <label class="block text-sm mb-2 font-medium text-gray-700">Jenis perjalanan</label>
                            <textarea name="jenis_perjalanan" readonly required
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Wisata Luar Negeri</textarea>

                            <!-- Biaya -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Biaya</label>
                            <textarea name="biaya" required placeholder="Rp"
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ $peserta->biaya }}</textarea>

                            <!-- Hotel -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Hotel</label>
                            <textarea name="hotel" required placeholder="Hotel"
                                class="w-full h-[100px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ $peserta->hotel }}</textarea>
                        </div>

                        <!-- Kolom Kanan -->
                        <div>
                            <!-- Date of issued perjalanan -->
                            <label class="block text-sm mb-2 font-medium text-gray-700">Date of issued</label>
                            <input type="date" name="date_of_issued_perjalanan" required value="{{ $peserta->date_of_issued_perjalanan }}"
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1">

                            <!-- Date of expiry perjalanan -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-5">Date of expiry</label>
                            <input type="date" name="date_of_expiry_perjalanan" required value="{{ $peserta->date_of_expiry_perjalanan }}"
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1">

                            <!-- Transportasi -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-6">Transportasi</label>
                            <textarea name="transportasi" required placeholder="Transportasi"
                                class="w-full h-[100px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ $peserta->transportasi }}</textarea>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm mb-2 font-medium text-gray-700 mt-5">Kode khusus perjalanan</label>

                        <div class="flex gap-4 items-center">
                            <!-- Textarea -->
                            <textarea name="kode_khusus_perjalanan" required placeholder="Kode khusus perjalanan" readonly
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md resize-none">{{ $peserta->kode_khusus_perjalanan }}</textarea>

                            <!-- Tombol -->
                            <button type="button" id="btnGenerateKode"
                                class="h-[50px] w-[130px] px-4 bg-blue-500 text-white text-sm rounded-md hover:bg-blue-600 transition">
                                Buat Kode
                            </button>
                        </div>
                    </div>

                    <!-- Catatan -->
                    <div>
                        <!-- Date of issued -->
                        <label class="block text-sm mt-4 mb-2 font-medium text-gray-700">Catatan</label>
                        <!-- Editor tampilan -->
                        <div class="relative w-full">
                            <!-- Textarea -->
                            <textarea id="noteArea" name="catatan" placeholder="Catatan"
                                class="w-full h-[300px] bg-white text-sm px-2 py-1 border rounded-md resize-none pr-10">{{ $peserta->catatan }}</textarea>

                            <!-- Gambar Preview -->
                            <div id="imagePreviewContainer"
                                class="hidden bg-white w-full h-[300px] border items-center py-4 pl-8 rounded-md overflow-hidden flex justify-left">
                                <img id="imagePreview" src="{{ asset('storage/' . $peserta->foto_catatan) }}" class="w-auto h-full object-contain" />
                            </div>

                            <!-- Ikon Gambar di kiri bawah -->
                            <div class="absolute bottom-2 left-2 text-gray-500 cursor-pointer">
                                <label for="imageUpload" class="cursor-pointer">
                                    <i class="fa-solid fa-image text-lg"></i>
                                </label>

                                <!-- Input File Hidden -->
                                <input name="foto_catatan" type="file" id="imageUpload" accept="image/*" class="hidden">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative mx-2 px-10 py-8 mb-8 bg-[#EFF3F4] p-6 rounded-xl">
                    <!-- Judul -->
                    <div class="text-left mb-6">
                        <h2 class="text-lg font-semibold">Akun</h2>
                    </div>

                    <!-- Form -->
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Kolom Kiri -->
                        <div>
                            <!-- Username -->
                            <label class="block text-sm mb-2 font-medium text-gray-700">Username</label>
                            <textarea name="username" required placeholder="Username"
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ $peserta->username }}</textarea>

                            <!-- Password -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Kata sandi</label>
                            <textarea name="password"  placeholder="Kosongkan jika tidak ingin mengubah kata sandi"
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ $peserta->password }}</textarea>
                        </div>

                        <!-- Kolom Kanan -->
                        <div>
                            <!-- No Telepon -->
                            <label class="block text-sm mb-2 font-medium text-gray-700">No. Telepon</label>
                            <textarea name="no_telepon" required placeholder="No. Telepon"
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ $peserta->no_telepon }}</textarea>

                            <!-- Email -->
                            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Email</label>
                            <textarea name="email" required placeholder="Email@gmail.com"
                                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ $peserta->email }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="flex items-center my-12">
                    <button type="submit"
                        class="w-full bg-[#F1B900] text-white text-sm ml-2 px-5 py-3 rounded-lg hover:bg-green-600 transition">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Preview for profile photo
        document.getElementById('fileInput').onchange = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('previewImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        // Preview for KTP photo
        document.getElementById('fileInput2').onchange = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('previewImage2');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        // Preview for catatan photo
        document.getElementById('imageUpload').onchange = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                document.getElementById('imagePreviewContainer').style.display = 'flex';
                document.getElementById('noteArea').style.display = 'none';
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        document.getElementById('btnGenerateKode').addEventListener('click', function() {
            // Generate a random code
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let result = '';
            for (let i = 0; i < 8; i++) {
                result += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            document.querySelector('textarea[name="kode_khusus_perjalanan"]').value = result;
        });

    </script>
@endsection
