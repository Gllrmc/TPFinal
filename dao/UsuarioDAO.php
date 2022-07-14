<?php 
class UsuarioDAO {

    public function validarUsuYPass($usu, $pass) {
        require_once("../dataBase/ConexionDB.php");

        $conexionDB = new ConexionDB();
        $conexionDB->conectar();

        $sql ="SELECT * FROM usuarios WHERE usuario = '$usu' AND clave='$pass'";
        $conexionDB->ejecutar($sql);

        $existeUsuYPass = $conexionDB->cantFilas() > 0;
        if ($existeUsuYPass) {
            return true;
        } else {
            return false;
        }
        
    }

    public function validarUsu($usu) {
        require_once("../dataBase/ConexionDB.php");

        $conexionDB = new ConexionDB();
        $conexionDB->conectar();

        $sql ="SELECT * FROM usuarios WHERE usuario = '$usu'";
        $conexionDB->ejecutar($sql);

        $existeUsu = $conexionDB->cantFilas() > 0;
        if ($existeUsu) {
            return true;
        } else {
            return false;
        }
        
    }

    public function guardarUsuario($usuario, $password, $nombre) {
        require_once("../dataBase/ConexionDB.php");

        $conexionDB = new ConexionDB();
        $conexionDB->conectar();

        $sql="INSERT INTO usuarios(usuario, clave, nombreyapellido) VALUES ('$usuario','$password','$nombre')";

        try {

            $conexionDB->ejecutar($sql);
            return $conexionDB->cantFilas() > 0;

        } catch (Exception $e) {
            
            return false;

        }

    }

    public function listarUsuarios() {
        require_once("../dataBase/ConexionDB.php");

        $conexionDB = new ConexionDB();
        $conexionDB->conectar();

        $sql="SELECT * FROM usuarios";
        $result = $conexionDB->ejecutar($sql);

        while ($usu = $result->fetch_assoc()) {
            $listaUsu[] = $usu;
        }

        return $listaUsu;
    }

    public function getUsuarioID($id) {
        require_once("../dataBase/ConexionDB.php");
        require_once("../model/Usuario.php");        

        $con = new ConexionDB();
        $con->conectar();
        $result = $con->ejecutar("SELECT * FROM usuarios WHERE idusuario = $id");

        while ($usuario = $result->fetch_assoc()) {                        
            $usuObj = new Usuario(  $usuario["idusuario"]       , 
                                    $usuario['clave']           ,
                                    $usuario["nombreyapellido"]
                                );
            $usuObj->setIdUsuario($id);
        }

        return $usuObj;

    }

    public function getUsuarioNombre($usuario) {
        require_once("../dataBase/ConexionDB.php");
        require_once("../model/Usuario.php");        

        $con = new ConexionDB();
        $con->conectar();
        $result = $con->ejecutar("SELECT * FROM usuarios WHERE usuario = '$usuario'");

        while ($usuario = $result->fetch_assoc()) {                        
            $usuObj = new Usuario(  $usuario["usuario"]         , 
                                    $usuario['clave']           ,
                                    $usuario["nombreyapellido"]
                                );
            $usuObj->setIdUsuario($usuario['idusuario']);
        }

        return $usuObj;

    }

}

?>