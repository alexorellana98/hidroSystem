<?php 

include "../../conexion/conexion.php";

$idDepto = $_REQUEST["depto"];

$data = "";
 
$consulta = "SELECT * FROM municipios WHERE iddepto=".$idDepto." ORDER BY nombre ASC";
$result = $conexion->query($consulta);
$fila=$result->fetch_row();

if($result->num_rows != 0){
        $data.="<option value='0' selected hidden>Seleccione un municipio</option>";
        for ($i=0; $i < $result->num_rows ; $i++) { 
            $data.="<option value=".$fila[0].">".$fila[1]."</option>";
            $fila=$result->fetch_row();
        }
               
    
}else{
    $data = 0;
}



echo $data;

?>