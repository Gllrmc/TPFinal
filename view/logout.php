<?php
    require_once('../controller/checkSession.php');
    require_once('../controller/sessionLogout.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('templates/header.php') ?>
    <link rel="stylesheet" href="../css/estilo.css">
    <title>PHP</title>
</head>

<body class="bg-grad">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container text-center bg-light rounded-3 shadow w-75 w-lg-50">
            <div class="py-4 text-center">
                <img class="d-block mx-auto mb-4" src="../images/logo.jpg" alt="Logo caba" width="72" height="72">
                <h1>Gracias por su visita!</h1>
                <div class="mt-5">
                    <a class="btn btn-warning btn-lg" href="../index.php"><i class="fas fa-home"></i> Inicio</a>
                </div>
            </div>
        </div>
    </div>
    <?php include('templates/footer.php') ?>
</body>

</html>