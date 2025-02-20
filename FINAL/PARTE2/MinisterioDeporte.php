<?php
class MinisterioDeporte{
    private $añoTorneo;
    private $colTorneosPais;

    public function __construct($añoTorneo ,$colTorneosPais=[]){
        $this->añoTorneo = $añoTorneo;
        $this->colTorneosPais = $colTorneosPais;
    }
     
    public function getAñoTorneo()
    {
        return $this->añoTorneo;
    }

    public function setAñoTorneo($añoTorneo)
    {
        $this->añoTorneo = $añoTorneo;
    }

    public function getColTorneosPais()
    {
        return $this->colTorneosPais;
    }

    public function setColTorneosPais($colTorneosPais)
    {
        $this->colTorneosPais = $colTorneosPais;
    }
    
    public function registrarTorneo($ColPartidos, $tipo, $ArrayAsociativo) {
        if ($tipo == 'nacional') {
            $idTorneo = $ArrayAsociativo['idTorneo'];
            $montoPremio = $ArrayAsociativo['montoPremio'];
            $localidad = $ArrayAsociativo['localidad'];
    
            $torneo = new Nacional($idTorneo, $montoPremio, $ColPartidos, $localidad);
        } elseif ($tipo == 'provincial') {
            $idTorneo = $ArrayAsociativo['idTorneo'];
            $montoPremio = $ArrayAsociativo['montoPremio'];
            $localidad = $ArrayAsociativo['localidad'];
            $provincia = $ArrayAsociativo['provincia'];
    
            $torneo = new Provincial($idTorneo, $montoPremio, $ColPartidos, $localidad, $provincia);
        }
    
        $colTorneos = $this->getColTorneosPais();
        $colTorneos[$torneo->getIdTorneo()] = $torneo; 
        $this->setColTorneosPais($colTorneos);
    
        return $torneo;
    }
    
//...
public function otorgarPremioTorneo($idTorneo) {
    $colTorneos = $this->getColTorneosPais();

    if (!isset($colTorneos[$idTorneo])) {
        throw new Exception("Torneo no encontrado.");
    }

    $torneo = $colTorneos[$idTorneo];

    if ($torneo instanceof Nacional) {
        $premio = $torneo->obtenerPremioTorneoNacional();
    } elseif ($torneo instanceof Provincial) {
        $premio = $torneo->obtenerPremioTorneo();
    } else {
        throw new Exception("Tipo de torneo desconocido.");
    }

    return $premio;
}

public function __toString(){
    return "Año Torneo: " . $this->getAñoTorneo() . "\n" .
    "Cantidad de torneos: " . count($this->getColTorneosPais()) . "\n";
}


    }
    
