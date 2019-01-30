<?php

include "../conexion/conexion.php" ; 

$result = $conexion->query("SELECT pozos.id_pozo, pozos.codigopozo, pozos.tipo, pozos.id_propietario,
 pozos.latitud, pozos.longitud, pozos.nivel, pozos.altura, pozos.profundidad, pozos.fechacreacion, pozos.geologia,
 pozos.observacion, pozos.estado, pozos.id_municipio, propietariospozos.dui, propietariospozos.nombre as n,
 propietariospozos.id_propietario, municipios.idmunicipio, municipios.nombre, municipios.iddepto,
 departamentos.iddepto, departamentos.nombredepto FROM pozos INNER JOIN propietariospozos ON pozos.id_propietario = propietariospozos.id_propietario
 INNER JOIN municipios ON pozos.id_municipio = municipios.idmunicipio
 INNER JOIN departamentos ON municipios.iddepto = departamentos.iddepto ORDER BY pozos.id_pozo DESC");

if($result->num_rows != 0){

    while($fila = $result->fetch_object()){

      echo "<tr>";
        echo "<td>".$fila->codigopozo."</td>";
        echo "<td>".$fila->tipo."</td>";
        echo "<td>".$fila->dui."</td>";
        if($fila->estado == 0){
          echo "<td> INACTIVO </td>";
        }
        else if($fila->estado == 1){
          echo "<td bgcolor=#dff8e7> EN USO </td>";
        }

        echo "<td>".$fila->nombre."</td>";
        
          $aux= "<button type=\"button\" class=\"btn btn-info\" style=\"width:80px;\" ";
          $aux.="onclick=\"ubicacion('".$fila->latitud."','".$fila->longitud."','".$fila->codigopozo."')\";>";
          $aux.="<i class='fa fa-map-marker fa-lg'></i></button>";

          $aux2= "<button type=\"button\" class=\"btn btn-success\" style=\"width:70px;\" ";
          $aux2.="onclick=\"detalle('".$fila->codigopozo."','".$fila->nombredepto."','".$fila->n."','".$fila->nombre."',
          '".$fila->altura."','".$fila->profundidad."','".$fila->nivel."','".$fila->fechacreacion."','".$fila->dui."',
          '".$fila->tipo."','".$fila->estado."','".$fila->geologia."','".$fila->observacion."')\";>";
          $aux2.="<i class='fa fa-search'></i></button>";

          $aux3= "<button type=\"button\" class=\"btn btn-success\" style=\"width:70px;\" ";
          $aux3.="onclick=\"editar('".$fila->id_pozo."','".$fila->codigopozo."','".$fila->iddepto."','".$fila->idmunicipio."',
          '".$fila->latitud."','".$fila->longitud."','".$fila->altura."','".$fila->profundidad."','".$fila->nivel."','".$fila->fechacreacion."',
          '".$fila->id_propietario."','".$fila->tipo."','".$fila->estado."','".$fila->geologia."','".$fila->observacion."')\";>";
          $aux3.="<i class='fa fa-pencil'></i></button>";

        echo "<td width='50'>";    
          echo $aux;
        echo "</td>";
        echo "<td width='160'>";    
          echo $aux2;
          echo $aux3;
        echo "</td>";
        
      echo "</tr>";
    }
}
?>



 


