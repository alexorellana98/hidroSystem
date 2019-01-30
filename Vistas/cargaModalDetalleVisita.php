    <div class="col-md-3 col-sm-9 col-xs-12">
        <div class="x_panel">
            <h4>Estación</h4>
            <div class="ln_solid"></div>
            <?php
                include '../ProcesoSubir/conexioneq.php';
                $cambio=$_REQUEST["idd"];
                $result=$conexion->query("SELECT hs.idhojavisitaestaciones, est.foto from hojavisitasestaciones hs inner join estacionmet est on hs.id_estacion = est.id_estacion where hs.idhojavisitaestaciones= $cambio");
                
                while($fila = $result->fetch_object()){
                ?>
                    <img width="245" height="140" src="data:image/jpg;base64,<?php echo base64_encode($fila->foto); ?>"/> 
                <?php
                }
            ?>
           <!-- <center>
                <img  width="245" height="140" src="../../Vistas/images/volcan.jpg" alt="Los Angeles">
            </center>-->
            <br>
        </div>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <?php
                    include '../ProcesoSubir/conexioneq.php';
                    $cambio=$_REQUEST["idd"];
                        
                    $result=$conexion->query("SELECT hs.idhojavisitaestaciones, hs.fechavisita, hs.observacion, est.codiogestacion, vis.nombre, vis.tipo from hojavisitasestaciones hs
                                    inner join estacionmet est on hs.id_estacion = est.id_estacion
                                    inner join visitantes vis on hs.id_visitante = vis.id_visitante where hs.idhojavisitaestaciones= $cambio");
                    while($fila = $result->fetch_object()){
                    ?>
                        <div class="text-center infoCompleto col-md-2 col-sm-2 col-xs-12 form-group has-feedback"><strong><h5  style="color: white">Visitante:</strong></h5>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                            <h4 class="control-label col-md-12 col-sm-12 col-xs-12"><?php echo $fila->nombre;?></h4>
                        </div>
                        <div class="text-center infoCompleto col-md-2 col-sm-2 col-xs-12 form-group has-feedback"><strong><h5  style="color: white">Tipo Visitante:</strong></h5>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                            <h4 class="control-label col-md-12 col-sm-12 col-xs-12"><?php echo $fila->tipo;?></h4>
                        </div>
                        <br><br><br>
                        <div class="text-center infoCompleto col-md-2 col-sm-2 col-xs-12 form-group has-feedback"><strong><h5 style="color: white"></i> Estación:</strong></h5></div>
                                
                        <div class="col-md-3 col-sm-4 col-xs-12 form-group has-feedback">        
                            <h4 class="control-label col-md-12 col-sm-12 col-xs-12"><?php echo $fila->codiogestacion;?></h4>
                        </div>
                        <br><br><br>
                        <div class="text-center infoCompleto col-md-2 col-sm-2 col-xs-12 form-group has-feedback"><strong><h5 style="color: white">Fecha de visita:</strong></h5></div>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">        
                            <h4 class="control-label col-md-12 col-sm-12 col-xs-12"><?php echo date('d/m/Y', strtotime($fila->fechavisita)); ?></h4>
                        </div>
                        <br><br><br>
                        <div class="text-center infoCompleto col-md-12 col-sm-12 col-xs-12 form-group has-feedback"><strong><h5 style="color: white"><i class="fa fa-info-circle"></i> Observación:</strong></h5></div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <p style="text-align: justify;" class="control-label col-md-12 col-sm-12 col-xs-12" disabled><?php echo $fila->observacion;?></p>
                        </div>

                    <?php
                    }
            ?>
        </div>
    </div>
</div>
