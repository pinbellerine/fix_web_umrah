document.addEventListener("DOMContentLoaded", function () {
    const menuButton = document.querySelector("[data-collapse-toggle]");
    const menu = document.getElementById("navbar-sticky");

    if (menuButton && menu) {
        menuButton.addEventListener("click", function () {
            menu.classList.toggle("hidden"); // Menampilkan atau menyembunyikan menu
        });
    }
});
