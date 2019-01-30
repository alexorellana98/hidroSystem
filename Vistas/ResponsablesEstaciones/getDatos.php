<?php
    require "../../ProcesoSubir/conexioneq.php"; 
    if(isset($_POST['id'])){
    $id = $_POST['id'];
    $consulta  = "SELECT * FROM respestaciones WHERE idresponsable=".$id;
    $result = $conexion->query($consulta);
      if ($result) {
        while ($fila = $result->fetch_object()) {
            $institucion=$fila->institucion;
            $responsable=$fila->responsable;
            $direccion=$fila->direccion;
            $telefono1=$fila->telefono1;
            $telefono2=$fila->telefono2;
            $foto=$fila->foto;
            $foto1="data:image/*;base64,".base64_encode($foto);
            
        }//fin while
      }
    }
?>
<br>
<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">                
                    <table class="table table-striped">
                        <thead>
                           
                           <tr>
                            
                                <!--inicia el div para capturar la imagen -->
                                <div class="form-group " align="center" >
                                  <label for="control-label" for="foto"><b><i class="fa fa-thumb-tack"></i>   Foto:</b></label>
                                  <div name="preview" id="preview" class="thumbnail">
                                    <a href="#" id="file-select" class="btn btn-success"><span class="fa fa-camera">&nbsp;&nbsp;&nbsp;</span>Elegir archivo</a>
                                    <?php if($foto==""){ ?>
                                    <img id="imagen" name="imagen" src="../images/img2.png"/>
                                    <?php }else{ ?>
                                      <img id="imagen" name="imagen" src="<?php echo $foto1 ?>"/>
                                    <?php } ?>
                                  </div>

                                    <div id="file-submit" >
                                      <input id="file" name="file" type="file" accept="image/jpeg,image/jpg,image/png"/>
                                      <span class="help-block" id="error"></span>
                                    </div> 
                                  </div><br>
                                <!--finaliza el div para capturar la imagen -->
                        
                                
                            </tr>
                           
                            <tr>
                                <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-institution"></i>   Institución:</b></th>
                                <th><label class="text-center"><?php echo $institucion ?></label></th>
                            </tr> 
                            <tr>
                                <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-male"></i>   Responsable:</b></th>
                                <th><label class="text-center"><?php echo $responsable ?></label></th>
                            </tr>   
                            <tr>
                                <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-home"></i>   Dirección:</b></th>
                                <th><label class="text-center"><?php echo $direccion ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-phone"></i>   Teléfono Fijo:</b></th>
                                <th><label class="text-center"><?php echo $telefono1 ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-center"><b><i class="fa fa-phone"></i>   Teléfono Celular:</b></th>
                                <th><label class="text-center"><?php echo $telefono2 ?></label></th>
                            </tr>
                            
                        </thead>
                        
                    </table> 
            </div>         
        </div>
    </div><br><br><br>

