<?php 
class PedidoDAO {

    public function guardarPedido($pedido) {
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB();
        $conexionDB->conectar();
    
        $sql = "INSERT INTO pedidos
        (`usuario`, `mail`, `lugarentrega`, `localidad`, `codpostal`, `formadepago`, `tarjtitular`, `tarjnumero`, `tarjvto`, `tarjclave`) 
        VALUES (        
        '{$pedido->getUsuario()->getIdUsuario()}', 
        '{$pedido->getMail()}', 
        '{$pedido->getLugarentrega()}', 
         {$pedido->getLocalidad()->getIdlocalidad()},         
        '{$pedido->getCodpostal()}', 
        '{$pedido->getFormadepago()}', 
        '{$pedido->getTarjtitular()}', 
         {$pedido->getTarjnumero()}, 
        '{$pedido->getTarjvto()}', 
         {$pedido->getTarjclave()})";
        
        
        $conexionDB->ejecutar($sql);

        return $conexionDB->cantFilas() > 0;
    }
        
    public function listarPedidos() {
        require_once("../dataBase/ConexionDB.php");
        require_once("../model/Pedido.php");
        require_once("LocalidadDAO.php");
        require_once("UsuarioDAO.php");

        $con = new ConexionDB();
        $con->conectar();
        $result = $con->ejecutar("SELECT * FROM pedidos");

        $locDAO = new LocalidadDAO();
        $usuarioDAO = new UsuarioDAO();

        while ($pedido = $result->fetch_assoc()) {
            //todo: cargar todos los datos del pedido
            $localidad = $locDAO->getLocalidadID($pedido["localidad"]);
            $usuario = $usuarioDAO->getUsuarioID($pedido["usuario"]);

            $pedObj = new Pedido(   $pedido["idpedido"]     , 
                                    $usuario                ,
                                    $pedido["mail"]         ,
                                    $pedido["lugarentrega"] ,
                                    $localidad              ,                                    
                                    $pedido["codpostal"]    , 
                                    $pedido['formadepago']  ,
                                    $pedido['tarjtitular']  ,
                                    $pedido['tarjnumero']   ,
                                    $pedido['tarjvto']      ,
                                    $pedido['tarjclave']
                                );

            $listPedidos[] = $pedObj;
        }

        return $listPedidos;

    }

    public function eliminarPedido($id) {
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB();
        $conexionDB->conectar();
    
        $sql = "DELETE FROM pedidos WHERE idpedido = $id";
                
        $conexionDB->ejecutar($sql);

        return $conexionDB->cantFilas() > 0;
    }
}

?>