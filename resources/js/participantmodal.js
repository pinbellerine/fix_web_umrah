document.addEventListener("DOMContentLoaded", function () {
    function openPart(event) {
        // Cegah event bubbling agar elemen dalam <tr> (seperti tombol atau link) tidak memicu modal
        if (event.target.closest("a, button, [data-ignore-open]")) {
            return;
        }
        document.getElementById("partmodal").classList.remove("hidden");
    }

    function closePart() {
        document.getElementById("partmodal").classList.add("hidden");
    }

    // Event listener untuk elemen yang memiliki atribut data-open-part
    document.querySelectorAll("[data-open-part]").forEach(element => {
        element.addEventListener("click", openPart);
    });

    // Event listener untuk tombol tutup modal
    document.querySelectorAll("[data-close-part]").forEach(btn => {
        btn.addEventListener("click", closePart);
    });

    // Cegah klik pada elemen dalam tr (tombol, link, dsb.) agar tidak membuka modal
    document.querySelectorAll("a, button, [data-ignore-open]").forEach(element => {
        element.addEventListener("click", function (event) {
            event.stopPropagation();
        });
    });
});
