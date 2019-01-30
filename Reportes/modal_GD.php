<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Sistema Hidrometeorologico</title>

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
               include "../Vistas/menuPrincipal.php";
               $po=$_GET['po'];
                $f=$_GET['f'];
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
                    <img src="images/img.jpg" alt="">Kevin Montano
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
                <h3>Reporte del Rain Rate Promedio</h3>
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
                      <!-- MODAL-->
            <div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" id="MiModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4>¿Que desas visualizar?</h4>
                            
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                 <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                   
                                    <a href="../Reportes/vista_GD.php" class="btn">
                                    <input type="submit" class="btn btn-warning" value="Cancelar" name="modGuardar">
                                      </a>
                                </div>
                                 <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                     <a href="../Reportes/reporte_GD.php?po=<?php echo $po;?>&f=<?php echo $f;?>" class="btn">
                                    <input type="submit" class="btn btn-info" value="Reporte" name="modGuardar">
                                      </a>

                                </div>
                                 
                                 <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                     <a href="../Reportes/graficateto1.php?po=<?php echo $po;?>&f=<?php echo $f;?>" class="btn">
                                   <input type="submit" class="btn btn-success" value="Grafica" name="modGuardar">
                                    </a>
                                </div>

                               
                                </div>
                            
                                </div>   
                                <!--ERROR COMUN Y LO DEJARE AQUI PARA QUE VEAS
                                LA ETIQUETA </form> DETRO DE ELLA SIEMPRE TEIENE QUE ESTAR LOS BOTONES-->

                                
                           
                        </div>


                    </div>
                </div>
            </div>
            <!-- Fin Div de modal-->
                 <form action="" id="f1" name="f1" method="post" class="form-register" >
        <!--<input type="hidden" value="upload" id="upload" name="a" />-->
        <input type="hidden" name="tirar" id="pase"/>
                  <div class="x_title">
                    
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask">

                      <div class="col-md-5 col-sm-5 col-xs-5 form-group has-feedback">
                        <h4>Estado del Pozo</h4>
                      </div>
                         <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                            <select class="form-control" name="pozo">
                              <?php
                                          include_once '../ProcesoSubir/conexion.php';
                                          $verPozo= mysqli_query($mysqli,"SELECT id_pozo, estado FROM pozos");
                              ?>
                            <option>Seleccionar</option>
                            <?php
                             while ($row = mysqli_fetch_array($verPozo)) {
                                         $idpozo=$row['id_pozo'];
                                           echo '<option value='."$row[0]".'>'.$row['1'].'</option>';
                                    }
                                    ?>
                            </select>
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                     
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Procesar</button>
                          <button type="button" class="btn btn-warning">Cancelar</button>
						   <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                         
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>      
            </div>

          

        
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
       <?php 
       include "../Vistas/footer.php";
  ?>      
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
	
  </body>
</html>
<script type="text/javascript">
    $('#MiModal').modal('show');
</script>
