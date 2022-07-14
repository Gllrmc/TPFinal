<?php
    require_once("templates/menu.php");

    if (!isset($_SESSION)) {
		session_start();
	}
    
    $sesion_activa = isset($_SESSION['user']);
?>

<!doctype html>
<html lang="en">

<head>
    <title>PHP - OK</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php include('templates/header.php') ?>
    <link href="../css/estilo.css" rel="stylesheet" />
</head>

<body class="bg-grad">
    <?php        
        if ($sesion_activa) {
        ?>
            <header>
                <?= menu_bs(''); ?>
            </header>
        <?php
        }
    ?>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container text-center bg-light rounded-3 shadow w-75 w-lg-50">
            <div class="py-4 text-center">
                <img src="../images/logo.jpg" alt="Logo CABA" width="72" height="72" class="d-flex mx-auto mb-4">
                <h2 class="text-success mb-5">La operación se realizó correctamente</h2>
                <a class="btn btn-outline-primary btn-lg" href="../index.php">Inicio</a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <?php include('templates/footer.php') ?>    
</body>

</html>