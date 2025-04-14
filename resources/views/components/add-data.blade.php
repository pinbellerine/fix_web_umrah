<div class="flex items-center justify-between my-8 mx-8">
    <!-- Header Dashboard -->
    <div class="px-2 flex items-center space-x-3">
        <a href="javascript:history.back()">
            <i class="fa-solid fa-chevron-left"></i>
        </a>
        <h2 class="text-xl font-medium text-black">Tambah Data</h2>
    </div>
</div>

<form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="w-dvh mx-8 mt-8 mb-16 px-8 py-8 bg-white text-black rounded-2xl">

        <div class="flex items-center mb-8 justify-between">
            <!-- Header Dashboard -->
            <div class="px-2">
                <h2 class="text-xl font-medium text-black">Data Peserta</h2>
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
                    <textarea name="nama_peserta" required
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></textarea>


                    <!-- Foto Diri -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-5">Foto Diri</label>
                    <div class="w-full bg-white rounded-lg p-2 text-center relative">
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-2">
                            <input name="foto_peserta" required type="file" id="fileInput" class="hidden">
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

                <!-- Kolom Kanan -->
                <div>
                    <!-- NIK/No. KTP -->
                    <label class="block text-sm mb-2 font-medium text-gray-700">NIK/No. KTP</label>
                    <textarea name="nik" required class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></textarea>

                    <!-- Tempat Lahir -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Tempat Lahir</label>
                    <textarea name="tempat_lahir" required
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></textarea>

                    <!-- Tanggal Lahir -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Tanggal Lahir</label>
                    <input name="tanggal_lahir" required type="date"
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></input>
                </div>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mt-6">
                <label class="block text-sm mb-3 font-medium text-gray-700">Jenis Kelamin</label>
                <div class="flex items-center text-sm gap-x-4 space-x-4 mt-2">
                    <label class="flex items-center">
                        <input type="radio" name="jenis_kelamin" value="L" required class="mr-2">
                        Laki-laki (L)
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="jenis_kelamin" value="P" required class="mr-2">
                        Perempuan (P)
                    </label>
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
                    <textarea name="no_paspor" required
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"></textarea>

                    <!-- Issuing office -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Issuing office</label>
                    <textarea name="issuing_office" required
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
        <div class="relative mx-2 px-10 py-8 mb-2 bg-[#EFF3F4] p-6 rounded-xl">
            <!-- Judul -->
            <div class="text-left mb-6">
                <h2 class="text-lg font-semibold">Hubungan</h2>
            </div>

            <!-- Jenis Hubungan -->
            <div class="mt-6">
                <label class="block text-sm mb-3 font-medium text-gray-700">Jenis Hubungan</label>
                <div class="flex items-center text-sm gap-x-4 space-x-4 mt-2">
                    <label class="flex items-center">
                        <input type="radio" name="jenis_hubungan" value="Keluarga" required class="mr-2">
                        Keluarga
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="jenis_hubungan" value="Suami-istri" required class="mr-2">
                        Suami-istri
                    </label>
                </div>
            </div>

            <!-- Data Hubungan -->
            <div class="mt-6">
                <label class="block text-md mb-3 font-medium text-gray-700">Data</label>
                <div class="overflow-x-auto mt-1 rounded-xl">
                    <table
                        class="w-full min-w-max rounded-xl text-md font-semibold bg-white text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-md text-gray-700 dark:text-gray-400">
                            <tr class=" border-b">
                                <th scope="col" class="px-10 py-8">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Peserta
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sex
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NIK/No. KTP
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tempat Lahir
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Lahir
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    No. Paspor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date of Issued
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date of Expiry
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Issuing Office
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Hubungan
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                                @foreach ($dataWisata as $index => $wisata)
                                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex justify-center items-center">
                                                {{ $index + 1 }}
                                            </div>
                                        </th>
                                        <td class="px-6 py-4">
                                            @if ($wisata->foto_peserta)
                                                <img src="{{ asset('storage/' . $wisata->foto_peserta) }}"
                                                    alt="Foto Peserta" class="w-16 h-16 rounded-full">
                                            @else
                                                Tidak Ada Foto
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center">
                                                {{ $wisata->nama_peserta }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center">
                                                {{ $wisata->jenis_kelamin }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center">
                                                {{ $wisata->nik }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center">
                                                {{ $wisata->tempat_lahir }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center">
                                                {{ $wisata->tanggal_lahir }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center">
                                                {{ $wisata->no_paspor }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center">
                                                {{ $wisata->date_of_issued }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center">
                                                {{ $wisata->date_of_expiry }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center">
                                                {{ $wisata->issuing_office }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-green-300 text-center">
                                            <div class="flex justify-center items-center">
                                                <i class="fa-solid fa-circle-check">{{ $wisata->jenis_hubungan }} </i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tambah Data Hubungan -->
            <div class="mt-8">
                <label class="block text-md mb-3 font-medium text-gray-700">Tambah Data</label>
                <!-- Wrapper Input -->
                <div class="relative mb-4">
                    <!-- Icon Search -->
                    <i
                        class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>

                    <!-- Input -->
                    <input type="text" placeholder="Cari data"
                        class="pl-12 pr-4 py-4 w-[400px] h-[40px] border text-black rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="overflow-x-auto mt-1 rounded-xl">
                    <table
                        class="w-full min-w-max rounded-xl text-md font-semibold bg-white text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-md text-gray-700 dark:text-gray-400">
                            <tr class=" border-b">
                                <th scope="col" class="px-10 py-8"></th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Jamaah
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sex
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NIK/No. KTP
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tempat Lahir
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Lahir
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    No. Paspor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date of Issued
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date of Expiry
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Issuing Office
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Hubungan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($dataWisata as $index => $wisata)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex justify-center items-center">
                                        <input type="checkbox"
                                            class="w-5 h-5 rounded border-gray-300 text-green-500 focus:ring-green-500">
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    @if ($wisata->foto_peserta)
                                        <img src="{{ asset('storage/' . $wisata->foto_peserta) }}"
                                            alt="Foto Peserta" class="w-16 h-16 rounded-full">
                                    @else
                                        Tidak Ada Foto
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ $wisata->nama_peserta }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ $wisata->jenis_kelamin }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ $wisata->nik }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ $wisata->tempat_lahir }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ $wisata->tanggal_lahir }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ $wisata->no_paspor }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ $wisata->date_of_issued }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ $wisata->date_of_expiry }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center">
                                        {{ $wisata->issuing_office }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-green-300 text-center">
                                    <div class="flex justify-center items-center">
                                        <i class="fa-solid fa-circle-check">{{ $wisata->jenis_hubungan }} </i>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="flex items-center my-12 justify-between">

            <!-- Header Dashboard -->
            <div>
                <button type="submit">Simpan</button>
                <a href="/dashboard"
                    class="bg-green-500 text-white text-sm ml-2 px-5 py-3 rounded-lg hover:bg-green-600 transition">
                    Simpan
                </a>
            </div>
        </div>
    </div>
</form>
