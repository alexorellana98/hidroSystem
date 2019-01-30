<?php
$conexion = new mysqli('localhost', 'root','', 'hidrodb');
if ($conexion->connect_errno) {
    echo "Error de conexion";
}
?>
