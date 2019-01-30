<!DOCTYPE html>
<html lang="en">
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SISPOZOS</title>

      <!-- ALERTASSSSSS -->
    <link rel="stylesheet"  type="text/css" href="../libreriasJS/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../libreriasJS/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="../libreriasJS/alertifyjs/css/alertify.rtl.css">
    <link rel="stylesheet" type="text/css" href="../libreriasJS/alertifyjs/css/alertify.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="../libreriasJS/alertifyjs/css/themes/default.css">

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">




  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
             <!-- sidebar menu -->
             <?php
               include "menuPrincipal.php";
            ?>

            <!-- /sidebar menu -->

            <!-- /menu profile quick info -->

            <br />



            <!-- /menu footer buttons -->
           
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="" alt="">Mayra Quintanilla
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Visita Pozos</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <!-- <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formulario de ingreso</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-register" method="post" action="" name="formulario">

                      <input type="hidden" name="pase" id="pase">

                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-6">

                          <select class="form-control" name="visitantes" id="visitantes" required>

                             <?php
                                     include_once '../ProcesoSubir/conexion.php';
                                      $verVisitante= mysqli_query($mysqli,"SELECT id_visitante, nombre  FROM visitantes ");
                            ?>
                              <option >Visitante</option>
                            <?php
                             while ($row = mysqli_fetch_array($verVisitante)) {
                                         $id_visitante=$row['id_visitante'];
                                           echo '<option value='."$row[0]".'>'.$row['1'].'</option>';
                                    }
                                    ?>
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-7">
                          <select class="form-control" name="pozo" id="pozo" required>
                              <?php
                                          include_once '../ProcesoSubir/conexion.php';
                                          $verPozo= mysqli_query($mysqli,"SELECT id_pozo, codigopozo FROM pozos");
                              ?>
                            <option>Pozo</option>
                            <?php
                             while ($row = mysqli_fetch_array($verPozo)) {
                                         $id_pozo=$row['id_pozo'];
                                           echo '<option value='."$row[0]".'>'.$row['1'].'</option>';
                                    }
                                    ?>
                            </select>
                        </div>

                      </div>

                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback">
                        <input type="date" name="fecha" class="form-control has-feedback-left" placeholder="Fecha" id="fecha" >
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback">
                        <input type="text" name="nivel" id="nivelito" class="form-control decimal-2-places" placeholder="Nivel(m)" autocomplete="off" maxlength="5" required >

                      </div>

                      </div>
                      <div class="form-group">
                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback" align="left">
                          <textarea class="form-control" name="obser" rows="2" placeholder="Observación" id="observacion" pattern=".{8,}" maxlength="200" required></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                       <button type="submit" class="btn btn-success" id="guarda" value="Guardar">Guardar</button>
                          <button type="submit" class="btn btn-warning" href="visitapozos.php">Cancelar</button>
               <!-- <button class="btn btn-primary" type="reset">Reset</button> -->

                        </div>
                      </div>

                      </div>

                  </div>
                </div>
              </div>
            </div>
</form>
       <div class="row">
              <div class="col-md-15 col-xs-15">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Datos</h2>
                    <!--para desplegar la tabla-->
                     <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                   </li>

                    </ul><!--FIN para desplegar la tabla-->
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Visitante</th>
                          <th>Pozo</th>
                          <th>Fecha</th>
                          <th>Nivel</th>
                          <th>Observación</th>
                          <th>Editar</th>

                        </tr>
                      </thead>
                            <!-- extraccion de datos de la base  -->
                            <tbody>

                          <?php
                          include "../ProcesoSubir/conexion.php";
              $query = mysqli_query ($mysqli,"SELECT v.nombre, p.codigopozo, hvp.fechavisita, hvp.`level`, hvp.observacion, hvp.id_visitante, hvp.id_pozo FROM pozos p, hojavisitaspozos hvp, visitantes v
             where p.id_pozo = hvp.id_pozo and hvp.id_visitante = v.id_visitante;");

                while ($fila=mysqli_fetch_array($query)) {
                    $nombrevisi =$fila['nombre'];
                    $codigo = $fila['codigopozo'];
                    $fecha=$fila['fechavisita'];
                    $nivel=$fila['level'];
                    $observa=$fila['observacion'];
                    $id=$fila['id_visitante'];
                    $idpo=$fila['id_pozo'];
                ?>

                        <tr>
                          <td><?php echo $fila['nombre']; ?></td>
                          <td><?php  echo $fila['codigopozo']; ?></td>
                          <td><?php  echo $fila['fechavisita'];?></td>
                          <td><?php  echo $fila['level']; ?></td>
                          <td><?php  echo $fila['observacion']; ?></td>

                         <td><!--boton de modificar-->
                                  <div class="row">
                                    <div class="col-md-6">
                                      <a href="visitapozoModal.php?ir=<?php echo $id;?>&f=<?php echo $fecha;?>&p=<?php echo $idpo;?> "><button type="button" class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                        </a>

                                    </div>


                                  </div>
                                  </td>
        <!-- boton eliminar  -->

                            </tr>

                       <?php } ?>

                      </tbody>

                    </table>

                      </div>
                      </div>

                    </form>
                  </div>
                </div>
        <!-- /page content -->

        <!-- llamada al footer -->
       <?php
       include "footer.php";
       ?>
        <!-- /footer content -->
      </div>
    </div>

          <!-- insertar datos a la tabla de la base -->
           <?php

           if (isset($_REQUEST['pase'])) {
             # code...
           $visitantes=$_REQUEST['visitantes'];
           $pos=$_REQUEST['pozo'];
            $fe=$_REQUEST['fecha'];
             $ni=$_REQUEST['nivel'];
              $ob=$_REQUEST['obser'];

$nuevo_visi = mysqli_query ($mysqli,"SELECT * FROM hojavisitaspozos where id_visitante='$visitantes' and id_pozo='$pos' and fechavisita='$fe'");

if(mysqli_num_rows($nuevo_visi)>0)
{
echo "
<p class='avisos'> ya esta registrado</p>
<p><a>Volver atrás</a></p>
";
} else {

    include "../ProcesoSubir/conexion.php";
      $sql = "INSERT INTO hojavisitaspozos (fechavisita,observacion,level,id_visitante,id_pozo) VALUE('$fe','$ob','$ni','$visitantes','$pos')";
               $result = $mysqli->query($sql);


               ?>
               <!-- funcion para la alerta -->
           <script type="text/javascript">
              $(document).ready(function(){

                $("#guarda").click(function(){
                  alertify.alert("Guardado con exito");

                });
              });

            </script>

               <script type="text/javascript">
         location.href = "visitapozos.php";
</script>
<?php

             }}

            ?><!-- fin de insertar datos -->

<!-- PROCESO PARA EDITAR LOS DATOS DE LA TABLA -->

<?php

if (!empty($_REQUEST['visitantes'])) {
    try {

    $nvis =  $_REQUEST['visitantes'];
    $codip = $_REQUEST['pozo'];
    $fech = $_REQUEST['fecha'];
    $ni = $_REQUEST['nivel'];
    $obse = $_REQUEST['obser'];

    $idActualizacion = $_REQUEST['idDeActualizacion'];

    mysqli_query($mysqli, "UPDATE hojavisitaspozos SET nombre='$nvis',codigopozo='$codip',fechavisita='$fech',level='$ni',observacion='$obse' WHERE id_visitante ='$idActualizacion'");


    } catch (Exception $ex) {

    }
}
?>
<!-- FIN DEL PROCESO EDITAR DE LA TABLA -->

<!-- MODAL PARA ELIMINAR
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel"><font font font font color="black">Eliminar Registro</font></h3>
                </div>

                <div class="panel-body">

                    Esta Seguro que desea eliminar este registro?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger btn-ok" >Eliminar</a>
                </div>
            </div>
        </div>
    </div>

MODAL
<script>
    $('#confirm-delete').on('show.bs.modal', function(e){
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        $('.debug-url').html('Eliminar URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    })
</script>-->


    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

<!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>


    <script src="../js/toastr.js"></script>
    <script src="../js/notify.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../libreriasJS/jquery.mask.min.js"></script>
    <script src="../libreriasJS/jquery.numeric.js"></script>
    <script src="../libreriasJS/alertifyjs/alertify.js"></script>
    <script src="../libreriasJS/alertifyjs/alertify.min.js"></script>
</body>
</html>


<!-- funcion para  editar -->

<script>
function Editar_visitapozo(codigopozo,fechavisita,level,observacion,id){
    $("#codipo").val(codigopozo);
    $("#fec").val(fechavisita);
    $("#niv").val(level);
    $("#obs").val(observacion);
    $("#idDeActualizacion").val(id);


}
</script>

<script type="text/javascript">

 jQuery(function($){
            // Definimos las mascaras para cada input
            $("#").mask("00.00");

        });


    </script>


<script type="text/javascript">
  $(document).ready(function(){
    validarCualquierNumero()
  });
  function validarCualquierNumero(){

  $(".numeric").numeric();
  $(".integer").numeric(false, function() { alert("Integers only"); this.value = ""; this.focus(); });
  $(".positive").numeric({ negative: false }, function() { alert("No negative values"); this.value = ""; this.focus(); });
  $(".positive-integer").numeric({ decimal: false, negative: false }, function() { alert("Positive integers only"); this.value = ""; this.focus(); });
    $(".decimal-2-places").numeric({ decimalPlaces: 2 });
  $("#remove").click(
    function(e)
    {
      e.preventDefault();
      $(".numeric,.integer,.positive,.positive-integer,.decimal-2-places").removeNumeric();
    }
  );
  }

</script>
