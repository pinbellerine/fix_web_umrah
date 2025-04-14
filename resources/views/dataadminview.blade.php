@extends('layouts.profil')

@section('title', 'Dashboard - Profil Peserta')


@section('content')
<div class="flex items-center justify-center  min-h-screen mb-8 mt-20">

    @csrf
    <div class="mt-8 mb-16 px-8 py-8 bg-white text-black rounded-2xl">

        <div class="flex mb-2 items-center justify-center">
            <!-- Header Dashboard -->
            <div class="px-2">
                <h2 class="text-xl font-medium text-black">Data Admin</h2>
            </div>
        </div>

        <div class="flex justify-center items-center my-8 w-max-4xl h-[250px] bg-transparent p-4 gap-4">
  <!-- Gambar kiri (persegi) -->
  <img src="/images/foto.jpeg" alt="Foto Persegi"
       class="w-[250px] h-[250px] object-cover rounded-md border" />

  <!-- Gambar kanan (4x5 potret) -->
  <img src="/images/foto.jpeg" alt="Foto 4x5"
       class="w-[380px] h-[250px] object-cover rounded-md border" />
</div>


        <div class="relative w-[1000px] mx-2 mt-2 px-10 py-8 mb-8 bg-[#EFF3F4] p-6 rounded-xl">
            <!-- Judul -->
            <div class="text-left mb-6">
                <h2 class="text-lg font-semibold">Biodata</h2>
            </div>

            <!-- Form -->
            <div class="grid grid-cols-2 gap-6">
                <!-- Kolom Kiri -->
                <div>
                    <!-- Nama Jamaah -->
                    <label class="block text-sm mb-2 font-medium text-gray-700">Nama</label>
                    <textarea name="nama_peserta" required placeholder="Nama Peserta"
                    readonly class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ Auth::user()->username }}</textarea>

<!-- NIK/No. KTP -->
<label class="block text-sm mb-2 font-medium text-gray-700 mt-4">NIK/No. KTP</label>
<textarea readonly placeholder="NIK/No. KTP" name="nik" required class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">0002001212000001</textarea>

<!-- NIK/No. KTP -->
<label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Jenis Kelamin</label>
<textarea readonly placeholder="NIK/No. KTP" name="nik" required class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Laki-laki</textarea>
                </div>

                <!-- Kolom Kanan -->
                <div>

<!-- Tempat Lahir -->
<label class="block text-sm mb-2 font-medium text-gray-700">Tempat Lahir</label>
<textarea name="tempat_lahir" required placeholder="Tempat Lahir" readonly
    class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Banyumas</textarea>

<!-- Tanggal Lahir -->
<label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Tanggal Lahir</label>
<input name="tanggal_lahir" value="2025-04-07" required type="date" readonly
class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></input>
                </div>
            </div>
        </div>

@endsection