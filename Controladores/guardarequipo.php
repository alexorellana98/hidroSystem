<?php
include "../ProcesoSubir/conexioneq.php";
$nombre   = $_POST['nombre'];
$descrip   = $_POST['descripcion'];
$tipo   = $_POST['tipo'];
$marca  = $_POST['mark'];
$numserie = $_POST['numserie'];
$donadores = $_POST['Donantes'];
$estado = $_POST['estado'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$mensaje = "";

        $consulta  = "INSERT INTO equipos VALUES('null','" . $nombre . "','" .$descrip. "','" .$tipo. "','" .$marca. "','".$numserie."','".$donadores."','".$estado."','".$imagen."')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se agregaron los datos correctamente";
              header('Location: ../Vistas/equipos.php?guardo=1');
          } else {
              $mensaje="Error al insertar los datos";
          }

?>
