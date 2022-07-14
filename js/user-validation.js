let form = document.getElementById("form-alta");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    let password = document.getElementById("password").value;
    let password_c = document.getElementById("password-c").value;

    if (password !== password_c) {
        let mensajeModal = new bootstrap.Modal(document.getElementById("mensaje"), {});

        document.getElementById("mensaje-text").innerHTML = "Las contraseñas no coinciden";        
        mensajeModal.show();
        
        return false;
    } else {
        form.submit();
    }
});
