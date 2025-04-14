<div class="flex items-center justify-between my-8 mx-8">
        <!-- Header Dashboard -->
        <div class="px-2 flex items-center space-x-3">
            <a href="javascript:history.back()">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
            <h2 class="text-xl font-medium text-black">Ubah Data</h2>
        </div>
    </div>

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
            <textarea class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Sukardi Santari</textarea>


            <!-- Foto Diri -->
            <label class="block text-sm mb-2 font-medium text-gray-700 mt-5">Foto Diri</label>
            <div class="w-full bg-white rounded-lg p-2 text-center relative">
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-2">
                    <input type="file" id="fileInput" class="hidden" accept="image/*">
                    <label for="fileInput" class="cursor-pointer flex flex-col items-center justify-center w-full h-[120px]">
                        <!-- Hapus class "hidden" agar gambar langsung muncul -->
                        <img id="previewImage" src="{{ asset('images/foto.jpeg') }}" class="w-full h-full object-cover rounded-lg" />
                    </label>
                </div>
            </div>

        </div>

        <!-- Kolom Kanan -->
        <div>
            <!-- NIK/No. KTP -->
            <label class="block text-sm mb-2 font-medium text-gray-700">NIK/No. KTP</label>
            <textarea class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">3172032803800011</textarea>

            <!-- Tempat Lahir -->
            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Tempat Lahir</label>
            <textarea class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Banyumas</textarea>

            <!-- Tanggal Lahir -->
            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Tanggal Lahir</label>
            <input type="date" class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none" value="1983-03-28"></input>
        </div>
    </div>

    <!-- Jenis Kelamin -->
    <div class="mt-6">
        <label class="block text-sm mb-3 font-medium text-gray-700">Jenis Kelamin</label>
        <div class="flex items-center text-sm gap-x-4 space-x-4 mt-2">
            <label class="flex items-center">
                <input type="radio" name="gender" value="L" class="mr-2" checked>
                Laki-laki (L)
            </label>
            <label class="flex items-center">
                <input type="radio" name="gender" value="P" class="mr-2">
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
            <textarea class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">E6964776</textarea>

            <!-- Issuing office -->
            <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Issuing office</label>
            <textarea class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Cilacap</textarea>
        </div>

        <!-- Kolom Kanan -->
        <div>
            <!-- Date of issued -->
            <label class="block text-sm mb-2 font-medium text-gray-700">Date of issued</label>
            <input type="date" class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none" value="2024-03-01"></input>

            <!-- Tanggal Lahir -->
            <label class="block text-sm mb-2 font-medium text-gray-700 mt-5">Date of expiry</label>
            <input type="date" class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none" value="2024-03-01"></input>
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
                <input type="radio" name="gender" value="L" class="mr-2" checked>
                Keluarga
            </label>
            <label class="flex items-center">
                <input type="radio" name="gender" value="P" class="mr-2">
                Suami-istri
            </label>
        </div>
    </div>

    <!-- Data Hubungan -->
    <div class="mt-6">
        <label class="block text-md mb-3 font-medium text-gray-700">Data</label>
        <div class="overflow-x-auto mt-1 rounded-xl">
        <table class="w-full min-w-max rounded-xl text-md font-semibold bg-white text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex justify-center items-center">
                            1
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <img src="{{ asset('/images/foto.jpeg') }}" alt="Foto" class="w-10 h-10 rounded-full">
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            Sukardi Santari
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            L
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            3172032803800011
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            Banyumas
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            28-03-1983
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            E6964776
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            01-03-2024
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            01-03-2024
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            Cilacap
                        </div>
                    </td>
                    <td class="px-6 py-4 text-green-300 text-center">
                        <div class="flex justify-center items-center">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex justify-center items-center">
                            1
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <img src="{{ asset('/images/foto.jpeg') }}" alt="Foto" class="w-10 h-10 rounded-full">
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            Sukardi Santari
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            L
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            3172032803800011
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            Banyumas
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            28-03-1983
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            E6964776
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            01-03-2024
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            01-03-2024
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            Cilacap
                        </div>
                    </td>
                    <td class="px-6 py-4 text-red-500 text-center">
                        <div class="flex justify-center items-center">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </div>
                    </td>
                </tr>
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
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                
                <!-- Input -->
                <input type="text" placeholder="Cari data"
                    class="pl-12 pr-4 py-4 w-[400px] h-[40px] border text-black rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        <div class="overflow-x-auto mt-1 rounded-xl">
        <table class="w-full min-w-max rounded-xl text-md font-semibold bg-white text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex justify-center items-center">
                            <input type="checkbox" class="w-5 h-5 rounded border-gray-300 text-green-500 focus:ring-green-500">
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <img src="{{ asset('/images/foto.jpeg') }}" alt="Foto" class="w-10 h-10 rounded-full">
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            Sukardi Santari
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            L
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            3172032803800011
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            Banyumas
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            28-03-1983
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            E6964776
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            01-03-2024
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            01-03-2024
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            Cilacap
                        </div>
                    </td>
                    <td class="px-6 py-4 text-green-300 text-center">
                        <div class="flex justify-center items-center">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex justify-center items-center">
                            <input type="checkbox" class="w-5 h-5 rounded border-gray-300 text-green-500 focus:ring-green-500">
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <img src="{{ asset('/images/foto.jpeg') }}" alt="Foto" class="w-10 h-10 rounded-full">
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            Sukardi Santari
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            L
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            3172032803800011
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            Banyumas
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            28-03-1983
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            E6964776
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            01-03-2024
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            01-03-2024
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center">
                            Cilacap
                        </div>
                    </td>
                    <td class="px-6 py-4 text-red-500 text-center">
                        <div class="flex justify-center items-center">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>
    <div class="flex items-center my-12 justify-between">
    <!-- Header Dashboard -->
    <div>
        <a href="/dashboard" class="bg-green-500 text-white text-sm ml-2 px-5 py-3 rounded-lg hover:bg-green-600 transition">
            Simpan
        </a>
    </div>
</div>
</div>

