<?php
include "../../conexion/conexion.php";

$id = $_POST['id'];
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
$mensaje = 0;

$query = "SELECT * FROM pozos WHERE latitud like '%".$latitud."%' AND longitud like '%".$longitud."%';";
$result = $conexion->query($query);
$fila=$result->fetch_row(); 
    if($result->num_rows == 0){
        $consulta  = "UPDATE pozos SET codigopozo='" .$codigo. "', latitud='" . $latitud . "', longitud='".$longitud."',
        altura='".$altura."', profundidad='".$profundidad."', nivel='".$nivel."', fechacreacion='".$fecha."', geologia='".$geologia."', observacion='".$observacion."',
        estado='".$estado."', tipo='".$tipo."', id_propietario='".$propietario."', id_municipio='".$municipio."' WHERE id_pozo=".$id;
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje=1; //los datos se modificaron correctamente
          } else {
              $mensaje=2;// Error: Los datos no se modificaron
          }
        
    }else{
          
        if($fila[0]==$id){


            $consulta  = "UPDATE pozos SET codigopozo='" .$codigo. "', latitud='" . $latitud . "', longitud='".$longitud."',
            altura='".$altura."', profundidad='".$profundidad."', nivel='".$nivel."', fechacreacion='".$fecha."', geologia='".$geologia."', observacion='".$observacion."',
            estado='".$estado."', tipo='".$tipo."', id_propietario='".$propietario."', id_municipio='".$municipio."' WHERE id_pozo=".$id;
            $resultado = $conexion->query($consulta);
              if ($resultado) {
                  $mensaje=1; //los datos se modificaron correctamente
              } else {
                  $mensaje=2;// Error: Los datos no se modificaron
              }



        }else{

            $mensaje=3;//se encontro una conincidencia de ubicacion
        }
            
        
    }
        
echo $mensaje;

?>