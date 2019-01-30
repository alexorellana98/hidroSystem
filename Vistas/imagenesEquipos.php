<?php
include "../ProcesoSubir/conexioneq.php";
$id = $_REQUEST["id"];


	$result = $conexion->query("select imagen as imagen from equipos where idequipo=" . $id);
if ($result) {
    while ($fila = $result->fetch_object()) {
        $imagen = $fila->imagen;
 
        echo $imagen;
    }
} else {
    echo '<option value="">Error en la BD </opcion>';
}



?>