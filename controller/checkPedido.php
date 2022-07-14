<?php 
    $nombre = $_POST['firstName'];
    $apellido = $_POST['lastName'];
    $usuario = $_POST['username'];
    $mail = $_POST['email'];
    $lugarentrega = $_POST['address'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];
    $codpostal = $_POST['zip'];
    $formadepago = $_POST['paymentMethod'];
    $tarjtitular = $_POST['cc-name'];
    $tarjnumero = $_POST['cc-number'];
    $tarjvto = $_POST['cc-expiration'];
    $tarjclave = $_POST['cc-cvv'];

    //Este paso es necesario porque trabajamos con POO
    //Creamos un objeto Pedido para luego guardarlo en la DB
    require_once("../model/Pedido.php");
    require_once("../dao/LocalidadDAO.php");
    require_once("../dao/UsuarioDAO.php");

    $locDAO = new LocalidadDAO();
    $localidadObj = $locDAO->getLocalidadID($localidad);

    $usuarioDAO = new UsuarioDAO();
    $usuarioObj = $usuarioDAO->getUsuarioNombre($usuario);

    $pedido = new Pedido(null, $usuarioObj, $mail, $lugarentrega, $localidadObj, $codpostal, $formadepago, $tarjtitular, $tarjnumero, $tarjvto, $tarjclave);
    
    require_once("../dao/PedidoDAO.php");

    $pedidoDAO = new PedidoDAO();
    $guardoOk = $pedidoDAO->guardarPedido($pedido);

    if ($guardoOk) {
        header("Location: ../view/mensajeOk.php");
        exit;    
    } else {
        header("Location: ../view/mensajeError.php");
        exit;    
    }  
?>