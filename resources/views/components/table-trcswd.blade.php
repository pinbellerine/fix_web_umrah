<table
    class="w-full min-w-max rounded-xl text-md font-semibold bg-white text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-md text-gray-700 dark:text-gray-400">
        <tr class=" border-b">
            <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
            </th>
            <th scope="col" class="px-6 py-3">
                Nama Peserta
            </th>
            <th scope="col" class="px-6 py-3">
                Tagihan
            </th>
            <th scope="col" class="px-6 py-3">
                Tanggal
            </th>
            <th scope="col" class="px-6 py-3">
                Setoran
            </th>
            <th scope="col" class="px-6 py-3">
                Kategori
            </th>
            <th scope="col" class="px-6 py-3">
                Keterangan
            </th>
        </tr>
    </thead>
    <tbody>
        <tr data-open-part class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                1
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
                    Rp.34.500.000
                </div>
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center items-center">
                    22-06-2024
                </div>
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center items-center">
                    Rp.34.500.000
                </div>
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center items-center">
                    Pelunasan
                </div>
            </td>
            <td class="px-8 py-4 text-center">
                <div class="flex justify-center rounded-md items-center bg-green-200 text-green-500">
                    Lunas
                </div>
            </td>
        </tr>
        <tr data-open-part class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                1
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
                    Rp.34.500.000
                </div>
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center items-center">
                    22-06-2024
                </div>
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center items-center">
                    Rp.34.500.000
                </div>
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center items-center">
                    DP
                </div>
            </td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center rounded-md items-center bg-red-200 text-red-500">
                    Belum Lunas
                </div>
            </td>
        </tr>
    </tbody>
</table>


<div id="partmodal" class="fixed text-black inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="shadow-lg w-[1185px] px-8 py-8 bg-white text-black rounded-2xl h-[550px] overflow-y-auto">
        <div class="flex items-center justify-between mb-8 relative">
            <!-- Header Dashboard (Di Kiri) -->
            <div class="px-2">
                <h2 class="text-xl font-medium text-black">Data Peserta</h2>
            </div>

            <!-- Tombol Close (Di Kanan) -->
            <button data-close-part class="text-gray-500 hover:text-gray-700 text-4xl">
                &times;
            </button>
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
                    <textarea readonly class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Sukardi Santari</textarea>


                    <!-- Foto Bukti -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-5">Foto Bukti Transaksi</label>
                    <div class="w-full bg-white rounded-lg p-2 text-center relative">
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-2">
                            <input type="file" id="fileInput" class="hidden" accept="image/*"
                                onchange="previewImage(event)">
                            <div class="flex flex-col items-center justify-center w-full h-[216px]">
                                <img src="{{ asset('/images/foto.jpeg') }}"
                                    class="w-full h-full object-cover rounded-lg" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div>
                    <!-- Total Tagihan -->
                    <label class="block text-sm mb-2 font-medium text-gray-700">Total Tagihan</label>
                    <textarea readonly class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Rp.34.500.000</textarea>

                    <!-- Tanggal Pembayaran -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Tanggal Pembayaran</label>
                    <input readonly type="date"
                        class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none"
                        value="2024-06-22"></input>

                    <!-- Setoran Tagihan -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Setoran Tagihan</label>
                    <textarea readonly class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Rp.34.500.000</textarea>

                    <!-- Kategori -->
                    <label class="block text-sm mb-2 font-medium text-gray-700 mt-4">Kategori</label>
                    <textarea readonly class="w-full h-[50px] bg-white text-sm px-2 py-1 border rounded-md mt-1 resize-none">Pelunasan</textarea>
                </div>
            </div>

            <!-- Keterangan -->
            <div class="mt-6">
                <label class="block text-sm mb-3 font-medium text-gray-700">Keterangan</label>
                <div class="flex items-center text-sm gap-x-4 space-x-4 mt-2">
                    <label class="flex items-center">
                        <input type="radio" name="gender" value="L" class="mr-2" checked disabled>
                        Lunas
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="gender" value="P" class="mr-2" disabled>
                        Belum Lunas
                    </label>
                </div>
            </div>
        </div>
