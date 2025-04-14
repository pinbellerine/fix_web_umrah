@extends('layouts.profil')

@section('title', 'Dashboard - Profil Peserta')


@section('content')
<div class="flex items-center justify-center  min-h-screen mb-8 mt-20">

    @csrf
    <div class="mt-8 mb-16 px-8 py-8 bg-white text-black rounded-2xl">

        <div class="flex mb-2 items-center justify-center">
            <!-- Header Dashboard -->
            <div class="px-2">
                <h2 class="text-xl font-medium text-black">Data Peserta</h2>
            </div>
        </div>

        @if(isset($error))
            <div class="p-4 mb-4 bg-red-100 text-red-700 rounded-lg">
                {{ $error }}
                <div class="mt-2">
                    <a href="/login" class="text-blue-500 underline">Kembali ke halaman login</a>
                </div>
            </div>
        @endif

        @if(isset($userData) && !empty($userData))
            <div class="flex justify-center items-center my-8 w-max-4xl h-[250px] bg-transparent p-4 gap-4">
                <!-- Gambar kiri (persegi) -->
                <img src="{{ isset($userData->foto_peserta) ? asset('storage/' . $userData->foto_peserta) : asset('images/foto.jpeg') }}" 
                     alt="Foto Peserta"
                     class="w-[250px] h-[250px] object-cover rounded-md border" />

                <!-- Gambar kanan (4x5 potret) -->
                <img src="{{ isset($userData->foto_ktp) ? asset('storage/' . $userData->foto_ktp) : asset('images/foto.jpeg') }}" 
                     alt="Foto KTP"
                     class="w-[380px] h-[250px] object-cover rounded-md border" />
            </div>

            <div class="relative mx-2 mt-2 px-10 py-8 mb-8 bg-[#EFF3F4] p-6 rounded-xl">
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
                        <textarea name="nama_peserta" readonly class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ $userData->nama_peserta ?? 'Data tidak tersedia' }}</textarea>

                        <!-- NIK/No. KTP -->
                        <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">NIK/No. KTP</label>
                        <textarea readonly name="nik" class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ $userData->nik ?? 'Data tidak tersedia' }}</textarea>

                        <!-- Jenis Kelamin -->
                        <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Jenis Kelamin</label>
                        <textarea readonly name="jenis_kelamin" class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ isset($userData->jenis_kelamin) ? ($userData->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan') : 'Data tidak tersedia' }}</textarea>
                    </div>

                    <!-- Kolom Kanan -->
                    <div>
                        <!-- Tempat Lahir -->
                        <label class="block text-sm mb-2 font-medium text-gray-700">Tempat Lahir</label>
                        <textarea name="tempat_lahir" readonly class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">{{ $userData->tempat_lahir ?? 'Data tidak tersedia' }}</textarea>

                        <!-- Tanggal Lahir -->
                        <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Tanggal Lahir</label>
                        <input name="tanggal_lahir" value="{{ $userData->tanggal_lahir ?? now()->format('Y-m-d') }}" readonly type="date" class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">
                    </div>
                </div>
            </div>

            @if(is_array($relationships) && count($relationships) > 0)
            <div class="relative mx-2 mt-8 px-10 py-8 mb-2 bg-[#EFF3F4] p-6 rounded-xl">
                <!-- Judul -->
                <div class="text-left mb-6">
                    <h2 class="text-lg font-semibold">Hubungan</h2>
                </div>

                <!-- Data Hubungan -->
                <div class="mt-6">
                    <div class="overflow-x-auto mt-1 rounded-xl">
                    <table class="w-full min-w-max rounded-xl text-md font-semibold bg-white text-left rtl:text-right text-gray-500">
                        <thead class="text-md text-gray-700">
                            <tr class="border-b text-center">
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3"></th>
                                <th scope="col" class="px-6 py-3">Nama Jamaah</th>
                                <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                                <th scope="col" class="px-6 py-3">Tempat Lahir</th>
                                <th scope="col" class="px-6 py-3">Tanggal Lahir</th>
                                <th scope="col" class="px-6 py-3">Hubungan</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($relationships as $index => $relation)
                            <tr data-open-part class="bg-white hover:bg-gray-50 text-black text-center">
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ $index + 1 }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ isset($relation['foto_peserta']) ? asset('storage/' . $relation['foto_peserta']) : asset('images/foto.jpeg') }}" alt="Foto" class="w-10 h-10 rounded-full">
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ $relation['nama_peserta'] ?? 'Tidak tersedia' }}
                                    </div>
                                </td>
                                <td class="px-10 py-4 text-center">
                                    @php 
                                        $jenisKelamin = $relation['jenis_kelamin'] ?? 'L';
                                        $jenisKelaminText = $jenisKelamin == 'L' ? 'Laki-laki' : 'Perempuan';
                                        $bgColor = $jenisKelamin == 'L' ? 'bg-blue-200 text-blue-500' : 'bg-purple-200 text-purple-400';
                                    @endphp
                                    <div class="kategoriData flex mx-auto justify-center rounded-md py-2 items-center {{ $bgColor }}">
                                        {{ $jenisKelaminText }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ $relation['tempat_lahir'] ?? 'Tidak tersedia' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        @if(isset($relation['tanggal_lahir']))
                                            {{ date('d-m-Y', strtotime($relation['tanggal_lahir'])) }}
                                        @else
                                            Tidak tersedia
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center gap-2 bg-green-200 text-green-500 py-2 px-4 rounded-md">
                                        {{ $relation['jenis_hubungan'] ?? 'Keluarga' }}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            @endif

            <div class="relative mx-2 mt-8 px-10 py-8 mb-2 bg-[#EFF3F4] p-6 rounded-xl">
                <!-- Judul -->
                <div class="text-left mb-6">
                    <h2 class="text-lg font-semibold">Daftar Perjalanan</h2>
                </div>

                <!-- Data Perjalanan -->
                <div class="mt-6">
                    <div class="overflow-x-auto mt-1 rounded-xl">
                    <table class="w-full min-w-max rounded-xl text-md font-semibold bg-white text-left rtl:text-right text-gray-500">
                        <thead class="text-md text-gray-700">
                            <tr class="border-b text-center">
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Jenis dan kode perjalanan</th>
                                <th scope="col" class="px-6 py-3">Tanggal daftar</th>
                                <th scope="col" class="px-6 py-3">Perkiraan keberangkatan</th>
                                <th scope="col" class="px-6 py-3">Perkiraan kepulangan</th>
                                {{-- <th scope="col" class="px-6 py-3">Aksi</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($journeys as $index => $journey)
                            <tr data-open-part class="bg-white hover:bg-gray-50 text-black text-center">
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ $index + 1 }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ isset($journey['jenis_perjalanan']) ? $journey['jenis_perjalanan'] : ucfirst(str_replace('_', ' ', $journey['type'])) }} ({{ $journey['code'] }})
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ date('d-m-Y', strtotime($journey['registration_date'])) }}
                                    </div>
                                </td>
                                <td class="px-10 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ date('d-m-Y', strtotime($journey['departure_date'])) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ date('d-m-Y', strtotime($journey['return_date'])) }}
                                    </div>
                                </td>
                                {{-- <td class="px-6 py-4 text-center">
                                    <a href="{{ route('viewusertrip', ['journey_id' => $journey['id'], 'journey_type' => $journey['type']]) }}" class="flex justify-center items-center gap-2 bg-blue-200 text-blue-500 py-2 px-4 rounded-md w-fit mx-auto">
                                        Lihat data
                                    </a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        @else
            <div class="p-4 bg-yellow-100 text-yellow-700 rounded-lg">
                Data pengguna tidak tersedia. Silakan <a href="/login" class="underline">login</a> terlebih dahulu.
            </div>
        @endif
    </div>
</div>
@endsection