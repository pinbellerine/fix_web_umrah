@props(['dataTransaksi'])


<div class="w-dvh my-8 px-6 py-10 bg-white text-white rounded-2xl">
    <!-- Navbar -->
    <div class="flex items-center justify-between w-full px-4">
    <!-- Header Dashboard -->
    <div>
        <h2 class="text-2xl font-medium text-black">Transaksi Terbaru</h2>
    </div>

    <!-- Button -->
    <button class=" text-white bg-[#5CC1F3] hover:bg-blue-300 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 flex items-center gap-2">
        <span class="selectedOption">Seluruh Data</span>
        <i class="fa-solid fa-chevron-right"></i>
    </button>
</div>


    <div class="relative overflow-x-auto mt-4 mb-2 sm:rounded-3xl p-6 bg-[#EFF3F4]">
        <table class="w-full text-md font-semibold bg-white rounded-lg text-left rtl:text-right text-gray-500">
            <thead class="text-md text-gray-700">
                <tr class=" border-b">
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal setor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bukti
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataTransaksi as $transaksi)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="{{ asset('storage/' . $transaksi->foto_bukti_transaksi) }}" alt="Foto" class="w-10 h-10 rounded-full">
                            {{-- Atau kalau mau pakai foto asli dari database --}}
                            {{-- <img src="{{ asset('storage/' . $transaksi->foto_bukti_transaksi) }}" alt="Foto" class="w-10 h-10 rounded-full"> --}}
                        </th>
                        <td class="px-6 py-4">
                            {{ $transaksi->nama_peserta }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($transaksi->tanggal_pembayaran)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4 text-green-500">
                            Rp{{ number_format($transaksi->total_tagihan, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex justify-center rounded-md items-center bg-blue-200 text-blue-500">
                                Lihat Bukti
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
