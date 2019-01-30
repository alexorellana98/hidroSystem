<?php
  if(isset($_REQUEST["bandera"])){
  $baccion      = $_REQUEST["baccion"];
  $bandera      = $_REQUEST["bandera"];
  $visitante    = $_REQUEST["visitantes"];
  $estacion     = $_REQUEST["estacions"];
  $fecha        = $_REQUEST["fechas"];
  $observacion  = $_REQUEST["observacions"];

  require_once "../ProcesoSubir/conexioneq.php";
    
       $conexion->autocommit(FALSE);
       mysqli_query($conexion, "BEGIN WORK");

        $consulta = "UPDATE hojavisitasestaciones SET observacion = '$observacion', id_estacion = '$estacion', id_visitante =' $visitante' WHERE idhojavisitaestaciones= '".$baccion."'";  

        $resultado = $conexion->query($consulta);

        if ($resultado) {
          mysqli_commit($conexion);
          
          echo 1;
           
        } else {
            mysqli_rollback($conexion);
            
           echo 2;
           
        }
  }
?>