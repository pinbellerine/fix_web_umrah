document.addEventListener("DOMContentLoaded", function () {
    function openDel(event) {
        event.stopPropagation(); // Mencegah event bubbling jika ada event di elemen induk
        document.getElementById("surat1modal").classList.remove("hidden");
    }

    function closeDel() {
        document.getElementById("surat1modal").classList.add("hidden");
    }

    // Event listener untuk tombol buka modal
    document.querySelectorAll("[data-open-surat1]").forEach(btn => {
        btn.addEventListener("click", openDel);
    });

    // Event listener untuk tombol tutup modal
    document.querySelectorAll("[data-close-surat1]").forEach(btn => {
        btn.addEventListener("click", closeDel);
    });

    // Menutup modal jika klik di luar modal
    document.addEventListener("click", function (event) {
        let modal = document.getElementById("surat1modal");
        if (!modal.contains(event.target) && !event.target.matches("[data-open-surat1]")) {
            closeDel();
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    function openDel(event) {
        event.stopPropagation(); // Mencegah event bubbling jika ada event di elemen induk
        document.getElementById("surat2modal").classList.remove("hidden");
    }

    function closeDel() {
        document.getElementById("surat2modal").classList.add("hidden");
    }

    // Event listener untuk tombol buka modal
    document.querySelectorAll("[data-open-surat2]").forEach(btn => {
        btn.addEventListener("click", openDel);
    });

    // Event listener untuk tombol tutup modal
    document.querySelectorAll("[data-close-surat2]").forEach(btn => {
        btn.addEventListener("click", closeDel);
    });

    // Menutup modal jika klik di luar modal
    document.addEventListener("click", function (event) {
        let modal = document.getElementById("surat2modal");
        if (!modal.contains(event.target) && !event.target.matches("[data-open-surat2]")) {
            closeDel();
        }
    });
});
