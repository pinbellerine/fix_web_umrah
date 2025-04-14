document.getElementById("btn-masuk").addEventListener("click", function () {
    document.getElementById("forgot-first").classList.add("hidden");
    document.getElementById("forgot-sec").classList.remove("hidden");
});

document.getElementById("btn-masuk2").addEventListener("click", function () {
    document.getElementById("forgot-sec").classList.add("hidden");
    document.getElementById("forgot-third").classList.remove("hidden");
});

document.getElementById("btn-masuk3").addEventListener("click", function () {
    document.getElementById("forgot-third").classList.add("hidden");
    document.getElementById("forgot-fourth").classList.remove("hidden");
});
