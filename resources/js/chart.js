import ApexCharts from 'apexcharts';

document.addEventListener("DOMContentLoaded", function () {
    // Mapping tipe data ke pesan judul
    const titles = {
        "datawl": "Peserta Wisata Luar Negeri",
        "datajh": "Peserta Jamaah Haji",
        "datawd": "Peserta Wisata Domestik",
        "dataju": "Peserta Jamaah Umrah"
    };

    // Data berdasarkan filter dropdown
    const dataSeries = {
        "datawl": {
            "5 Tahun": [100, 200, 300, 400, 500],
            "1 Tahun": [50, 100, 150, 200, 250],
            "1 Bulan": [10, 20, 30, 40, 50],
            "1 Minggu": [2, 4, 6, 8, 10]
        },
        "datajh": {
            "5 Tahun": [150, 250, 350, 450, 550],
            "1 Tahun": [75, 125, 175, 225, 275],
            "1 Bulan": [15, 25, 35, 45, 55],
            "1 Minggu": [3, 5, 7, 9, 11]
        },
        "datawd": {
            "5 Tahun": [200, 300, 400, 500, 600],
            "1 Tahun": [100, 150, 200, 250, 300],
            "1 Bulan": [20, 30, 40, 50, 60],
            "1 Minggu": [4, 6, 8, 10, 12]
        },
        "dataju": {
            "5 Tahun": [120, 220, 320, 420, 520],
            "1 Tahun": [60, 110, 160, 210, 260],
            "1 Bulan": [12, 22, 32, 42, 52],
            "1 Minggu": [2, 4, 6, 8, 10]
        }
    };

    // Ambil semua elemen chart
    document.querySelectorAll(".chart").forEach(chartElement => {
        let chartType = chartElement.dataset.type; // Ambil tipe data
        let chartId = chartElement.id; // Ambil ID chart
        let titleElement = document.getElementById(`title-${chartId}`); // Ambil elemen judul
        let dropdownButton = document.querySelector(`[data-chart-id="${chartId}"]`); // Dropdown terkait
        let selectedOption = dropdownButton.querySelector(".selectedOption"); // Span untuk teks
        let dropdownMenu = dropdownButton.nextElementSibling; // Ambil menu dropdown
        let dropdownIcon = dropdownButton.querySelector("i"); // Ambil ikon dropdown

        // Set teks judul jika ada
        if (titleElement && titles[chartType]) {
            titleElement.innerText = titles[chartType];
        }

        // Konfigurasi awal chart
        let options = {
            chart: { type: 'bar', height: 350 },
            series: [{ name: 'Jumlah Data', data: dataSeries[chartType]["5 Tahun"] }],
            xaxis: { categories: ['2020', '2021', '2022', '2023', '2024'] }
        };

        // Render chart hanya jika belum ada
        let chart = new ApexCharts(chartElement, options);
        chart.render();

        // Toggle dropdown
        dropdownButton.addEventListener("click", function () {
            dropdownMenu.classList.toggle("hidden");

            // Rotasi ikon dropdown
            if (dropdownMenu.classList.contains("hidden")) {
                dropdownIcon.classList.remove("fa-chevron-down");
                dropdownIcon.classList.add("fa-chevron-right");
            } else {
                dropdownIcon.classList.remove("fa-chevron-right");
                dropdownIcon.classList.add("fa-chevron-down");
            }
        });

        // Pilih opsi dari dropdown
        dropdownMenu.querySelectorAll(".dropdown-item").forEach(item => {
            item.addEventListener("click", function (event) {
                event.preventDefault();

                // Update teks di tombol dropdown
                selectedOption.textContent = this.getAttribute("data-value");

                // Hapus kelas aktif dari semua item dropdown
                dropdownMenu.querySelectorAll(".dropdown-item").forEach(i => i.classList.remove("bg-blue-500", "text-white"));

                // Tambahkan kelas aktif ke item yang dipilih
                this.classList.add("bg-blue-500", "text-white");

                // Update chart dengan data yang sesuai
                chart.updateSeries([{ name: 'Jumlah Data', data: dataSeries[chartType][this.dataset.value] }]);

                // Sembunyikan dropdown setelah memilih opsi
                dropdownMenu.classList.add("hidden");

                // Kembalikan ikon ke panah kanan
                dropdownIcon.classList.remove("fa-chevron-down");
                dropdownIcon.classList.add("fa-chevron-right");
            });
        });

        // Tutup dropdown jika klik di luar
        document.addEventListener("click", function (event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");

                // Pastikan ikon panah kembali ke kanan saat dropdown ditutup
                dropdownIcon.classList.remove("fa-chevron-down");
                dropdownIcon.classList.add("fa-chevron-right");
            }
        });

        // Set default pilihan yang aktif (5 Tahun)
        dropdownMenu.querySelectorAll(".dropdown-item").forEach(item => {
            if (item.getAttribute("data-value") === "5 Tahun") {
                item.classList.add("bg-blue-500", "text-white");
            }
        });

        // Set panah awalnya mengarah ke kanan
        dropdownIcon.classList.add("fa-chevron-right");
    });
});
