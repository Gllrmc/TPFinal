<?php
require_once('Provincia.php');

class Localidad {
  private $idlocalidad;
  private $nombre;
  private Provincia $provincia;

  public function __construct($idlocalidad, $nombre, Provincia $provincia)
  {
    $this->idlocalidad = $idlocalidad;
    $this->nombre = $nombre;
    $this->provincia = $provincia;
  }

  /**
   * Get the value of idlocalidad
   */
  public function getIdlocalidad()
  {
    return $this->idlocalidad;
  }

  /**
   * Set the value of idlocalidad
   */
  public function setIdlocalidad($idlocalidad): self
  {
    $this->idlocalidad = $idlocalidad;

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

  /**
   * Get the value of provincia
   */
  public function getProvincia()
  {
    return $this->provincia;
  }

  /**
   * Set the value of provincia
   */
  public function setProvincia($provincia): self
  {
    $this->provincia = $provincia;

    return $this;
  }
}
?>