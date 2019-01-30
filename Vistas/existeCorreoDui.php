<?php
	 $codigo=$_REQUEST['codigo'];
     $opcion=$_REQUEST['opcion'];
	 //echo '<input type="text" name="esta" value="'.$codigo.'">';
	 include '../Config/conexion.php';
    if($opcion==="dui"){
        $result = $conexion->query("select count(*) as cuenta from propietariospozos where dui='".$codigo."'");
        if ($result) {
            while ($fila = $result->fetch_object()) {
                if(($fila->cuenta)==1)
                    echo '<input type="hidden" id="baccionVer" value="0"/>';
                else 
                    echo '<input type="hidden" id="baccionVer" value="1"/>';
            }
        }
    }else if($opcion==="correo"){
		$result = $conexion->query("select count(*) as cuenta from propietariospozos where correo='".$codigo."'");
        if ($result) {
            while ($fila = $result->fetch_object()) {
                if(($fila->cuenta)==1)
                    echo '<input type="hidden" id="baccionVer" value="0"/>';
                else 
                    echo '<input type="hidden" id="baccionVer" value="1"/>';
            }
        }
    }
 ?>