<?php
include_once '../PARTE1/Categoria.php';
include_once '../PARTE1/Equipo.php';
include_once '../PARTE1/Partido.php';
include_once '../PARTE2/Torneo.php';
include_once '../PARTE2/Nacional.php';
include_once '../PARTE2/Provincial.php';
include_once '../PARTE2/MinisterioDeporte.php';

$categoriaA = new Categoria(1, "Categoría A");
$categoriaB = new Categoria(2, "Categoría B");
$categoriaC = new Categoria(3, "Categoría C");
$categoriaD = new Categoria(4, "Categoría D");
$categoriaE = new Categoria(5, "Categoría E");
$categoriaF = new Categoria(6, "Categoría F");

$objE1 = new Equipo("Equipo 1", "Capitan 1", 11, $categoriaA);
$objE2 = new Equipo("Equipo 2", "Capitan 2", 11, $categoriaA);
$objE3 = new Equipo("Equipo 3", "Capitan 3", 11, $categoriaB);
$objE4 = new Equipo("Equipo 4", "Capitan 4", 11, $categoriaB);
$objE5 = new Equipo("Equipo 5", "Capitan 5", 11, $categoriaC);
$objE6 = new Equipo("Equipo 6", "Capitan 6", 11, $categoriaC);
$objE7 = new Equipo("Equipo 7", "Capitan 7", 11, $categoriaD);
$objE8 = new Equipo("Equipo 8", "Capitan 8", 11, $categoriaD);
$objE9 = new Equipo("Equipo 9", "Capitan 9", 11, $categoriaE);
$objE10 = new Equipo("Equipo 10", "Capitan 10", 11, $categoriaE);
$objE11 = new Equipo("Equipo 11", "Capitan 11", 11, $categoriaF);
$objE12 = new Equipo("Equipo 12", "Capitan 12", 11, $categoriaF);


$objPart1 = new Partido(1, "2025-02-20", 80, 120, [$objE7, $objE8]);
$objPart2 = new Partido(2, "2025-02-21", 81, 110, [$objE9, $objE10]);
$objPart3 = new Partido(3, "2025-02-22", 115, 85, [$objE11, $objE12]);
$objPart4 = new Partido(4, "2025-02-23", 3, 2, [$objE1, $objE2]);
$objPart5 = new Partido(5, "2025-02-24", 0, 1, [$objE3, $objE4]);
$objPart6 = new Partido(6, "2025-02-25", 2, 3, [$objE5, $objE6]);


$ColPartidos_p2 = [$objPart1, $objPart1, $objPart1]; 
$ColPartidos_pN = [$objPart4, $objPart5, $objPart6]; 

$ministerio = new MinisterioDeporte(2025);

$arrayAsociativoProvincial = [
    'idTorneo' => 101,
    'montoPremio' => 5000,
    'localidad' => 'Córdoba',
    'provincia' => 'Córdoba'
];

$torneoProvincial = $ministerio->registrarTorneo($ColPartidos_p2, 'provincial', $arrayAsociativoProvincial);

echo "Torneo Provincial Registrado: \n";
echo "ID Torneo: " . $torneoProvincial->getIdTorneo() . "\n";
echo "Monto Premio: " . $torneoProvincial->getMontoPremio() . "\n";
echo "Localidad: " . $torneoProvincial->getLocalidad() . "\n";
echo "Provincia: " . $torneoProvincial->getNombreProvincia() . "\n";


$premioProvincial = $ministerio->otorgarPremioTorneo(101); 
echo "Premio otorgado al equipo ganador del Torneo Provincial: \n";
echo "Equipo: " . $premioProvincial['equipo'] . "\n";  
echo "Monto Premio: " . $premioProvincial['premio'] . "\n";

$objPart7 = new Partido(7, "2025-02-26", 90, 100, [$objE1, $objE3]);
$objPart8 = new Partido(8, "2025-02-27", 120, 95, [$objE2, $objE4]);
$objPart9 = new Partido(9, "2025-02-28", 85, 110, [$objE5, $objE7]);

$ColPartidos_p3 = [$objPart7, $objPart8, $objPart9];  

$arrayAsociativoNacional = [
    'idTorneo' => 102,
    'montoPremio' => 10000,
    'localidad' => 'Buenos Aires'
];

$torneoNacional = $ministerio->registrarTorneo($ColPartidos_p3, 'nacional', $arrayAsociativoNacional);


echo "Torneo Nacional Registrado: \n";
echo "ID Torneo: " . $torneoNacional->getIdTorneo() . "\n";
echo "Monto Premio: " . $torneoNacional->getMontoPremio() . "\n";
echo "Localidad: " . $torneoNacional->getLocalidad() . "\n";

//------------------------------------------------------

$idTorneo_5 = 102; 

$premioNacional = $ministerio->otorgarPremioTorneo($idTorneo_5);

echo "Premio otorgado al equipo ganador del Torneo Nacional: \n";
echo "Equipo: " . $premioNacional['equipo'] . "\n";  
echo "Monto Premio: " . $premioNacional['premio'] . "\n";  

$idTorneo_6 = 101; 

$premioProvincial = $ministerio->otorgarPremioTorneo($idTorneo_6);

echo "Premio otorgado al equipo ganador del Torneo Provincial: \n";
echo "Equipo: " . $premioProvincial['equipo'] . "\n";  
echo "Monto Premio: " . $premioProvincial['premio'] . "\n";  

echo $ministerio; 
