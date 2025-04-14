@extends('layouts.adddata')

@section('title', 'Transaksi - Data Arsip')


@section('content')
<div class="flex justify-center w-full min-h-screen mb-8 mt-20">

    @csrf
    <div class="mt-8 mb-16 px-8 py-8 bg-white text-black rounded-2xl">

        <div class="flex mb-2 items-center justify-center">
            <!-- Header Dashboard -->
            <div class="px-2">
                <h2 class="text-xl font-medium text-black">Data Peserta Wisata Luar Negeri</h2>
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
                    <textarea name="nama_peserta" required placeholder="Nama Peserta"
                    readonly class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Faiz Al Fatih</textarea>

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
        
        <div class="relative mx-2 mt-8 px-10 py-8 mb-2 bg-[#EFF3F4] p-6 rounded-xl">
            <!-- Judul -->
            <div class="text-left mb-6">
                <h2 class="text-lg font-semibold">Hubungan</h2>
            </div>

            <!-- Data Hubungan -->
            <div class="mt-6">
                <div class="overflow-x-auto mt-1 rounded-xl">
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
                Nama Jamaah
            </th>
            <th scope="col" class="px-6 py-3">
                Jenis Kelamin
            </th>
            <th scope="col" class="px-6 py-3">
                Tempat Lahir
            </th>
            <th scope="col" class="px-6 py-3">
                Tanggal Lahir
            </th>
            <th scope="col" class="px-6 py-3">
                Hubungan
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
            <td class="px-6 py-4">
                <img src="{{ asset('/images/foto.jpeg') }}" alt="Foto" class="w-10 h-10 rounded-full">
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center items-center">
                    Sukardi Santari
                </div>
            </td>
            <td class="px-10 py-4 text-center">
                <div id="kategoriData" class="flex mx-auto justify-center rounded-md py-2 items-center bg-purple-200 text-purple-400">
                                Laki-laki
                            </div>
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center items-center">
                Kudus
                </div>
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center items-center">
                11-11-11
                </div>
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center items-center gap-2 bg-green-200 text-green-500 py-2 px-4 rounded-md">
                Suami - Istri
                </div>
            </td>
        </tr>
    </tbody>
        </table>
                </div>
            </div>
        </div>
        

        <div class="relative mt-8 mx-2 px-10 py-8 mb-8 bg-[#EFF3F4] p-6 rounded-xl">
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
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Wisata Domestik</textarea>

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
    class="w-full h-[300px] bg-white text-sm px-2 py-1 cursor-pointer border rounded-md resize-none pr-10">Halo
  </textarea>

  <!-- Gambar Preview (disembunyikan dulu) -->
  <div data-open-surat1 id="imagePreviewContainer" class="cursor-pointer bg-white w-full h-[300px] border items-center py-4 pl-8 rounded-md overflow-hidden flex justify-left">
  <img id="imagePreview" src="/images/foto.jpeg" class="w-auto h-full object-contain" />
</div>
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
                Lihat data
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

<div class="relative mt-8 mx-2 px-10 py-8 mb-8 bg-[#EFF3F4] p-6 rounded-xl">
    <!-- Judul -->
    <div class="text-left mb-6">
        <h2 class="text-lg font-semibold">Akun</h2>
    </div>

    <!-- Form -->
    <div class="grid grid-cols-2 gap-6">
        <!-- Kolom Kiri -->
        <div>
            <!-- No. Paspor -->
            <label class="block text-sm mb-2 font-medium text-gray-700">Username</label>
            <textarea name="username" readonly required placeholder="Username"
                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Ali</textarea>

            <!-- Issuing office -->
            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Kata sandi</label>
            <textarea name="password" readonly required placeholder="Kata sandi"
                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">5356</textarea>
        </div>

        <!-- Kolom Kanan -->
        <div>
            <!-- No. Paspor -->
            <label class="block text-sm mb-2 font-medium text-gray-700">No. Telepon</label>
            <textarea name="no_telepon" readonly required placeholder="No. Telepon"
                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">5245252</textarea>

            <!-- Issuing office -->
            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Email</label>
            <textarea name="email" readonly required placeholder="Email@gmail.com"
                class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">apa@g,mail.com</textarea>
        </div>
    </div>
</div>

<div class="flex items-center my-8">
    <button data-open-recov type="" class="w-full bg-blue-400 text-white text-sm ml-2 px-5 py-3 rounded-lg hover:bg-blue-500 transition">Pulihkan</button>
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
            <p class="text-xl font-semibold">Surat ketedqddddqd</p>
            <p class="mt-2 text-md">Nomor : S-20130/KT/KPP.320103/2022</p>
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

<script>
    const div = document.getElementById('kategoriData');
    const text = div.textContent.trim();

    // Reset dulu semua warna
    div.classList.remove(
        'bg-blue-200', 'text-blue-500',
        'bg-purple-200', 'text-purple-400'
    );

    // Tambahkan class sesuai isi
    switch (text) {
        case 'Laki-laki':
            div.classList.add('bg-blue-200', 'text-blue-500');
            break;
        case 'Perempuan':
            div.classList.add('bg-purple-200', 'text-purple-400');
            break;
        default:
            div.classList.add('bg-blue-200', 'text-blue-500'); // fallback
    }
</script>

@endsection