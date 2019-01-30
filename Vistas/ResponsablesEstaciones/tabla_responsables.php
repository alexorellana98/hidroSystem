<form class="form-horizontal form-label-left">

                   
                  
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Intituci&oacute;n</th>
                          <th>Responsable</th>
                          <th>Direcci&oacute;n</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                            require '../../ProcesoSubir/conexioneq.php';
                            $result = $conexion->query("SELECT * FROM respestaciones");
                            $contador=1;
                            if ($result) {
                                while ($fila = $result->fetch_object()) {
                                                
                                    echo "<tr>";
                                    echo "<td>" .$contador. "</td>";
                                    echo "<td>" . $fila->institucion . "</td>";
                                    echo "<td>" . $fila->responsable . "</td>";
                                    echo "<td>" . $fila->direccion . " </td>";
                                    echo "<td> <a class='btn btn-success' type='button' onclick='ver(".$fila->idresponsable.")'><i class='fa fa-eye'></i></a>
                                                <a class='btn btn-info' onclick='editar(".$fila->idresponsable.")' ><i class='fa fa-edit'></i></a>
                                            </td>";
                                    echo "</tr>";
                                    $contador++;

                                }
                            }
                        ?>
                        
                      </tbody>
                    </table>
                    </form>