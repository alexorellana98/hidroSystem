<?php
include "../ProcesoSubir/conexioneq.php";
$modi = $_REQUEST['baccion2'];

$nombre = $_REQUEST['nomb'];
$marca = $_REQUEST['marc'];
$numero = $_REQUEST['num'];
$donado = $_REQUEST['donad'];
$tipous = $_REQUEST['tipou'];
$estado= $_REQUEST['esteq'];
$descripcion = $_REQUEST['descr'];

$imagenBinaria = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$mensaje = "";

$consulta = "UPDATE equipos SET nombre='$nombre', descripcion='$descripcion', tipouso='$tipous',marca='$marca',numeroserie='$numero',donadopor='$donado',estado='$estado',imagen='$imagenBinaria' WHERE idequipo='$modi'";
$resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se editaron los datos correctamente";
          } else {
              $mensaje="Error al editar los datos";
          }
          
echo $mensaje;

?>