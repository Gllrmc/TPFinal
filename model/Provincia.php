<?php

class Provincia {  
  private $idprovincia;
  private $nombre;

  public function __construct($idprovincia, $nombre)
  {
    $this->idprovincia = $idprovincia;
    $this->nombre = $nombre;
  }

  /**
   * Get the value of idprovincia
   */
  public function getIdprovincia()
  {
    return $this->idprovincia;
  }

  /**
   * Set the value of idprovincia
   */
  public function setIdprovincia($idprovincia): self
  {
    $this->idprovincia = $idprovincia;

    return $this;
  }

  /**
   * Get the value of nombre
   */
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * Set the value of nombre
   */
  public function setNombre($nombre): self
  {
    $this->nombre = $nombre;

    return $this;
  }
}

?>