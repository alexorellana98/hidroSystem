<?php
require_once '../vendors/autoload.php';
use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>SICA | </title>

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
    <link href="../libreriasJS/alertifyjs/css/alertify.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../libreriasJS/alertifyjs/css/themes/bootstrap.css"/>
     <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <script src="../libreriasJS/alertifyjs/alertify.min.js"></script>
    <script src="js/propietariosPozos/alertasignacion.js"></script>
    <style>
     img.pequeña{
        width: 50px; height: 50px;
      }
      img.mediana{
        width: 60%; height: 40%;
      }
      img.grande{
        width: 500px; height: 250px;
        
      } 
      #row2{
        border: 0px;
      } 
    </style>
    <script type="text/javascript">
      function verificar1(opcion){
        alertify.set('notifier','position', 'top-right');
       alertify.success("Exito Datos almacenados");  
      }

        function newCbLanguage(){                 
            openCbLanguage(null, null, null, null, null);
        }
        
        function openCbLanguage(observador, equipo, fecha, tipouso, idImg){    
          
           
            $("#id").val(idImg);
            document.formCbLanguage.countrycode.value = observador;
            document.formCbLanguage.isbaselanguage.value = equipo;
            document.formCbLanguage.issystemlanguage.value = fecha;
//            document.formCbLanguage.descripcion.value = descripcion;
            document.formCbLanguage.tipouso.value = tipouso;
       

            document.formCbLanguage.countrycode.disabled = (action === 'see')?true:false; 
            document.formCbLanguage.isbaselanguage.disabled = (action === 'see')?true:false; 
            document.formCbLanguage.issystemlanguage.disabled = (action === 'see')?true:false; 

            $('#myModal').modal();
          
        }   

    </script>

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
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
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
                    <img src="images/img.jpg" alt="">Abigail
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
         <!-- <div class="">-->
            <div class="page-title">
              <div class="title_left">
                <h3>Asignación de Equipos.</h3>
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
              <div class="col-md-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formulario de ingreso.</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" id="formasignacion" name="formasignacion" method="POST">
                     <input type="hidden" name="bandera" id="bandera"/>
                     
                      
                      <div class="form-group">
                        <div class="col-md-7 col-sm-7 col-xs-6">
                          <select name="observador" id="observador" class="form-control" >
                           <option value="">Seleccionar Observador</option>
                       <?php
                          include "../ProcesoSubir/conexion.php";
                          $result=$mysqli->query("SELECT id_observador, nombre, activo FROM observadores WHERE activo=1");
                          if($result){

                             while ($fila = $result->fetch_object()) {

                               echo "<option value='".$fila->id_observador."'>".$fila->nombre."</option>" ;
                             }
                          }else{
                          }

                         ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <select class="form-control" id="equipo" name="equipo" >
                             <option value="">Seleccionar Equipo</option>
                                            <?php
                                include "../ProcesoSubir/conexion.php";
                                $result=$mysqli->query("SELECT idequipo, nombre FROM equipos");
                                if($result){

                                   while ($fila = $result->fetch_object()) {

                                     echo "<option value='".$fila->idequipo."'>".$fila->nombre."</option>" ;
                                   }
                                }else{
                                }
                                ?>
                          </select>
                        </div>
                      </div>
                     
                     <div class="col-md-7 col-sm-7 col-xs-12 form-group has-feedback">
                      <span class="label label-default" style="width: 220px; height: 20px; font-size: 15px; margin-bottom: 10px;
                      margin-left: 25px;" >Fecha de Asignación</span>

                      </div>

                      <div class="col-md-7 col-sm-7 col-xs-12 form-group has-feedback">
                        <input  name="fecha" id="fecha"  type="date" class="form-control has-feedback-left" placeholder="Fecha de asignación" min="<?php echo $now = Carbon::now()->subYear(1)->format('Y-m-d') ?>" max="<?php echo $now = Carbon::now()->addYear(0)->format('Y-m-d') ?>">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>


                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                     
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="button" class="btn btn-success" onclick="verificar('guardar');">Guardar</button>
                          <button type="reset" class="btn btn-warning">Cancelar</button>
						   <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                         
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>  
              <div class="col-md-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Imagen del equipo.</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 
                  <div class="x_content" >
                    

                    <br /> 
          
  <div style="height: 250px;" id="resultados" >
               
  </div>
               
                      
                       
                  </div>
                
              </div>     
            </div>
            <form id="asignacionEquipos" name="asignacionEquipos" action="" method="POST">
      <input type="hidden" name="accion" id="accion" >
      <input type="hidden" name="dato" id="dato" >
                <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                          <div class="x_title">
                            <h2>Lista de Equipos</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                              
                            </p>
                            
                            <table id="datatable-responsive" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                <th>Nombre de observador</th>
                                  <th>Equipo asignado</th>
                                  <th>Fecha de asignación</th>
                                  <th width="30px">Detalles</th>
                                </tr>
                              </thead>
                              <tbody>
                                <form role="form" name="formListCbLanguage" method="post" action="asignacionEquipos.php">

                                 


                                <?php
                                include "../ProcesoSubir/conexion.php";
                                try {
                                    $query = "SELECT observadores.nombre as observador, equipos.nombre as equipo, fechaasigna,idequipoobserv,equipos.tipouso as tipo,   equipos.idequipo as idim FROM equipoobservador
                                        INNER JOIN observadores ON observadores.id_observador=equipoobservador.idobservador
                                        INNER JOIN equipos ON equipos.idequipo=equipoobservador.idequipo
                                        ORDER BY idequipoobserv;";
                                    $result = $mysqli->query($query);
                                           
                                    if ($result) { 
                                    while ($fila = $result->fetch_object()) {
                                        ?>
                                        <tr>
                                            <td><?php print($fila->observador); ?></td>
                                            <td><?php print($fila->equipo); ?></td>
                                            <td><?php print($fila->fechaasigna); ?></td>
                                            
                                            <td><button id="see-language" name="see-language" type="button" class="btn btn-success"
                                                        data-toggle="modal"
                                                        data-target="#myModal"
                                                        onclick="openCbLanguage('<?php print($fila->observador); ?>',
                                                                    '<?php print($fila->equipo); ?>', '<?php print($fila->fechaasigna); ?>', '<?php print($fila->tipo); ?>','<?php print($fila->idim); ?>')">
                                                    Ver</button></td>
                                            </tr>      
                                         
                                    <?php
                                    }
                                  }
                                } catch (Exception $exception) {
                                    echo 'Error hacer la consulta: ' . $exception;
                                }
                                ?>  
                                   
                                </form>        
                            </tbody> 
                             <!-- <tbody>
                              <?php  ?>
                              </tbody>-->
                            </table>
                            
                          </div>
                      </div>
                </div>
          </form>

        
         
        </div>
        <!-- /page content -->

        <!-- footer content -->
       <?php 
       include "footer.php";
       ?>
        <!-- /footer content -->


<!-- 
    Create - Read - Update    
    Creamos una ventana Modal que utilizaremos para crear un nuevo idioma, actualizarlo o mostrarlo.
    We create a modal window used to create a new language, update or display.-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" style="width:650px;font-size: 13px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="clse" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Datos de Asignación de equipos</h4>
            </div>
            <form role="form" name="formCbLanguage" method="post" action="asignacionEquipos.php">
                <div class="modal-body"> 
                <div class="row">                                  
                    <input type="hidden" id="id" value="">
                    <div class="col-md-6 col-xs-6">
                <div class="input-group"> 
                        <label for="countrycode" style="width:300px;font-size: 13px;">Nombre de observador</label>
                        <input disabled style="width:300px;font-size: 16px;" type="text" class="form-control" id="countrycode" name="countrycode" placeholder="" aria-describedby="sizing-addon2">
                    </div>
                    <div class="input-group"> 
                        <label for="isbaselanguage" style="width:300px;font-size: 13px;">Nombre de equipo</label>
                        <input disabled style="width:300px;font-size: 16px;" type="text" class="form-control" id="isbaselanguage" name="isbaselanguage" placeholder="" aria-describedby="sizing-addon2">
                    </div>
                    <div class="input-group"> 
                        <label for="issystemlanguage" style="width:300px;font-size: 13px;">Fecha de asignación</label>
                        <input disabled style="width:300px;font-size: 16px;" type="text" class="form-control" id="issystemlanguage" name="issystemlanguage" placeholder="" aria-describedby="sizing-addon2">
                    </div>
                    <div class="input-group"> 
                        <label for="tipouso" style="width:300px;font-size: 13px;">Tipo uso del equipo</label>
                        <input disabled style="width:300px;font-size: 16px;" type="text" class="form-control" id="tipouso" name="tipouso" placeholder="" aria-describedby="sizing-addon2">
                    </div>
                    <div class="input-group"> 
                        <button id="verimagen" type="button" class="btn btn-primary" >Ver imagen</button>  
                    </div>    
            </div>
            <div class="col-md-6 col-xs-6">
                <div id="imagenEdit" style="display: none;">

                    <iframe allowfullscreen style="height: 270px; width: 300px;" id="imdiv" class="embed-responsive-item" src=""  scrolling="no" frameborder="0">
                      

                    </iframe>
                    </div>
            </div> 

                <div class="modal-footer">
                
                     <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                                    
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    



        <!-- Modal de validacion-->
    <div class="modal fade" id="modalCatalogo" tabindex="-1" role="dialog" aria-labelledby="modalCatalogo" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Catalogo de cuentas </h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <?php

    
            include "../ProcesoSubir/conexion.php";

  $accion=$_REQUEST["accion"];
  $dato=$_REQUEST["dato"];

  if($accion=="editar"){

     

 
$result=$mysqli->query("SELECT observadores.nombre as observador, equipos.nombre as equipo, fechaasigna, equipos.foto as foto FROM `equipoobservador` 
INNER JOIN observadores ON observadores.id_observador=equipoobservador.idobservador
INNER JOIN equipos ON equipos.idequipo=equipoobservador.idequipo
where idequipoobserv='".$dato."'
ORDER BY idequipoobserv");
if ($result) {
    while ($fila = $result->fetch_object()) {
        $observadorN        = $fila->observador;
        $nombreEq        = $fila->equipo;
        $fecha  = $fila->fechaasigna;
        $fotoEq  = $fila->foto;
       
    }
}
}
            ?>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
  
                        <input type="text" class="form-control has-feedback-left" id="dui" value="<?php echo $nombreEq ?>" readonly="readonly">

                        <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                      </div>

          </div><!--fin del div modal body-->
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-dismiss="modal"> OK </button>
            <!--<button class="btn btn-primary" type="button" data-dismiss="modal" onclick="validar()"> Continuar </button>-->
          </div>
        </div>
      </div>
    </div>



      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../libreriasJS/alertifyjs/alertify.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/propietariosPozos/alertasignacion.js"></script>
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
  <script type="text/javascript">


$(document).ready(function(){

      $("#verimagen").on("click",function(){
        var ruta="";
        var id=$("#id").val();

         ruta="getImagenmodl.php?id="+id;

        $("#imdiv").prop("src",ruta);
        $("#imagenEdit").show();
        $("#verimagen").hide();

      });

      $("#cancel").on("click",function(){
        
        $("#imagenEdit").hide();
        $("#verimagen").show();

      });

      $("#clse").on("click",function(){
        
        $("#imagenEdit").hide();
        $("#verimagen").show();

      });

      $("#equipo").change(function () {
      $("#equipo option:selected").each(function () {
          idequipo = $(this).val();
            $.post("../Controladores/getImagen.php", { idequipo: idequipo }, function(data){
            $("#resultados").html(data);
            });

        });
      })
    });

  
</script>

	
  </body>
</html>
<?php
    include '../Config/conexion.php';
    $bandera=$_REQUEST["bandera"];
    $observador=$_REQUEST["observador"];
    $equipo=$_REQUEST["equipo"];
    $fecha=$_REQUEST["fecha"];

if ($bandera == "guardar") {
    $query = mysqli_query($mysqli, "INSERT INTO equipoobservador(idobservador,idequipo,fechaasigna) 
                                VALUES('$observador','$equipo','$fecha')")
                                or die('Error: '.mysqli_error($mysqli)); 


    if ($query == TRUE) {
       mensaje("exito","guardar");
    } else {
       mensaje("error","guardar");
    }
}

function mensaje($tipo,$opcion){
            echo "<script language='javascript'>";
            echo "detener();";
            echo "alerta('".$tipo."','".$opcion."');";
            echo "</script>";
}
?>