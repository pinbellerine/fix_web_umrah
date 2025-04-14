<div class="relative mx-2 px-10 py-8 mb-2 bg-[#EFF3F4] p-6 rounded-xl">
                    <!-- Judul -->
                    <div class="text-left mb-6">
                        <h2 class="text-lg font-semibold">Hubungan</h2>
                    </div>

                    <!-- Data Hubungan -->
                    <div class="mt-6">
                        <label class="block text-md mb-3 font-medium text-gray-700">Data</label>
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
                                            NIK/No. KTP
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
                                            <img src="{{ asset('/images/foto.jpeg') }}" alt="Foto"
                                                class="w-10 h-10 rounded-full">
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center">
                                                Sukardi Santari
                                            </div>
                                        </td>
                                        <td class="px-10 py-4 text-center">
                                            <div
                                                class="flex justify-center rounded-md py-2 items-center bg-purple-200 text-purple-400">
                                                Perempuan
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center">
                                                3302000303010001
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div
                                                class="flex justify-center items-center gap-2 bg-red-200 text-red-500 py-2 px-4 rounded-md w-fit mx-auto">
                                                <span>Hubungan</span>
                                                <i class="fa-solid fa-angle-right"></i>
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
                            <i
                                class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>

                            <!-- Input -->
                            <input type="text" placeholder="Cari data"
                                class="pl-12 pr-4 py-4 w-[400px] h-[40px] border text-black rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="overflow-x-auto mt-1 rounded-xl">
                            <table
                                class="w-full min-w-max rounded-xl text-md font-semibold bg-white text-left rtl:text-right text-gray-500">
                                <thead class="text-md text-gray-700">
                                    <tr class=" border-b text-center">
                                        <th scope="col" class="px-6 py-3">

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
                                            NIK/No. KTP
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr data-open-part class="bg-white hover:bg-gray-50 text-black text-center">
                                        <th scope="row"
                                            class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex justify-center items-center">
                                                <input type="checkbox"
                                                    class="w-5 h-5 rounded border-gray-300 text-green-500 focus:ring-green-500">
                                            </div>
                                        </th>
                                        <td class="px-6 py-4">
                                            <img src="{{ asset('/images/foto.jpeg') }}" alt="Foto"
                                                class="w-10 h-10 rounded-full">
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center">
                                                Sukardi Santari
                                            </div>
                                        </td>
                                        <td class="px-10 py-4 text-center">
                                            <div
                                                class="flex justify-center rounded-md py-2 items-center bg-purple-200 text-purple-400">
                                                Perempuan
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center">
                                                3302000303010001
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>