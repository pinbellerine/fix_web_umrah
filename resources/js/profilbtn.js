document.addEventListener("DOMContentLoaded", function () {
    const profileButton = document.getElementById("profileButton");
    const logoutButton = document.getElementById("logoutButton");
    const divButton = document.getElementById("divButton");

    profileButton.addEventListener("click", function () {
        // Toggle tombol keluar
        logoutButton.classList.toggle("hidden");

        // Tambah atau hapus background abu-abu pada tombol profil
        divButton.classList.toggle("bg-gray-400");
        divButton.classList.toggle("bg-opacity-50");
    });
});
