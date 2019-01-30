<?php 
include "../ProcesoSubir/conexioneq.php";
$departamento   = $_POST['departamento'];
$sql="SELECT * FROM municipios where iddepto=".$departamento;
$cadena='<select class="form-control" id="lista2" name="lista2"  onchange="ponerAbreviatura()">';
$cadena=$cadena.'"<option value="0">Municipios</option>"';
//mysqli_query($conexion,"SET NAMES 'utf8'");
$resultado = $conexion->query($sql);
                             if ($resultado) {
                               while($fila= $resultado->fetch_object()){
                                $cadena=$cadena."<option value='".$fila->idmunicipio."'>".utf8_encode($fila->nombre)."</option>";
                               }                                 
                             } else {
                              $cadena=$cadena."<option value=''>Derror</option>";
                             }
                             echo $cadena."</select>";

?>