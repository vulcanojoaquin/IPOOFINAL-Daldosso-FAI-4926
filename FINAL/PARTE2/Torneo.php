<?php
class Torneo{
    private $idTorneo;
    private $montoPremio;
    private $colPartidos;
    private $localidad;//nombre o obj?

    public function __construct($idTorneo,$montoPremio,$colPartidos,$localidad ){
        $this->idTorneo =$idTorneo;
        $this->montoPremio =$montoPremio;
        $this->colPartidos =$colPartidos;
        $this->localidad =$localidad;
    }

    //getters y setters-------------------------------------------------
    
    public function getIdTorneo()
    {
        return $this->idTorneo;
    }

    public function setIdTorneo($idTorneo)
    {
        $this->idTorneo = $idTorneo;
    }

    public function getMontoPremio()
    {
        return $this->montoPremio;
    }

    public function setMontoPremio($montoPremio)
    {
        $this->montoPremio = $montoPremio;
    }

    public function getColPartidos()
    {
        return $this->colPartidos;
    }

    public function setColPartidos($colPartidos)
    {
        $this->colPartidos = $colPartidos;
    }
 
    public function getLocalidad()
    {
        return $this->localidad;
    }

    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }

//metodos-------------------------------------------------------

public function obtenerEquipoGanadorTorneo() {
    // Crear un arreglo para almacenar la cantidad de victorias y goles de cada equipo
    $equiposData = [];

    foreach ($this->colPartidos as $partido) {
        $equipos = $partido->getColEquipos();  // Obtener los equipos del partido

        // Acceder al nombre de los equipos, que deben ser cadenas
        $equipo1 = $equipos[0]->getNombre();
        $equipo2 = $equipos[1]->getNombre();

        // Verificar quién ganó el partido
        if ($partido->getCantGoles1() > $partido->getCantGoles2()) {
            // Equipo 1 ganó
            $ganador = $equipo1;
            $golesGanador = $partido->getCantGoles1();
        } elseif ($partido->getCantGoles1() < $partido->getCantGoles2()) {
            // Equipo 2 ganó
            $ganador = $equipo2;
            $golesGanador = $partido->getCantGoles2();
        } else {
            // Empate
            continue;
        }

        // Si el equipo no está en el arreglo, inicializa sus estadísticas
        if (!isset($equiposData[$ganador])) {
            $equiposData[$ganador] = ['victorias' => 0, 'goles' => 0];
        }

        // Incrementa la victoria y los goles
        $equiposData[$ganador]['victorias'] += 1;
        $equiposData[$ganador]['goles'] += $golesGanador;
    }

    // Ahora buscamos el equipo con más victorias
    $ganadorTorneo = null;
    $maxVictorias = 0;
    $golesMaximos = 0;

    foreach ($equiposData as $equipo => $datos) {
        if ($datos['victorias'] > $maxVictorias) {
            $ganadorTorneo = $equipo;
            $maxVictorias = $datos['victorias'];
            $golesMaximos = $datos['goles'];
        } elseif ($datos['victorias'] == $maxVictorias) {
            if ($datos['goles'] > $golesMaximos) {
                $ganadorTorneo = $equipo;
                $maxVictorias = $datos['victorias'];
                $golesMaximos = $datos['goles'];
            }
        }
    }

    // Retornamos el equipo ganador y sus datos
    return [
        'equipo' => $ganadorTorneo,
        'victorias' => $maxVictorias,
        'goles' => $golesMaximos
    ];
}


    //--------------------

    public function obtenerPremioTorneo() {

        $resultado = $this->obtenerEquipoGanadorTorneo();

        $equipoGanador = $resultado['equipo'];
        
        $premio = [
            'equipo' => $equipoGanador,
            'premio' => $this->montoPremio
        ];

        return $premio;
    }




}