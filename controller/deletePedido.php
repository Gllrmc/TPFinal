<?php
  $_POST = json_decode(file_get_contents('php://input'),true);

  $idpedido = isset($_POST['id'])? $_POST['id'] : '';

  if ($idpedido) {
    require_once('../dao/PedidoDAO.php');

    $pedidoDAO = new PedidoDAO();
    $eliminadoOK = $pedidoDAO->eliminarPedido($idpedido);

    if ($eliminadoOK) {      
      echo json_encode('OK');
    } else {
      echo json_encode('error');
    }
  }

?>