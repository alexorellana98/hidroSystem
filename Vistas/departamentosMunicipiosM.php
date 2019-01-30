<?php 
include "../ProcesoSubir/conexioneq.php";
$departamento   = $_POST['departamento'];
$municipio   = $_POST['municipio'];
$sql="SELECT * FROM municipios where iddepto=".$departamento;

$cadena='Municipio<select class="form-control" id="lista2m" name="lista2m" onchange="ponerAbreviaturaM();">';
$cadena=$cadena.'"<option value="0">Municipios</option>"';
//mysqli_query($conexion,"SET NAMES 'utf8'");
//mysqli_set_charset($conexion,'utf8');

$resultado = $conexion->query($sql);
                             if ($resultado) {
                               while($fila= $resultado->fetch_object()){
                                   if($municipio==$fila->idmunicipio){
                                $cadena=$cadena."<option value='".$fila->idmunicipio."' selected>".utf8_encode($fila->nombre)."</option>";
                                }else{
                                    $cadena=$cadena."<option value='".$fila->idmunicipio."'>".utf8_encode($fila->nombre)."</option>";
                                }
                               }                                 
                             } else {
                               
                             }
                             echo $cadena."</select>";

?>