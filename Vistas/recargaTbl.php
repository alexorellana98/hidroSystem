<?php
$cambio=$_REQUEST["actualiza"];
if($cambio=="tabla"){
  ?>
<table id="datatable-fixed-header" class="table table-striped table-bordered imprimir" >
    <thead>
                            <tr>
                              <th style="display:none;">id</th>
                              <th style="width: 270px">Visitante</th>
                              <th style="width: 154px">Tipo</th>
                              <th style="width: 154px">Estación</th>
                              <th style="width: 154px">Fecha</th>
                              <th style="width: 50x">Ver</th>
                              <th style="width: 50px">Editar</th>
                            </tr>
                          </thead>


                          <tbody >
                            <?php
                                 include("../ProcesoSubir/conexioneq.php");

                                $result=$conexion->query("SELECT hs.idhojavisitaestaciones, hs.fechavisita, hs.observacion, est.codiogestacion, vis.tipo, vis.nombre from hojavisitasestaciones hs
                                    inner join estacionmet est on hs.id_estacion = est.id_estacion
                                    inner join visitantes vis on hs.id_visitante = vis.id_visitante order by hs.idhojavisitaestaciones desc");

                                  while($fila = $result->fetch_object()){
                                  ?>
                                    <tr>
                                      <td style="display:none;"><?php echo $fila->idhojavisitaestaciones; ?></td>
                                      <td style="width: 270px"><?php echo $fila->nombre; ?></td>
                                      <td style="width: 154px"><?php echo $fila->tipo; ?></td>
                                      <td style="width: 154px"><?php echo $fila->codiogestacion; ?></td>
                                      <td style="width: 154px"><?php echo date('d/m/Y', strtotime($fila->fechavisita));  ?></td>

                                      <td style="width: 50px" class="text-center">
                                        <button class="btn btn-success btn-icon left-icon" data-toggle="modal"  data-target="#detalle" onclick="verMas('', '<?php echo $fila->idhojavisitaestaciones; ?>')">
                                          <i class="fa fa-search"></i>
                                          <span></span>
                                        </button>
                                      </td>
                                      <td style="width: 50px" class="text-center" >
                                        <button class="btn btn-info btn-icon left-icon" data-toggle="modal" data-target="#modificacion" 
                                        onclick="Act('', '<?php echo $fila->idhojavisitaestaciones; ?>')" >
                                          <i class="fa fa-pencil"></i>
                                          <span></span>
                                        </button> 
                                      </td>
                                    </tr>
                                  <?php
                                  }
                                ?>
                          </tbody>
  </table>
<?php }?>