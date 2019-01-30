<?php

if(!isset($_POST["observador"]) || !isset($_POST["equipo"]) || !isset($_POST["fecha"])) exit();

include("../ProcesoSubir/conexion.php");
$observador = $_POST["observador"];
$equipo = $_POST["equipo"];
$fecha = $_POST["fecha"];

$query = mysqli_query($mysqli, "INSERT INTO equipoobservador(idobservador,idequipo,fechaasigna) 
                                VALUES('$observador','$equipo','$fecha')")
                                or die('Error: '.mysqli_error($mysqli)); 

if($query == TRUE){
	header("Location: ../Vistas/asignacionEquipos.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";

?>
