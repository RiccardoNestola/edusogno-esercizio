function showPassword() {
    const passwordInput = document.getElementById("password");
    const toggleBtn = document.querySelector(".icon-toggle button");

    passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    toggleBtn.innerHTML =
        passwordInput.type === "password"
            ? '<ion-icon name="eye-off"></ion-icon>'
            : '<ion-icon name="eye"></ion-icon>';
}

