<?php
include "../ProcesoSubir/conexioneq.php";
$result = $conexion->query("SELECT * from equipos ORDER BY idequipo");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $fila->nombre . "</td>";
        echo "<td>" . $fila->descripcion . "</td>";
        echo "<td>" . $fila->tipouso . "</td>";
        echo "<td>" . $fila->marca . "</td>";
        echo "<td>" . $fila->numeroserie. "</td>";
        echo "<td>" . $fila->donadopor . "</td>";
        echo "<td>" . $fila->estado . "</td>";
        /* Codigo para mostrar la imagen*/
        //echo "<td><img src='data:image/jpg;base64," .base64_encode($fila->imagen) . "' width=75 height=75;></td>";
    echo "<td width=160> 
        <center><a href='#' data-toggle='modal' data-target='#confirm-imagen' onclick=verImagen('".$fila->idequipo."');><button type='button' title='Ver Foto' class='btn btn-success'><i class='fa fa-eye'></i></button></a>
        </center>
    </td>";

        echo "<td width=160>
                <center>
                
                <button type='button' title='Modificar' class='btn btn-success' 'style='width:45px;' onclick=\"edit('$fila->idequipo','$fila->nombre','$fila->marca','$fila->numeroserie','$fila->donadopor','$fila->tipouso','$fila->descripcion','$fila->estado')\";><i class='fa fa-pencil'></i></button>
                
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