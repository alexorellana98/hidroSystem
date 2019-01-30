<?php 
$departamento=$_POST['departamento'];
$municipio=$_POST['municipio'];

include "../ProcesoSubir/conexioneq.php";
                             $consulta  = "select * from departamentos where iddepto=".$departamento;
                             $resultado = $conexion->query($consulta);
                             if ($resultado) {
                               while($fila= $resultado->fetch_object()){
                               $abreviaturas=$fila->abreviatura;
                               }
                                 
                             } else {
                               $abreviaturas="ERD";
                             }
                            //CONSULA PARA ABREVIATURA DE MUNICIPIO
                            $consulta  = "select * from municipios where idmunicipio=".$municipio;
                             $resultado = $conexion->query($consulta);
                             if ($resultado) {
                               while($fila= $resultado->fetch_object()){
                               $abreviaturasM=$fila->abreviatura;
                               }
                                 
                             } else {
                               $abreviaturasM="ERM";
                             }
echo $abreviaturas.$abreviaturasM;


?>