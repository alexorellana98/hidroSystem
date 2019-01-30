<?php 
  error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SISPOZOS</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
   <!-- Librerias de Alertify -->
    <link rel="stylesheet" href="../libreriasJS/alertifyjs/css/alertify.css"/>
    <link rel="stylesheet" href="../libreriasJS/alertifyjs/css/alertify.min.css"/>
    <link rel="stylesheet" href="../libreriasJS/alertifyjs/css/themes/bootstrap.css"/>
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/visitaEstaciones/estilo.css">



    <script src="../libreriasJS/alertifyjs/alertify.js"></script>
    <script src="../libreriasJS/alertifyjs/alertify.min.js"></script>

    <script src="js/vistaEstaciones/visita.js"></script>
  

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
                    <span>Alexander Orellana</span>
                    <span class=" fa fa-angle-down"></span>
                    
                  </a>
                  
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="../login.html"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
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
            <div class="page-title col-md-12 col-sm-12 col-xs-12">
              <h3 >Visita Estación Meteorológica</h3>
            </div>
            <div class="clearfix"></div>

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
                    <form id="frmvis" name="frmvis" class="form-horizontal form-label-left input_mask" method="POST" action="service.php">

                      <input type="hidden" name="bandera" id="bandera" value=""/>
                      <input type="hidden" name="baccion" id="baccion" value="<?php echo $ridhoja ;?>"/>


                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class=" form-control STipo" id="tipo" name="tipo" onchange="actualiza('cambioTipo');">
                            <option value="Tipo Visitante" >Tipo Visitante</option>
                            <option value='Investigador'>Investigador</option>
                            <option value='Docente'>Docente</option>
                            <option value='Estudiante'>Estudiante</option>
                            <option value='Otros'>Otros</option>
                          </select>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class=" form-control SVisitante" id="visitante" name="visitante"  *>
                            <option value="Visitante" selected="selected">Visitante</option>

                          </select>
                      </div>


                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select  id="estacion" name="estacion" class="form-control SEstacion" onchange="actualiza('cambioFoto');">
                            <option value="Estaciones" selected="selected">Estaciones</option>
                            <?php
                              include "../ProcesoSubir/conexioneq.php";
                              $result  = $conexion->query("select * from estacionmet est where est.activa = 1 ");

                              if ($result) {
                                  while ($fila = $result->fetch_object()) {
                                      echo "<option value='$fila->id_estacion'>$fila->codiogestacion</option>";
                                  }
                              }
                            ?>


                          </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                          <input type="input"  class="col-md-6 col-sm-6 col-xs-12 form-control has-feedback-left" id="fecha" name="fecha"  value="<?php ini_set('date.timezone',  'America/El_Salvador'); echo date('d/m/Y');  ?>" disabled >
                          <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <textarea class="form-control" rows="3" placeholder="Observación" id="observacion" name="observacion"></textarea>
                        </div>


                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>



                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="button" onclick="enviarDatos();" class="btn btn-success">Guardar</button>
                          <button type="button" onclick="cancelar();" class="btn btn-warning">Cancelar</button>

                        </div>
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

                    <div id="imagen">
                      <center>
                        <img  width="445" height="290" src="images/volcan.jpg" alt="Los Angeles">
                      </center>
                    </div>
                   <!-- <center>
                      <img  width="685" height="290" src="../../Vistas/images/volcan.jpg" alt="Los Angeles">
                    </center>-->
                  </div>
                </div>
              </div>
            </div>

              <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Datos </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content" id="tbl"  >
                        <table id="datatable-fixed-header" class="table table-striped table-bordered imprimir" >
                          <thead>
                            <tr>
                              <th style="display:none;">id</th>
                              <th >Visitante</th>
                              <th >Tipo</th>
                              <th >Estación</th>
                              <th >Fecha</th>
                              <th >Ver</th>
                              <th >Editar</th>
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
                                      <td ><?php echo $fila->nombre; ?></td>
                                      <td ><?php echo $fila->tipo; ?></td>
                                      <td ><?php echo $fila->codiogestacion; ?></td>
                                      <td ><?php echo date('d/m/Y', strtotime($fila->fechavisita));  ?></td>

                                      <td  class="text-center">
                                        <button class="btn btn-success btn-icon left-icon" data-toggle="modal"  data-target="#detalle" onclick="verMas('', '<?php echo $fila->idhojavisitaestaciones; ?>')">
                                          <i class="fa fa-search"></i>
                                          <span></span>
                                        </button>
                                      </td>
                                      <td  class="text-center" >
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
                      </div>
                    </div>
                </div>
            </div>

          </div>
          <br><br>
        </div>
        <!-- /page content -->

        <!-- footer content -->
       <?php
          include "footer.php";
       ?>
       <!--- Modal Detalle Visita-->

        <div class="modal fullscreen-modal fade" id="detalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog large " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <center>
                  <h3 class="modal-title" id="exampleModalLabel">Detalle de la visita</h3> </center>
              </div>
              <div class="modal-body" id="cargaDetalle">

              </div>
              <br><br><br><br><br><br>
              <br><br><br><br><br><br>
              <br><br><br><br><br><br>
              <br><br><br>
              
                <div class="modal-footer">
                  <button type="button" class="btn btn-round btn-warning" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
          </div>
        </div>
        <!-- Fin Modal -->

        <!--- Modal Detalle Actualizar-->

        <div class="modal fade" id="modificacion" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
              <div class="modal-header">
                
                <center>
                  <h3 class="modal-title" id="exampleModalLabel">Actualización</h3> </center>
              </div>
              <div class="modal-body" id="cargaAct">

              </div>
              
                <div class="modal-footer">
                  <button type="button" class="btn btn-success pull-left" data-dismiss="modal" onclick="actualizaDatos();" >Modificar</button>
                  <button type="button" class="btn btn-warning pull-right" data-dismiss="modal" onclick="cancelarM()">Cancelar</button>
                </div>
            </div>
          </div>
        </div>
        <!-- Fin Modal -->

        <!-- /footer content -->

      </div>
    </div>
  </div>


     <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>

    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot pluins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date-es-ES.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
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



    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <script>

          $(function () {
            $('.SVisitante').select2();
            $('.SEstacion').select2();
            $('.STipo').select2();
          });
           
    </script>
  </body>
</html>
