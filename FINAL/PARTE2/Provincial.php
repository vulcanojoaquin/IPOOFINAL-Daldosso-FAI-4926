<?php
include_once 'Torneo.php';
class Provincial extends Torneo{
    private $nombreProvincia;
    public function __construct($idTorneo,$montoPremio,$colPartidos,$localidad, $nombreProvincia ){
        parent::__construct($idTorneo,$montoPremio,$colPartidos,$localidad );
        $this->nombreProvincia=$nombreProvincia;
    }

    public function getNombreProvincia()
    {
        return $this->nombreProvincia;
    }
 
    public function setNombreProvincia($nombreProvincia)
    {
        $this->nombreProvincia = $nombreProvincia;
    }

 public function __toString(){
    return parent::__toString()."nombre provincia: ".$this->getNombreProvincia();
 }
    
}