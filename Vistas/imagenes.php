<?php
include "../conexion/conexion.php";
$id = $_REQUEST["id"];

	$result = $conexion->query("select foto as foto,tipofoto as tipo from estacionmet where id_estacion=" . $id);
if ($result) {
    while ($fila = $result->fetch_object()) {
        $imagen = $fila->foto;
        $tipo   = $fila->tipo;
        header("Content-type: " . $tipo . "");
        echo $imagen;
    }
} else {
    echo '<option value="">Error en la BD </opcion>';
}



?>
