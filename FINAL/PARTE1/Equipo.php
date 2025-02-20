<?php
class Equipo{
    private $nombre;
    private $nombreCapitan;
    private $cantJugadores;
    private $objCategoria ;//obj

    public function __construct($nombre, $nombreCapitan, $cantJugadores,$objCategoria){
        $this->nombre=$nombre;
        $this->nombreCapitan=$nombreCapitan;
        $this->cantJugadores=$cantJugadores;
        $this->objCategoria=$objCategoria;
    }

        public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
 
    public function getNombreCapitan()
    {
        return $this->nombreCapitan;
    }

    public function setNombreCapitan($nombreCapitan)
    {
        $this->nombreCapitan = $nombreCapitan;
    }

    public function getCantJugadores()
    {
        return $this->cantJugadores;
    }

    public function setCantJugadores($cantJugadores)
    {
        $this->cantJugadores = $cantJugadores;
    }
    
    public function getObjCategoria()
    {
        return $this->objCategoria;
    }

    public function setObjCategoria($objCategoria)
    {
        $this->objCategoria = $objCategoria;
    }
// 
  //  public function cargar($nombre, $nombreCapitan, $cantJugadores, $objCategoria){
   //      $this->setNombre($nombre);
 //        $this->setNombreCapitan($nombreCapitan);
  //       $this->setCantJugadores($cantJugadores);
  //       $this->setObjCategoria($objCategoria);
  //   } 

  public function __toString() {
    return "nombre: " . $this->getNombre() . "\nnombreCapitan: " . $this->getNombreCapitan() . "\ncantJugadores: " . $this->getCantJugadores() . "\ncategoria: " . $this->getObjCategoria()->getIdCategoria();
}


    
}