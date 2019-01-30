<?php
include "../ProcesoSubir/conexioneq.php";
$modi = $_REQUEST['baccion3'];


$imagen2 = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$mensaje = "";

$consulta = "UPDATE equipos SET imagen='$imagen2' WHERE idequipo='$modi'";
$resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se editaron los datos correctamente";
          } else {
              $mensaje="Error al editar los datos";
          }
          
echo $mensaje;

?>