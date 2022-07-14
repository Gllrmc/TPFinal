<?php 
class ProvinciaDAO {
      
    public function listarProvincias() {
        require_once("../dataBase/ConexionDB.php");
        require_once("../model/Provincia.php");

        $con = new ConexionDB();
        $con->conectar();
        $result = $con->ejecutar("SELECT * FROM provincias");

        while ($provincia = $result->fetch_assoc()) {            
            $provObj = new Provincia(  $provincia["idprovincia"]  , 
                                      $provincia["nombre"]
                                    );

            $listProvincias[] = $provObj;
        }

        return $listProvincias;
    }

    public function getProvinciaID($id) {
        require_once("../dataBase/ConexionDB.php");
        require_once("../model/Provincia.php");

        $con = new ConexionDB();
        $con->conectar();
        $result = $con->ejecutar("SELECT * FROM provincias WHERE idprovincia = $id");

        while ($provincia = $result->fetch_assoc()) {            
            $provObj = new Provincia(  $provincia["idprovincia"]  , 
                                       $provincia["nombre"]
                                    );            
        }

        return $provObj;
    }
}

?>