<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP - Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <?php include('templates/header.php') ?>
    <link href="../css/signin.css" rel="stylesheet" />
</head>

<body class="text-center bg-grad">
    <div class="container">
        <form class="form-signin bg-light rounded-3 shadow" action="../controller/checklogin.php" method="POST">
            <img class="mb-4" src="../images/logo.jpg" width="72" height="72" />
            <h1 class="h3 mb-3">Ingresar al sistema</h1>
            <div class="field">
                <i class="icon fas fa-user"></i>
                <input type="email" name="inputEmail" class="form-control" placeholder="Ingrese su usuario" required autofocus />
            </div>
            <div class="field">
                <i class="icon fas fa-key"></i>
                <input type="password" name="inputPassword" class="form-control" placeholder="Ingrese su clave" required />
            </div>
            <p class="my-2 text-danger">Usuario o password incorrectos, por favor vuelva a ingresarlos.</p>
            <button type="submit" class="btn btn-primary btn-lg btn-block w-100 mb-3">Ingresar <i class="fas fa-sign-in-alt"></i></button>
            <div> 
                <a class="link" href="altaUsuario.php">Registrate</a>
            </div>            
        </form>
    </div>

    <!-- Optional JavaScript -->
    <?php include('templates/footer.php') ?>
</body>