document.addEventListener("DOMContentLoaded", function () {
    console.log("Password toggle script loaded!");

    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");

        if (!passwordInput || !eyeIcon) {
            console.error("Password input or eye icon not found!");
            return;
        }

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm7.5 0s-3-6-10.5-6S2 12 2 12s3 6 10.5 6S22.5 12 22.5 12zM4 4l16 16"/>`;
        } else {
            passwordInput.type = "password";
            eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm7.5 0s-3-6-10.5-6S2 12 2 12s3 6 10.5 6S22.5 12 22.5 12z" />`;
        }
    }

    window.togglePassword = togglePassword;
});
