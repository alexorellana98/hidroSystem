<?php 

$modi=$_POST["id"];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$consulta = "UPDATE equipos SET imagen='$imagen' WHERE idequipo='$modi'";
$resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se editaron los datos correctamente";
          } else {
              $mensaje="Error al editar los datos";
          }