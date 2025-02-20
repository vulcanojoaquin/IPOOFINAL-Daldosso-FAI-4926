<?php
include_once 'Torneo.php';
class Nacional extends Torneo{
    private $premioNacional;
    public function __construct($idTorneo,$montoPremio,$colPartidos,$localidad ){
        parent::__construct($idTorneo,$montoPremio,$colPartidos,$localidad );
    }

    public function getPremioNacional()
    {
        return $this->premioNacional;
    }

    public function setPremioNacional($premioNacional)
    {
        $this->premioNacional = $premioNacional;
    }

    public function obtenerPremioTorneoNacional() {
        
        $resultado = $this->obtenerEquipoGanadorTorneo();

        $equipoGanador = $resultado['equipo'];
        
        $cantVictorias= $resultado['victorias'];
        
        $premio=$this->getMontoPremio();
        $montoAdicional=$premio * 0.10 * $cantVictorias;
        $premioTotal=$premio+$montoAdicional;

        $premio = [
            'equipo' => $equipoGanador,
            'premio' => $premioTotal
        ];

        return $premio;
    }

    public function __toString(){
        return parent::__toString();
     }

}