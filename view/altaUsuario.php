<?php
require_once("templates/menu.php");

if (!isset($_SESSION)) {
    session_start();
}

$sesion_activa = isset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Alta de usuario</title>

    <!-- bootstrap -->
    <?php include('templates/header.php'); ?>
    <link href="../css/signin.css" rel="stylesheet" />
</head>

<body class="bg-grad">
    <?php
    if ($sesion_activa) {
    ?>
        <header>
            <?= menu_bs('a'); ?>
        </header>
    <?php
    }
    ?>
    <div class="container <?php if ($sesion_activa) {
                                echo 'mt-4';
                            } ?>">
        <form class="form-user from-max-width shadow bg-light rounded-3 needs-validation" id="form-alta" action="../controller/checkUsuario.php" method="post">
            <div class=" text-center">
                <img src="../images/logo.jpg" alt="Logo CABA" width="72" height="72" class="d-flex mx-auto mb-4">
                <h2>Alta de Usuario</h2>
                <p class="lead">Página que nos permite dar de alta un usuario para luego login</p>
            </div>

            <div class="row">
                <div class="col-12 mb-2 field">
                    <!-- <label for="usuario" class="form-label">Usuario</label> -->
                    <i class="icon fas fa-envelope"></i>
                    <input type="email" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    <div class="invalid-feedback">
                        El email debe contener un @
                    </div>
                </div>
                <div class="col-12 mb-2 field">
                    <i class="icon fas fa-user"></i>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre y apellido" required>
                    <div class="invalid-feedback">
                        El nombre debe contener un alfabético
                    </div>
                </div>
                <div class="col-12 mb-2 field">
                    <i class="icon fas fa-lock"></i>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese una contraseña" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                    <div class="invalid-feedback">
                        La contraseña debe tener más de 8 dígitos, contener letras minúsuculas y mayúsculas y algún dígito
                    </div>
                </div>
                <div class="col-12 mb-2 field">
                    <i class="icon fas fa-key"></i>
                    <input type="password" class="form-control" id="password-c" name="password-c" placeholder="Confirme la contraseña ingresada" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                    <div class="invalid-feedback">
                        La contraseña debe tener más de 8 dígitos, contener letras minúsuculas y mayúsculas y algún dígito
                    </div>
                </div>
            </div>

            <hr class="mb-4">

            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary btn-lg w-100" type="submit">Enviar <i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </form>

        <div class="modal fade" id="mensaje" tabindex="-1" aria-labelledby="mensajeLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="mensajeLabel">Atención!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="mensaje-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bootstrap -->
    <?php include('templates/footer.php'); ?>
    <script src="../js/user-validation.js"></script>
</body>

</html>