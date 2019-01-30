<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>HIDROSIS</title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- inicio alertify -->
      <!-- include the style -->
      <link rel="stylesheet" href="../../libreriasJS/alertifyjs/css/alertify.css" />
      <!-- include a theme -->
      <link rel="stylesheet" href="../../libreriasJS/alertifyjs/css/themes/default.css" />
    <!-- fin alertify -->

    
    
    <!-- Datatables -->
    <link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">

    <style>
    #preview {
      width: 30%;
      margin: 0 auto;
      margin-bottom: 10px;
      position: relative;
    }
         
    #preview a {
      position: absolute;
      bottom: 5px;
      left: 5px;
      right: 5px;
      display: none;
    }

    input[type=file] {
      position: absolute;
      visibility: hidden;
      width: 0;
      z-index: -9999;
    }      
  </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
             <!-- sidebar menu -->
             <?php 
               include "../menuPrincipal.php";
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
                  Administrador
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
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
                <h3>Responsables de Estaciones Meteorol&oacute;gicas</h3>
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

            <!-- inicio del formulario -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formulario de ingreso de datos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" id="fromregistro" name="fromregistro" enctype="multipart/form-data">
                      <input type="hidden" id="actualizar" name="actualizar">
                      <input type="hidden" id="validarcampo" name="validarcampo">
                      
                      <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <!--inicia el div para capturar la imagen -->
                        <div class="form-group " align="center" id="img1">
                          <label for="control-label" for="foto">Foto</label>
                          <div name="preview" id="preview" class="thumbnail">
                            <a href="#" id="file-select" class="btn btn-success"><span class="fa fa-camera">&nbsp;&nbsp;&nbsp;</span>Elegir archivo</a>
                            <img id="imagen" name="imagen" src="../images/img2.png"/>
                            
                          </div>

                            <div id="file-submit" >
                              <input id="file" name="file" type="file" accept="image/jpeg,image/jpg,image/png"/>
                              <span class="help-block" id="img2"></span>
                            </div> 
                          </div><br>
                        <!--finaliza el div para capturar la imagen -->
                        <br>
                        
                      </div>
                      <div class="form-group col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group" id="resultins">
                          <label for="institucion">&nbsp;&nbsp;Instituci&oacute;n / Comunidad: </label>
                          <div class="col-md-12 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="institucion" name="institucion" placeholder="Digite Nombre Instituci&oacute;n (Alcad&iacute;a, ADESCO, Unidad,  Otro)" tabindex="1">
                            <span class="fa fa-institution form-control-feedback left" aria-hidden="true"></span>
                            <span class="help-block" id="resultin"></span>
                          </div>
                         
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-md-1 col-xs-12" for="responsable">Responsable: </label>
                          <div class="col-md-12 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="responsable" name="responsable"  placeholder="Digite Nombre Completo Responsable" tabindex="2">
                            <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-1 col-xs-12" for="direccion">Direcci&oacute;n: </label>
                          <div class="col-md-12 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="direccion" name="direccion" placeholder="Digite Direcci&oacute;n" tabindex="3">
                            <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label" for="telefono1">&nbsp;&nbsp;Tel&eacute;fono Fijo: </label>
                          <div class="col-md-12 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="telefono1" name="telefono1" placeholder="Digite N&uacute;mero de Tel&eacute;fono" data-inputmask="'mask': '9999-9999'" tabindex="4">
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>
                        


                        <div class="form-group">
                          <label class="control-label" for="telefono2">&nbsp;&nbsp;Tel&eacute;fono Celular: </label>
                          <div class="col-md-12 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="telefono2" name="telefono2" placeholder="Digite N&uacute;mero de Tel&eacute;fono" data-inputmask="'mask': '9999-9999'" tabindex="5">
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>

                      </div>


                      <div class="col-md-12 col-xs-12">
                        <div class="ln_solid"></div>
                        <div class="form-group" align="center">
                          <button class="btn btn-success" type="button"  id="btnguardar" name="btnguardar">  Guardar</button>
                          <button class="btn btn-success" type="button"  id="btnactualizar" name="btnactualizar">  Modificar</button>
                          <button type="button" class="btn btn-warning" onclick="cancelar()" >Cancelar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>      
            </div><!--Fin del formulario-->

            <!-- inicio del formulario -->
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Responsables</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- inicio tabla-->
                    <div id="div_resultado_responsable">
                      <?php include ("tabla_responsables.php"); ?>
                    </div>
                    <!-- fin tabla-->
                 
                  </div>
                </div>
              </div>      
            </div><!--Fin del formulario-->
            
                 

          </div>

          <!-- Modal -->
          <div class="modal fade" id="datosResponsable" name="datosResponsable" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog ">
                      <div class="modal-content">

                        <div class="modal-header">
                        <center>
                          <h4 class="modal-title" id="myModalLabel">Informaci&oacute;n Responsable de Estaciones Meteorológicas</h4></center>
                        </div>
                        <div class="modal-body1">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-round btn-primary" id="modalcancelar" name="modalcancelar" data-dismiss="modal">  Cerrar</button>
                        </div>
                          
                      </div>
                    </div>
            </div>
            <!-- Fin Modal -->

        </div>
        <!-- /page content -->

        <!-- footer content -->
       <?php 
       include "../footer.php";
       ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>
    
    <!-- include the script -->
    <script src="../../libreriasJS/alertifyjs/alertify.min.js"></script>

    <!-- jquery.inputmask -->
    <script src="../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    
    <!-- Datatables -->
    <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- validator -->
    <script src="../../vendors/validar/jquery.validate.js"></script>
  
    <script src="../../Vistas/ResponsablesEstaciones/validarResponsable.js"></script> 
	
  </body>
</html>
