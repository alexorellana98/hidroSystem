<?php
  include ("../ProcesoSubir/conexioneq.php");
  $ide=$_REQUEST["idd"];
  $ridcomunidad      = "";
  $rnombre       = "";
  $rtipo = "";
  $riddepto  = "";
  $ridmunicipio  = "";
  $ridinstitucion = "";

  $result = $conexion->query("SELECT* ,municipios.nombre as municipios FROM respestaciones,municipios,comunidades,departamentos where comunidades.iddepartamento=departamentos.iddepto and municipios.idmunicipio=comunidades.idmunicipio and comunidades.idobservador=respestaciones.idresponsable and comunidades.idcomunidad='$ide'");

  //$result = $conexion->query("SELECT * from hojavisitasestaciones where idhojavisitaestaciones='$ide'");

  if ($result) {
      while ($fila = $result->fetch_object()) {
          $ridcomunidad = $fila->idcomunidad;
          $rnombre       = $fila->nombre ;
          $rtipo = $fila->tipo ;
          $riddepto  = $fila->iddepto;
          $ridmunicipio  =  $fila->idmunicipio ;
          $ridinstitucion = $fila->idresponsable;
      }

  }

?>
<div class="row">
  <div class="col-md-12 col-xs-12">
    <div class="x_panel">
       <div class="x_title">
          <h2>Ingreso de datos</h2>
          <ul class="nav navbar-right panel_toolbox">                   
          </ul>
          <div class="clearfix"></div>
        </div>
        
        <div class="x_content">
          <br />

          <form id="modifi" >
            <input type="hidden" name="baccion2" id="baccion2" value="<?php echo $ide; ?>">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              <input type="text" class="form-control has-feedback-left"  id="nombr" name="nombr" placeholder="Nombre de la  institución o comunidad." value="<?php echo $rnombre; ?>" required>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
                        
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12" required>
                <select class="form-control" id="nombdepto" name="nombdepto" onchange="buscarM(this.value,'buscarMunicipios')">
                  <option value="0" >Departamento</option>
                    <?php
                      include "../ProcesoSubir/conexioneq.php";
                      $result  = $conexion->query("SELECT * from departamentos ");
                      //$query = $mysqli -> query ("SELECT * FROM departamentos");
                      if ($result) {
                        while ($fila = $result->fetch_object()) {
                          if($fila->iddepto == $riddepto){
                            ?>
                            <option selected="" value="<?php echo $fila->iddepto?>">
                              <?php echo $fila->nombredepto?>
                            </option>
                            <?php
                          }else{
                          ?>
                            <option value="<?php echo $fila->iddepto?>">
                              <?php echo $fila->nombredepto?>
                            </option>
                            <?php
                          }
                          
                        }
                      }
                      
                    ?>
                </select>
              </div>
                 <br>
               
            </div>
               <br>
               <br>
            <div class="col-md-6 col-sm-6 col-xs-12" id="buscarMunicipios" >
              <select class="form-control" id="municipis" name="municipis"  required>
                <option value="0" >Municipio</option>
                  <?php
                      include "../ProcesoSubir/conexioneq.php";
                      $result  = $conexion->query("SELECT * from municipios ");

                      if ($result) {
                        while ($fila = $result->fetch_object()) {
                          if($fila->idmunicipio == $ridmunicipio){
                            ?>
                            <option selected="" value="<?php echo $fila->idmunicipio?>">
                              <?php echo $fila->nombre?>
                            </option>
                            <?php
                          }
                          
                        }
                      }
                    ?>
              </select>
            </div>
              
                       
            <div class="form-group">

              <div class="col-md-6 col-sm-6 col-xs-12" id="" >
                <select class="form-control" id="insti" name="insti" required>
                  <option value="0">Responsable de la institución o comunidad</option>
                    
                    <?php
                      include "../ProcesoSubir/conexioneq.php";
                      $result  = $conexion->query("SELECT * from respestaciones ");
                      //$query = $mysqli -> query ("SELECT * FROM departamentos");
                      if ($result) {
                        while ($fila = $result->fetch_object()) {
                          if($fila->idresponsable == $ridinstitucion){
                            ?>
                            <option selected="" value="<?php echo $fila->idresponsable?>">
                              <?php echo $fila->institucion?>
                            </option>
                            <?php
                          }else{
                          ?>
                            <option value="<?php echo $fila->idresponsable?>">
                              <?php echo $fila->institucion?>
                            </option>
                            <?php
                          }
                          
                        }
                      }
                      
                    ?>
                </select>
              </div>

              <br>
              <br>
              <br>
                 <br>
                 <br>
              
              <div class="input-group " style="padding-bottom:25px;" >
                <span class="label label-default" style="width: 100px; font-size: 15px;margin-right:20px;margin-left:20px">Tipo</span>
                <label class="radio-inline" style="width: 100px; font-size: 15px"><input type="radio" name="tipp" id="tcomunidad" value="Comunidad" 
                <?php
                  if($rtipo=="Comunidad"){
                    echo "checked";
                  }
                ?>
                >Comunidad</label>
                <label class="radio-inline" style="width: 100px; font-size: 15px"><input type="radio" name="tipp" id="tinstitucion" value="Institucion"
                <?php
                  if($rtipo=="Institucion"){
                    echo "checked";
                  }
                ?>
                >Institución</label> 
                
              </div>
                        
              <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
              </div>
                     
                      
                      
              <div class="ln_solid"></div>
              

                        
          </form>
        </div>
      </div>
    </div> 
</div>