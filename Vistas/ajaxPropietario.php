<?php     include '../Config/conexion.php';   

$cambio=$_REQUEST["actualiza"];

if($cambio=="modal")
{
?>
   
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">                
                    <table class="table table-striped">
                       <?php
                      $cambio=$_REQUEST["idd"];
                      $result = $conexion->query("SELECT * from propietariospozos where id_propietario='".$cambio."'");
                        if ($result) {
                            while ($fila = $result->fetch_object()) {
                                $instit=$fila->institucion;
                      ?>
                        <thead>
                           
                           <tr>
                              <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-thumb-tack"></i>   Tipo:</b></th>
                               <?php if($instit===""){?>                                
                                <th><label class="text-center">Persona</label></th>
                                <?php }if($instit!==""){?>
                                <th><label class="text-center">Institución</label></th>
                                <?php }?>
                                
                            </tr>
                            <?php if($instit!==""){?>
                            <tr>
                                <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-institution"></i>   Institución:</b></th>
                                <th><label class="text-center"><?php echo $fila->institucion ?></label></th>
                            </tr>
                            <?php }?>
                            
                            <?php if($instit!==""){?>
                            <tr>
                                <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-globe"></i>   Sitio Web:</b></th>
                                <th><label class="text-center"><?php echo $fila->nom.' '.$fila->sitio_web ?></label></th>
                            </tr>
                            <?php }?>
                            
                            
                            <?php if($instit==""){?>
                            <tr>
                                <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-male"></i>   Propietario:</b></th>
                                <th><label class="text-center"><?php echo $fila->nom.' '.$fila->apellido ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-minus-square"></i>   DUI:</b></th>
                                <th><label class="text-center"><?php echo $fila->dui ?></label></th>
                            </tr>
                            <?php }?>
                            
                            
                            <tr>
                                <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-phone"></i>   Tel. Fijo:</b></th>
                                <th><label class="text-center"><?php echo $fila->telfijo?></label></th>
                            </tr>
                            <?php if($instit==""){?>
                            <tr>
                                <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-group"></i>   Genero:</b></th>
                                <th><label class="text-center"><?php echo $fila->genero?></label></th>
                            </tr>
                           <?php }?>
                           
                            <tr>
                                <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-home"></i>   Direccion:</b></th>
                                <th><label class="text-center"><?php echo $fila->direccion?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-at"></i>   Correo:</b></th>
                                <th><label class="text-center"><?php echo $fila->correo?></label></th>
                            </tr>
                        </thead>
                        <?php
                            }
                        }
                        ?>
                    </table> 
            </div>         
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    
  <?php
}
if($cambio=="tabla")
{
?>
                       <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap tablita" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                          <th>Tipo</th>
                          <th>Nombre</th>
                          <th>Celular</th>
                          <th>Direccion</th>
                           <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="contenidoTabla">
                      <?php
                    include "../Config/conexion.php";
                    $opcion=$_REQUEST["opcion"];
                    $result = $conexion->query("select * from propietariospozos where activo=".$opcion);
                    if ($result) {
                        while ($fila = $result->fetch_object()) {
                            echo "<tr>";
                            $insti=$fila->institucion;
                            if($insti===null || $insti===""){
                                echo "<td>Persona</td>";
                                $tipo=0;
                            }else{
                                echo '<td>Institución</td>';
                                $tipo=1;
                            }
                             if($tipo==0){echo '<td>'.$fila->nom.' '.$fila->apellido.'</td>';}
                             if($tipo==1){echo '<td>'.$fila->institucion.'</td>';}
                            ?>
                            <td><?php echo $fila->telcelular ?></td>
                            <td><?php echo $fila->direccion ?></td>
                            <td width=160 class="text-center">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#propietarioModal" onclick="actualizarModalPropietario('', '<?php echo $fila->id_propietario ?>')"><i class="fa fa-search" ></i></button>
                            <?php if($opcion=="1"){?>
                            <button type="button" class="btn btn-success" onclick="cambios('modificar','<?php if($tipo==0){echo $fila->nom.' '.$fila->apellido; }else if($tipo===1){echo $fila->institucion;}?>')"><i class="fa fa-pencil"></i></button>
                            <?php } 
                            if($opcion=="1"){?>                            
                            <button type="button" class="btn btn-warning" onclick="cambios('desactivar','<?php echo $fila->id_propietario ?>','<?php if($tipo==0){echo $fila->nom.' '.$fila->apellido; }else if($tipo===1){echo $fila->institucion;}?>');"><i class="fa fa-arrow-circle-down"></i></button>
                            <?php }else if($opcion=="0"){?>
                            <button type="button" class="btn btn-info" onclick="cambios('activar','<?php echo $fila->id_propietario ?>','<?php if($tipo==0){echo $fila->nom.' '.$fila->apellido; }else if($tipo===1){echo $fila->institucion;}?>');"><i class="fa fa-arrow-circle-up"></i></button>
                            <?php }?>
                             </td>
                            <?php
                            echo "</tr>";
                        }
                    }
                    ?>
                     </tbody>
                    </table>  
                   

<?php
}
if($cambio==="cambioEstado"){
    include "../Config/conexion.php";
    $opcion=$_REQUEST["opcion"];
    $id=$_REQUEST["id"];
    $result = $conexion->query("UPDATE propietariospozos SET activo='".$opcion."' where id_propietario=".$id);
    if ($result) {
        echo '<input type="hidden" value="1" name="quepaso" id="quepaso"/>';
    }else{
        echo '<input type="hidden" value="0" name="quepaso" id="quepaso"/>';
    }
}
?>