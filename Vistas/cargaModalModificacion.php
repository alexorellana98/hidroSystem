<?php
  include ("../ProcesoSubir/conexioneq.php");
  $ide=$_REQUEST["idd"];
  $ridhoja      = "";
  $rfecha       = "";
  $robservacion = "";
  $ridestacion  = "";
  $ridvistante  = "";

  $result=$conexion->query("SELECT hs.idhojavisitaestaciones, hs.fechavisita, hs.observacion, est.id_estacion, hs.id_visitante, vis.tipo from hojavisitasestaciones hs inner join estacionmet est on hs.id_estacion = est.id_estacion
    inner join visitantes vis on hs.id_visitante = vis.id_visitante where idhojavisitaestaciones='$ide'");

  //$result = $conexion->query("SELECT * from hojavisitasestaciones where idhojavisitaestaciones='$ide'");

  if ($result) {
      while ($fila = $result->fetch_object()) {
          $ridhoja      = $fila->idhojavisitaestaciones;
          $rfecha       = $fila->fechavisita;
          $robservacion = $fila->observacion;
          $ridestacion  = $fila->id_estacion;
          $ridvistante  = $fila->id_visitante;
          $rtipovistante  = $fila->tipo;
      }

  }

?>
<!-- Select2 -->
  <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">

  <div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Formulario de ingreso</h2>
            <ul class="nav navbar-right panel_toolbox">
            </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <br />
          <form id="frmactualiza" name="frmactualiza" class="form-horizontal form-label-left input_mask" method="GET" action="actualizaVis.php">

            <input type="hidden" name="bandera" id="bandera" value=""/>
            <input type="hidden" name="baccion" id="baccion" value="<?php echo $ridhoja ;?>"/>


            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class=" form-control STip" id="tipos" name="tipos" onchange="actualizaM('cambioTipos');"  >
                <option value="Tipo Visitante" >Tipo Visitante</option>
                <?php                                         
                      if($rtipovistante==="Investigador" || $rtipovistante==="investigador" ){
                        echo '<option value="Investigador" selected="">Investigador</option>';
                        echo '<option value="Docente">Docente</option>';
                        echo '<option value="Estudiante">Estudiante</option>';
                        echo '<option value="Otros">Otros</option>';
                      }else if($rtipovistante==="Docente" || $rtipovistante==="docente"){
                        echo '<option value="Investigador">Investigador</option>';
                        echo '<option value="Docente"  selected="">Docente</option>';
                        echo '<option value="Estudiante">Estudiante</option>';
                        echo '<option value="Otros">Otros</option>';
                      }else if ($rtipovistante==="Estudiante" || $rtipovistante==="estudiante" ) {
                        echo '<option value="Investigador">Investigador</option>';
                        echo '<option value="Docente" >Docente</option>';
                        echo '<option value="Estudiante" selected="">Estudiante</option>';
                        echo '<option value="Otros">Otros</option>';
                      }else if ($rtipovistante==="Otros" || $rtipovistante==="otros" ) {
                        echo '<option value="Investigador">Investigador</option>';
                        echo '<option value="Docente"  selected="">Docente</option>';
                        echo '<option value="Estudiante">Estudiante</option>';
                        echo '<option value="Otros" selected="">Otros</option>';
                      }
                             
                  echo '</select>';
                ?> 
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12" id="visitantes" name="visitantes">
                <select class="form-control " id="visitantes" name="visitantes"  >
                  <option value="Visitante" selected>Visitante</option>
                    <?php
                      include "../ProcesoSubir/conexioneq.php";
                      $result  = $conexion->query("SELECT * from visitantes ");

                      if ($result) {
                        while ($fila = $result->fetch_object()) {
                          if($fila->id_visitante == $ridvistante){
                            ?>
                            <option selected="" value="<?php echo $fila->id_visitante?>">
                              <?php echo $fila->nombre?>
                            </option>
                            <?php
                          }
                          
                        }
                      }
                    ?>
                </select>
              </div>


            </div>

            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select  id="estacions" name="estacions" class="form-control SEst" onchange="actualizaM('cambioFoto');">
                  <option value="Estaciones" selected="selected">Estaciones</option>
                    <?php
                    include "../ProcesoSubir/conexioneq.php";
                    $result  = $conexion->query("select * from estacionmet est where est.activa = 1 ");

                    if ($result) {
                      while ($fila = $result->fetch_object()) {
                        if($fila->id_estacion == $ridestacion){
                          ?>
                          <option selected="" value="<?php echo $fila->id_estacion?>">
                            <?php echo $fila->codiogestacion?>
                          </option>
                          <?php
                        }else{
                          ?>
                          <option value="<?php echo $fila->id_estacion?>">
                            <?php echo $fila->codiogestacion?>
                          </option>
                          <?php
                        }
                        //echo "<option value='$fila->id_estacion'>$fila->codiogestacion</option>";
                      }
                    }
                    ?>
                    
                </select>
              </div>
            
              <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                <input type="input"  class="col-md-6 col-sm-6 col-xs-12 form-control has-feedback-left" id="fechas" name="fechas"  value="<?php echo date('d/m/Y', strtotime($rfecha)); ?>" disabled >
                <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
              </div>
            </div>
          
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <textarea class="form-control" rows="7" placeholder="Observación" id="observacions" name="observacions" 
              value="<?php echo $robservacion; ?>"><?php echo $robservacion; ?></textarea>
            </div>

            



            
              
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Estación Seleccionada</h2>
          <ul class="nav navbar-right panel_toolbox">
          </ul>
          
          <div class="clearfix"></div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">

          <div id="imagens">
            <?php
              include '../ProcesoSubir/conexioneq.php';
              $cambio=$_REQUEST["idd"];
              $result=$conexion->query("SELECT hs.idhojavisitaestaciones, est.foto from hojavisitasestaciones hs inner join estacionmet est on hs.id_estacion = est.id_estacion where hs.idhojavisitaestaciones= $cambio");
                
              while($fila = $result->fetch_object()){
              ?>
                <img width="445" height="290" src="data:image/jpg;base64,<?php echo base64_encode($fila->foto); ?>"/> 
              <?php
              }
            ?>
          </div>
          <!-- <center>
            <img  width="685" height="290" src="../../Vistas/images/volcan.jpg" alt="Los Angeles">
          </center>-->
        </div>
      </div>
    </div>
  </div>
