document.addEventListener("DOMContentLoaded", function () {
    const komentar = document.querySelector(".komentar");

    let posX = window.innerWidth / 2 - 700; // Mulai dari tengah
    let speed = 0.5; // Kecepatan tetap
    let direction = 1; // 1 = kanan, -1 = kiri

    function animate() {
        posX += speed * direction;
        komentar.style.transform = `translateX(${posX}px)`;

        const wrapperWidth = window.innerWidth;
        const komentarWidth = komentar.clientWidth;

        // Jika gambar melewati batas kanan layar, pantulkan
        if (posX + komentarWidth >= wrapperWidth + 270) {
            direction = -1; // Ubah arah ke kiri
        }

        // Jika gambar melewati batas kiri layar, pantulkan
        if (posX <= -320) { // Sesuaikan nilai ini dengan ukuran gambar
            direction = 1; // Ubah arah ke kanan
        }

        requestAnimationFrame(animate);
    }

    animate();
});

document.addEventListener("DOMContentLoaded", function () {
    const komentar = document.querySelector(".komentar2");

    let posX = window.innerWidth / 2 - 950; // Mulai dari tengah
    let speed = 0.5; // Kecepatan tetap
    let direction = -1; // Mulai dengan arah ke kiri

    function animate() {
        posX += speed * direction;
        komentar.style.transform = `translateX(${posX}px)`;

        const wrapperWidth = window.innerWidth;
        const komentarWidth = komentar.clientWidth;

        // Jika gambar melewati batas kiri layar, pantulkan ke kanan
        if (posX <= -320) {
            direction = 1; // Ubah arah ke kanan
        }

        // Jika gambar melewati batas kanan layar, pantulkan ke kiri
        if (posX + komentarWidth >= wrapperWidth + 270) {
            direction = -1; // Ubah arah ke kiri
        }

        requestAnimationFrame(animate);
    }

    animate();
});
