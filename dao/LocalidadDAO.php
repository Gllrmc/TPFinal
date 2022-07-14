<?php 
class LocalidadDAO {
      
    public function listarLocalidades() {
        require_once("../dataBase/ConexionDB.php");
        require_once("../model/Localidad.php");
        require_once("ProvinciaDAO.php");

        $con = new ConexionDB();
        $con->conectar();
        $result = $con->ejecutar("SELECT * FROM localidades ORDER BY nombre");
        
        $provDAO = new ProvinciaDAO();

        while ($localidad = $result->fetch_assoc()) {
            //todo: cargar todos los datos del pedido           
            $provincia = $provDAO->getProvinciaID($localidad["idprovincia"]);

            $locObj = new Localidad(  $localidad["idlocalidad"]  , 
                                      $localidad["nombre"]       ,
                                      $provincia
                                    );

            $listLocalidades[] = $locObj;
        }

        return $listLocalidades;

    }

    public function getLocalidadesIDProv($id) {
        require_once("../dataBase/ConexionDB.php");
        require_once("../model/Localidad.php");
        require_once("ProvinciaDAO.php");

        $con = new ConexionDB();
        $con->conectar();
        $result = $con->ejecutar("SELECT * FROM localidades WHERE idprovincia = $id ORDER BY nombre");
        
        $provDAO = new ProvinciaDAO();

        while ($localidad = $result->fetch_assoc()) {
            //todo: cargar todos los datos del pedido           
            $provincia = $provDAO->getProvinciaID($localidad["idprovincia"]);

            $locObj = new Localidad(  $localidad["idlocalidad"]  , 
                                      $localidad["nombre"]       ,
                                      $provincia
                                    );

            $listLocalidades[] = $locObj;
        }

        return $listLocalidades;

    }

    public function getLocalidadID($id) {
        require_once("../dataBase/ConexionDB.php");
        require_once("../model/Localidad.php");
        require_once("ProvinciaDAO.php");

        $con = new ConexionDB();
        $con->conectar();
        $result = $con->ejecutar("SELECT * FROM localidades WHERE idlocalidad = $id");
        
        $provDAO = new ProvinciaDAO();

        while ($localidad = $result->fetch_assoc()) {
            //todo: cargar todos los datos del pedido           
            
            $provincia = $provDAO->getProvinciaID($localidad["idprovincia"]);
            
            $locObj = new Localidad(  $localidad["idlocalidad"]  , 
                                      $localidad["nombre"]       ,
                                      $provincia
                                    );
        }

        return $locObj;

    }
}

?>