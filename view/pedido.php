<?php
    require_once('../controller/checkSession.php');
    require_once('templates/menu.php');
    require_once('../dao/UsuarioDAO.php');

    $usuarioDAO = new UsuarioDAO();
    $usuarioObj = $usuarioDAO->getUsuarioNombre($_SESSION['user']);
    
    $usuario = '';
    $nombre= '';

    if (!empty($usuarioObj)) {
        $usuario = $usuarioObj->getUsuario();
        $nombre = $usuarioObj->getNombreYApellido();
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PHP - Registro de Pedido</title>

    <!-- Bootstrap core CSS -->
    <?php include('templates/header.php') ?>
    <link rel="stylesheet" href="../css/estilo.css" />
</head>

<body class="bg-grad">
    <header>
        <?= menu_bs('c'); ?>
    </header>
    <div class="d-flex justify-content-center align-items-center my-7">
        <div class="container bg-light rounded-3 shadow">
            <div class="py-4 text-center">
                <img class="d-block mx-auto mb-4" src="../images/logo.jpg" alt="Logo caba" width="72" height="72" />
                <h2>Formulario de Pedido</h2>
                <p class="lead">La fecha de entrega será coordinada telefónicamente.</p>
            </div>

            <div class="container">
                <h4 class="mb-3">Tu pedido</h4>
                <form class="needs-validation" novalidate action="../controller/checkPedido.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="username">Usuario</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" value="<?= $usuario; ?>" readonly />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Nombre y Apellido</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Tu nombre" value="<?= $nombre; ?>" readonly />
                        </div>                                            
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="email">Email <span class="text-muted">(Opcional)</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="tumail@gmail.com" />
                            </div>
                            <div class="invalid-feedback">El e-mail es inválido.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="address">Lugar de Entrega</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Calle, n°, piso, dpto, ..." required />
                            <div class="invalid-feedback">Faltó ingresar el domicilio de entrega.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <?php include('templates/provincias.php'); ?>
                        </div>
                        <div class="col-md-5 mb-3">
                            <?php include('templates/localidades.php'); ?>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Cod.Postal</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="" required />
                            <div class="invalid-feedback">Faltó ingresar el Código Postal.</div>
                        </div>
                    </div>

                    <hr class="mb-6" />

                    <h4 class="mb-3 text-center">Forma de Pago</h4>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-6 form-check d-flex justify-content-center">
                            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required />
                            <label class="form-check-label" for="credit">Tarjeta de Crédito</label>
                        </div>
                        <div class="col-12 col-sm-6 form-check d-flex justify-content-center">
                            <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required />
                            <label class="form-check-label" for="debit">Mercado Pago</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Nombre del Titular de la Tarjeta</label>
                            <input type="text" class="form-control" id="cc-name" name="cc-name" placeholder="" required />
                            <small class="text-muted">Nombre como se muestra en la tarjeta</small>
                            <div class="invalid-feedback">El nombre debe ser ingresado.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Número de la tarjeta</label>
                            <input type="text" class="form-control" id="cc-number" name="cc-number" placeholder="" required />
                            <div class="invalid-feedback">El n° es obligatorio.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3"></div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Fecha de Vto.</label>
                            <input type="text" class="form-control" id="cc-expiration" name="cc-expiration" placeholder="" required />
                            <div class="invalid-feedback">Falta ingresar la fecha de Vto.</div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">Código</label>
                            <input type="text" class="form-control" id="cc-cvv" name="cc-cvv" placeholder="" required />
                            <div class="invalid-feedback">N° de seguridad obligatorio.</div>
                        </div>
                    </div>
                    <hr class="mb-4" />
                    <div class="row text-center">
                        <div class="col">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Ingresar la Solicitud</button>
                        </div>
                    </div>
                </form>
            </div>
            <footer class="my-4 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2017-2022 Codo a Codo</p>
            </footer>
        </div>
    </div>

    <?php include('templates/footer.php') ?>
    <script src="../js/form-validation.js"></script>    
</body>

</html>