<?php  
  $_POST = json_decode(file_get_contents('php://input'),true);
  $provincia = isset($_POST['provincia'])?$_POST['provincia']:null;
  $salida = array();

  if($provincia) {
    require_once('../dao/LocalidadDAO.php');
    $locDAO = new LocalidadDAO();
    $localidades = $locDAO->getLocalidadesIDProv($provincia);

    foreach($localidades as $localidad) {
      $obj = array();
      $obj['id'] = $localidad->getIdlocalidad();
      $obj['nombre'] = $localidad->getNombre();
      $lista [] = $obj;
    }

    $salida['status'] = 0;
    $salida['data'] = $lista;
  } else {
    $salida['status'] = 1;
    $salida['data'] = '';
  }
  
  echo json_encode($salida);

?>