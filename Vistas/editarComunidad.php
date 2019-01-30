<?php
include "../ProcesoSubir/conexioneq.php";
$modi = $_REQUEST['baccion2'];

$nombre = $_REQUEST['nombr'];
$tipo = $_REQUEST['tipp'];
$departamento = $_REQUEST['nombdepto'];
$municipio = $_REQUEST['municipis'];
$institucion = $_REQUEST['insti'];


$consulta = "UPDATE comunidades SET nombre='$nombre', tipo='$tipo', iddepartamento='$departamento',idmunicipio='$municipio',idobservador='$institucion' where idcomunidad='$modi'";
$resultado = $conexion->query($consulta);
          if ($resultado) {

              echo 1;
          } else {
              echo 2;
          }
          

?>