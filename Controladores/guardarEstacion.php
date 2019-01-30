<?php
include "../ProcesoSubir/conexion.php";
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$numserie = $_POST['numserie'];
$donadores = $_POST['donadores'];
$tipo = $_POST['tipo'];
$estado = $_POST['estado'];
$descrip = $_POST['descripcion'];
$id = $_POST['id'];
$mensaje = "";

        $consulta  = "INSERT INTO equipos VALUES('null','" . $nombre . "','" .$descrip. "','" .$tipo. "','" .$marca. "','" .$numserie. "','" .$donadores. "','" .$estado. "')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se agregaron los datos correctamente";
          } else {
              $mensaje="Error al insertar los datos";
          }  
include "../Vistas/equipos.php";

?>