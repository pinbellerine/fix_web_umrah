document.addEventListener("DOMContentLoaded", function () {
    function openHub(event) {
        event.stopPropagation(); // Mencegah event bubbling jika tombol dalam elemen lain
        document.getElementById("hubmodal").classList.remove("hidden");
    }

    function closeHub() {
        document.getElementById("hubmodal").classList.add("hidden");
    }

    // Event listener untuk tombol buka modal
    document.querySelectorAll("[data-open-hub]").forEach(btn => {
        btn.addEventListener("click", openHub);
    });

    // Event listener untuk tombol tutup modal
    document.querySelectorAll("[data-close-hub]").forEach(btn => {
        btn.addEventListener("click", closeHub);
    });

    // Menutup modal jika klik di luar modal
    document.addEventListener("click", function (event) {
        let modal = document.getElementById("hubmodal");
        if (!modal.contains(event.target) && !event.target.matches("[data-open-hub]")) {
            closeHub();
        }
    });
});
