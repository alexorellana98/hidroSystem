<?php
include "../ProcesoSubir/conexioneq.php";
$result = $conexion->query("SELECT*,municipios.nombre as municipios FROM respestaciones,municipios,comunidades,departamentos where comunidades.iddepartamento=departamentos.iddepto and municipios.idmunicipio=comunidades.idmunicipio and comunidades.idobservador=respestaciones.idresponsable");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        echo "<td hidden>" . $fila->idcomunidad. "</td>";
        echo "<td>" . $fila->nombre . "</td>";
        echo "<td>" . $fila->tipo . "</td>";
        echo "<td>" . $fila->nombredepto. "</td>";
        echo "<td>" . $fila->municipios. "</td>";
        echo "<td>" . $fila->institucion. "</td>";
        
        
        echo "<td width=160>
         <center>
                            <button type='button' title='Listar Detalles' class='btn btn-success' 'style='width:45px;' onclick=\"editar('$fila->idcomunidad','$fila->nombre','$fila->tipo','$fila->nombredepto','$fila->municipios','$fila->institucion')\";><i class='fa fa-list'></i></button>
                            <button type='button' data-toggle='modal' data-target='#ModifiModal'  class='btn btn-success' 'style='width:45px;' onclick=\"edit('', ".$fila->idcomunidad.")\";><i class='fa fa-pencil'></i></button>
                            
        </center>
                            
        </td>";
     /*   if ($fila->eestado==1) {
            echo "<td>Activo</td>";
             //echo "<td><img src='imagenes.php?id=" . $fila->idempleados . "&tipo=empleado' width=100 height=180></td>";
            echo "<td style='text-align:center;'><button title='Desactivar Opcion' align='center' type='button' class='btn btn-default' onclick=confirmarAct(" . $fila->eid_bachillerato . ",1);><i class='fa fa-remove'></i>
               </button></td>";
         }else
         {
            echo "<td>Inactivo</td>";
             //echo "<td><img src='imagenes.php?id=" . $fila->idempleados . "&tipo=empleado' width=100 height=180></td>";
            echo "<td style='text-align:center;'><button title='Activar Opcion' align='center' type='button' class='btn btn-default' onclick=confirmarAct(" . $fila->eid_bachillerato . ",2);><i class='fa fa-check'></i>
               </button></td>";
         }
        $aux= "<button type=\"button\" class=\"btn btn-warning btn-sm btn-round\" ";
       $aux.="onclick=\"editar('".$fila->eid_bachillerato."','".$fila->ccodigo."','".$fila->cnombe."','".$fila->cdescripcion."','".$fila->efk_tipo."')\";>";
       $aux.="Modificar</button>";
       echo "<td width='90'>";
     
       echo $aux;*/
        
        
        echo "</tr>";

    }
}
?>