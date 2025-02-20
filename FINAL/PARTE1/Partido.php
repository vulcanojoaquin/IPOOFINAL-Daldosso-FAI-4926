<?php
class Partido{
    private $idPartido;
    private $fecha;
    private $cantGoles1;
    private $cantGoles2;
    private $colEquipos;

    public function __construct($idPartido,$fecha ,$cantGoles1, $cantGoles2, $colEquipos){
        $this->idPartido=$idPartido;
        $this->fecha=$fecha;
        $this->cantGoles1=$cantGoles1;
        $this->cantGoles2=$cantGoles2;
        $this->colEquipos=$colEquipos;
    }

//    public function cargar($idPartido, $fecha,$cantGoles1,$cantGoles2, $equipos){
  //      $this->setNombre($idPartido);
    //    $this->setFecha($fecha);
//        $this->setCantGoles1($cantGoles1);
  //      $this->setCantGoles2($cantGoles2);
    //    $this->setEquipos($equipos);
  //  }
    
    public function getIdPartido()
    {
        return $this->idPartido;
    }

    public function setIdPartido($idPartido)
    {
        $this->idPartido = $idPartido;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getCantGoles1()
    {
        return $this->cantGoles1;
    }
 
    public function setCantGoles1($cantGoles1)
    {
        $this->cantGoles1 = $cantGoles1;
    }
 
    public function getCantGoles2()
    {
        return $this->cantGoles2;
    }

    public function setCantGoles2($cantGoles2)
    {
        $this->cantGoles2 = $cantGoles2;
    }

    public function getColEquipos()
    {
        return $this->colEquipos;
    }

    public function setEquipos($colEquipos)
    {
        $this->ColEquipos = $colEquipos;
    }

    public function __toString(){
        return "IdPartido: ".$this->getIdPartido()."\nFecha: ".$this->getFecha()."\nCantGoles1: ".$this->getCantGoles1()."\nCantGoles2: ".$this->getCantGoles2()."\nEquipos: ".$this->getColEquipos();
    }


}