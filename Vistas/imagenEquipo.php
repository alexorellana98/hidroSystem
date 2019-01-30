<?php 
include "../ProcesoSubir/conexioneq.php";
$id   = $_POST['id'];

echo "<center><img src='imagenesEquipos.php?id=" . $id . "' width=250 height=200 align='center' style='margin-top:30px;'></center>";


?>