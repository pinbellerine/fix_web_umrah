document.addEventListener("DOMContentLoaded", function () {
    function openDel(event) {
        event.stopPropagation(); // Mencegah event bubbling jika ada event di elemen induk
        document.getElementById("delmodal").classList.remove("hidden");
    }

    function closeDel() {
        document.getElementById("delmodal").classList.add("hidden");
    }

    // Event listener untuk tombol buka modal
    document.querySelectorAll("[data-open-del]").forEach(btn => {
        btn.addEventListener("click", openDel);
    });

    // Event listener untuk tombol tutup modal
    document.querySelectorAll("[data-close-del]").forEach(btn => {
        btn.addEventListener("click", closeDel);
    });

    // Menutup modal jika klik di luar modal
    document.addEventListener("click", function (event) {
        let modal = document.getElementById("delmodal");
        if (!modal.contains(event.target) && !event.target.matches("[data-open-del]")) {
            closeDel();
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    function openRecov(event) {
        event.stopPropagation(); // Mencegah event bubbling jika ada event di elemen induk
        document.getElementById("recovmodal").classList.remove("hidden");
    }

    function closeRecov() {
        document.getElementById("recovmodal").classList.add("hidden");
    }

    // Event listener untuk tombol buka modal
    document.querySelectorAll("[data-open-recov]").forEach(btn => {
        btn.addEventListener("click", openRecov);
    });

    // Event listener untuk tombol tutup modal
    document.querySelectorAll("[data-close-recov]").forEach(btn => {
        btn.addEventListener("click", closeRecov);
    });

    // Menutup modal jika klik di luar modal
    document.addEventListener("click", function (event) {
        let modal = document.getElementById("recovmodal");
        if (!modal.contains(event.target) && !event.target.matches("[data-open-recov]")) {
            closeRecov();
        }
    });
});

