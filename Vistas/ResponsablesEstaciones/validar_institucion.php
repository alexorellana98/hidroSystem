<?php
    require "../../ProcesoSubir/conexioneq.php"; 
    if(isset($_POST['institucion'])){
    $institucion = $_POST['institucion'];
    $consulta  = "SELECT * FROM respestaciones WHERE institucion='$institucion'";
    
    $result = $conexion->query($consulta);
      if ($result) {
        while ($fila = $result->fetch_object()) {
            echo $datos=$fila->institucion;
        }//fin while
      }
    }
   
?>