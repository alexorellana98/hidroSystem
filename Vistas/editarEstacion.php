<!--******************************Dialog**************************-->  
 <script>
    function soloNumero(e) {
        key = e.keyCode || e.which;
        teclado = String.fromCharCode(key);
        numerito = "0123456789";
        especiales = "8-37-38-46";
        teclado_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial = true;
            }
        }
        if (numerito.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
        }
    }


    function soloLetras(e) {
        key = e.keyCode || e.which;
        teclado = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = "8-37-38-46-164";
        teclado_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial = true;
                break;
            }
        }
        if (letras.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
        }
    }

</script>
<form name="editform" method="POST" enctype="multipart/form-data">

   

    <div class="modal fade" id="actualizarVisitante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h3 class="modal-title" id="myModalLabel"><font font font font font font color="black">Modificar Estacion</font></h3> </center>
                </div>

                <div class="panel-body">
                    <br>
    	            <input type="hidden" name="bandera2" id="bandera2">
                    <input type="hidden" name="baccion2" id="baccion2">
                     <input type="hidden" class="form-control has-feedback-left" id="longitud2" name="longitud2" placeholder="Longitud">
                        <input type="hidden" class="form-control has-feedback-left" id="latitud2" name="latitud2" placeholder="Latitud">
                    <input type="hidden" class="form-control has-feedback-left" id="correaux" name="correaux" placeholder="correlativo">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">Codigo
                               <input type="text" class="form-control has-feedback-left" id="codigom" name="codigom" placeholder="Codigo" value="" readonly>
                            
                                </div>
                                <div class="col-md-6">Departamento
                                 <select class="form-control" id="lista1m" name='lista1m' onchange="pruebam()">
                            <option value="0">Departamento</option>
                            <?php 
                            include "../ProcesoSubir/conexioneq.php";
                             $consulta  = "select * from departamentos";
                             $resultado = $conexion->query($consulta);
                             if ($resultado) {
                               while($fila= $resultado->fetch_object()){
                                echo "<option value='".$fila->iddepto."'>".$fila->nombredepto."</option>";
                               }
                                 
                             } else {
                                echo "<option value=''>Error conectando la BD</option>";
                             }
                            
                            ?>
                            
                          </select>
                                </div>
                            </div><br>

                            <div class="row">
                     
                                <div class="col-md-6" id="listam" name="listam"> Municipio
                                    
                                </div>
                                 <div class="col-md-6">Institucion
                                     <select class="form-control" id="institucionm" name="institucionm">
                            <option value="">Institucion</option>
                            <?php 
                            include "../ProcesoSubir/conexioneq.php";
                             $consulta  = "select * from respestaciones";
                             $resultado = $conexion->query($consulta);
                             if ($resultado) {
                               while($fila= $resultado->fetch_object()){
                                echo "<option value='".$fila->idresponsable."'>".$fila->institucion."</option>";
                               }
                                 
                             } else {
                                echo "<option value=''>Error conectando la BD</option>";
                             }
                            ?>
                          </select>
                                </div>
                                
                            </div><br>

                            <div class="row">
                               
                                <div class="col-md-12">Subir Fotografía(PNG,JPEG,JPG)
                                    <input type="file" class="form-text" id="imagen2" name="imagen2" required accept="image/jpg,image/png,image/jpeg">
                                </div>
                                
                                
                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                 <div class="embed-responsive" style="height:210px;">
                                    <iframe id="mapita" name="mapita" style="height:210px;" src="ej.php" class="embed-responsive-item" allowfullscreen></iframe>
                                 </div>
                                </div>
                            </div>
                            <div class="row">
                            <p>Seleccione una nueva ubicacion </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="verificarM()">Actualizar</button>
                </div> 
            </div>
        </div> 
    </div> 
</form>


<?php

if (!empty($_REQUEST['duisito'])) {
    try {        
    
    $duVi =  $_REQUEST['duisito'];
    $nomVi = $_REQUEST['nombresito'];
    $genVi = $_REQUEST['generito'];
    $tipVi = $_REQUEST['tipito'];
    $celVi = $_REQUEST['celul'];

    $idActualizacion = $_REQUEST['idDeActualizacion'];

    mysqli_query($conexion, "UPDATE visitantes SET dui='$duVi',nombre='$nomVi',genero='$genVi',tipo='$tipVi',celular='$celVi' WHERE id_visitante ='$idActualizacion'");

  
    } catch (Exception $ex) {
        
    }
}
?>


<script src="../LibreriasJS/jquery.mask.min.js"></script>

<script type="text/javascript">
    $('.mask-dui').mask('00000000-0');
    $('.mask-celular').mask('0000-0000');

</script>

