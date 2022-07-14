<?php
require_once('../controller/checkSession.php');
require_once("templates/menu.php");
?>

<!doctype html>
<html lang="en">

<head>
    <title>PHP - Listado de Usuarios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php include('templates/header.php'); ?>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body class="bg-grad">
    <header>
        <?= menu_bs('u'); ?>
    </header>

    <div class="d-flex justify-content-center align-items-center my-7">
        <div class="container text-center bg-light rounded-3 shadow">
            <div class="py-4 text-center">
                <img class="d-block mx-auto mb-4" src="../images/logo.jpg" alt="Logo caba" width="72" height="72">
                <h2>Usuarios</h2>
                <p class="lead">Listado de Usuarios</p>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-sm bg-light">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Contraseña</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../dao/UsuarioDAO.php");
                        $dao = new UsuarioDAO();
                        $listaUsu = $dao->listarUsuarios();
                        //var_dump($listaUsu);

                        for ($i = 0; $i < count($listaUsu); $i++) {
                        ?>
                            <tr>
                                <td><?php echo $listaUsu[$i]["idusuario"] ?></td>
                                <td><?php echo $listaUsu[$i]["usuario"] ?></td>
                                <td><?php echo $listaUsu[$i]["clave"] ?></td>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <?php include('templates/footer.php'); ?>
</body>

</html>