<?php 
include "../ProcesoSubir/conexioneq.php";
$id   = $_POST['id'];
$op   = $_POST['op'];
if($op==1){
    $consultac  = "UPDATE estacionmet set activa='1' where id_estacion='" . $id . "'";
}else{
    $consultac  = "UPDATE estacionmet set activa='0' where id_estacion='" . $id . "'";
}


        $resultado = $conexion->query($consultac);
        if ($resultado) {
            echo"Si";
        } else {
           echo"No";
        }

?>