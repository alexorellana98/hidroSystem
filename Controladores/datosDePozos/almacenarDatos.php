<?php
include "../../conexion/conexion.php";

$codigo = $_POST['codigo'];
$depto = $_POST['depto'];
$municipio = $_POST['municipio'];
$tipo = $_POST['tipo'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$altura = $_POST['altura'];
$nivel = $_POST['nivel'];
$profundidad = $_POST['profundidad'];
$fecha = $_POST['fecha'];
$propietario = $_POST['propietario'];
$estado = $_POST['estado'];
$geologia = $_POST['geologia'];
$observacion = $_POST['observacion'];
$mensaje = 1;

$query = "SELECT * FROM pozos WHERE latitud like '%".$latitud."%' AND longitud like '%".$longitud."%';";
$result = $conexion->query($query);
$fila=$result->fetch_row(); 
    if($result->num_rows == 0){
        $consulta  = "INSERT INTO pozos VALUES('null','" .$codigo. "','" . $latitud . "','".$longitud."',
        '".$altura."','".$profundidad."','".$nivel."','".$fecha."','".$geologia."','".$observacion."',
        '".$estado."','".$tipo."','".$propietario."','".$municipio."')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje=1; //los datos se agregaron correctamente
          } else {
              $mensaje=2;// Error: Los datos no se agregaron
          }
        
    }else{
            
            $mensaje=3;//se encontro una conincidencia de ubicacion
        
    }
        
echo $mensaje;

?>