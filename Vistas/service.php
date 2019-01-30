<?php
  if(isset($_REQUEST["bandera"])){
  $baccion      = $_REQUEST["baccion"];
  $bandera      = $_REQUEST["bandera"];
  $visitante    = $_REQUEST["visitante"];
  $estacion     = $_REQUEST["estacion"];
  $fecha        = date("Y/m/d");
  $observacion  = $_REQUEST["observacion"];

  require_once "../ProcesoSubir/conexioneq.php";
    
       $conexion->autocommit(FALSE);
       mysqli_query($conexion, "BEGIN WORK");
        $consulta = "INSERT INTO hojavisitasestaciones (idhojavisitaestaciones, fechavisita, observacion, id_estacion, id_visitante) VALUES (null,'" . $fecha  . "','" . $observacion . "','" .$estacion  . "','" .  $visitante . "')";  

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
