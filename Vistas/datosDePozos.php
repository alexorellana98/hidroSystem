<?php
header("Content-Type: text/html;charset=utf-8");
include "../conexion/conexion.php";

?>

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

    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../libreriasJS/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="../libreriasJS/alertifyjs/css/themes/bootstrap.min.css">

    <script src="../vendors/libreriasJS/alertifyjs/alertify.min.js" ></script>

    <link rel="stylesheet" href="../libreriasJS/alertifyjs/css/alertify.rtl.min.css">
    <script src="../libreriasJS/alertifyjs/alertify.min.js"></script>


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
                <h3>Datos de pozos</h3>
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
                    <h2>Formulario de ingreso de datos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>


                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" id="formPozos">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">



                        <input type="hidden" class="form-control has-feedback-left" id="codigo" placeholder="Código" readonly="readonly">

                        <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                      </div>


                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                          <select id="departamento" name="departamento" class="form-control">
                            <option value="0" selected hidden>Seleccione un departamento</option>
                              <?php
                                $result = $conexion->query("SELECT * FROM departamentos");
                                while($fila=$result->fetch_object()){

                                  echo "<option value=".$fila->iddepto.">".$fila->nombredepto."</option>";
                                }
                              ?>
                            </select>
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                          <select id="municipio" name="municipio" class="form-control">
                            <option value="0"  selected hidden>Seleccione un municipio</option>

                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                          <select id="tipo" name="tipo" class="form-control">
                            <option value="0" selected hidden>Tipo de pozo</option>
                            <option value="municipal">Municipal</option>
                            <option value="gubernamental">Gubernamental (ANDA)</option>
                            <option value="privado">Privado</option>
                            <option value="comunitario">Comunitario</option>
                          </select>
                        </div>


                      <div class="col-md-1 col-sm-1 col-xs-12 ">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Abrir mapa</button>
                      </div>

                      <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                        <input id="latitud" name="latitud" type="text" class="form-control has-feedback-left" placeholder="Latitud, g°" readonly="readonly">
                        <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                        <span class=" form-control-feedback rigth" aria-hidden="true">Lat</span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input id="longitud" name="longitud" type="text" class="form-control has-feedback-left" placeholder="Longitud, g°" readonly="readonly">
                        <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                        <span class=" form-control-feedback rigth" aria-hidden="true">Long</span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input id="altura" name="altura" type="text" class="form-control has-feedback-left" placeholder="Altura, msnm (metros sobre el nivel del mar)">
                        <span class="fa fa-arrow-up form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input id="nivel" name="nivel" type="text" class="form-control has-feedback-left" placeholder="Nivel del pozo, mtrs (metros)">
                        <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input id="profundidad" name="profundidad" type="text" class="form-control has-feedback-left" placeholder="Profundidad, mts (metros)">
                        <span class="fa fa-arrow-down form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input id="fecha" name="fecha" id="fecha" type="text" class="form-control has-feedback-left" placeholder="Fecha de creación" onfocus="(this.type='date')">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>

                      </div>

                        <!--Selected propietarios-->
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                          <select id="propietario" name="propietario" class="form-control">
                            <option value="0" selected hidden>Propietario</option>
                            <?php
                                $result = $conexion->query("SELECT * FROM propietariospozos");
                                while($fila=$result->fetch_object()){

                                  echo "<option value=".$fila->id_propietario.">".$fila->dui."  ".$fila->nombre."</option>";
                                }
                              ?>
                            </select>
                        </div>

                        <div  class="col-md-6 col-sm-6 col-xs-12 form-group">
                          <select id="estado" name="estado" class="form-control">
                            <option value="1" selected>En uso</option>
                            <option value="0">Inactivo</option>


                          </select>
                        </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <textarea id="geologia" name="geologia" class="form-control" style="max-height:150px; min-height:100px; resize: vertical;" placeholder="Geología."></textarea>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <textarea id="observacion" name="observacion" class="form-control" style="max-height:150px; min-height:100px;resize: vertical;" placeholder="Observación."></textarea>
                      </div>

                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>



                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button id="guardar" type="button" class="btn btn-success">Guardar</button>
                        <button type="reset" class="btn btn-warning">Cancelar</button>


                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div><!--Fin del row del formulario-->
            <div class="row"><!--Inicio del row-->

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Datos</h2>
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
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Código</th>
                          <th>Tipo de pozo</th>
                          <th>DUI propietario</th>
                          <th>Estado</th>
                          <th>Municipio</th>
                          <th>Ubicación</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>

                      <tbody class="tabla_ajax">

                       <?php include "tablaDatosPozos.php"; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div><!--Inicio del row-->



          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
       <?php
       include "footer.php";
       ?>
        <!-- /footer content -->
      </div>
    </div>

      <!-- Mapa modal-->


        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"><i class="fa fa-map-marker fa-3x"></i> Ubicación de pozos</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">

                      <div class="col-md-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Seleccione una ubicación</h2>

                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <br />
                              <div class="embed-responsive embed-responsive-4by3">
                                        <iframe id="iframe" src="ej.php" class="embed-responsive-item" allowfullscreen></iframe>
                                      </div>
                            </div>
                          </div>
                      </div>

                    </div><!--Fin del row-->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>

                </div><!--Fin del content-->
              </div>
         </div>

      <!-- Mapa modal-->

      <!--Detalle modal-->
      <div class="modal fade detalle-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong><i class="fa fa-list-ul fa-2x"></i></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                  <table class="table table-bordered">

                      <thead>
                        <tr><th colspan=5 style="text-align:center;"> DETALLE DE POZO </th></tr>
                        <tr bgcolor=#dff8e7>
                          <th>Código</th>
                          <th>Departamento</th>
                          <th>Municipio</th>
                          <th>Propietario</th>
                          <th>Altura sobre el nivel del mar</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th id="cod" ></th>
                          <td id="dep" ></td>
                          <td id="mun" ></td>
                          <td id="prop"></td>
                          <td id="alt" ></td>
                        </tr>
                      </tbody>
                      <thead>
                        <tr bgcolor=#dff8e7>
                          <th>Nivel de pozo</th>
                          <th>Profundidad</th>
                          <th>Fecha de creación</th>
                          <th>Tipo de pozo</th>
                          <th>Estado</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th id="niv" ></th>
                          <td id="prof"></td>
                          <td id="fech"></td>
                          <td id="tip"></td>
                          <td id="est"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <p>Geología:</p>
                          <textarea readonly id="geolo" name="geologia" class="form-control" style="max-height:150px; min-height:100px; resize: none;" placeholder="No hay descripcion de geologia"></textarea>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <p>Observación:</p>
                          <textarea readonly id="observa" name="observacion" class="form-control" style="max-height:150px; min-height:100px;resize: none;" placeholder="No hay una observacion"></textarea>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">

                  <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>

                </div><!--Fin del content-->
              </div>
         </div>

      <!--Detalle modal-->

      <!--Ubicacion Modal-->


      <div class="modal fade ubicacion-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"><i class="fa fa-map-marker fa-3x"></i> Ubicación de pozo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">

                      <div class="col-md-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Ubicación del pozo: <p id="ubi"></p></h2>

                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <br />
                              <div class="embed-responsive embed-responsive-4by3">
                                        <iframe id="iframe2" src="verMapaPozo.php" class="embed-responsive-item" allowfullscreen></iframe>
                                      </div>
                            </div>
                          </div>
                      </div>

                    </div><!--Fin del row-->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>

                </div><!--Fin del content-->
              </div>
         </div>

      <!--Ubicacion Modal-->

      <!--Modal para modificacion-->



        <div class="modal fade editar-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"><i class="fa fa-pencil fa-3x"></i> Editar datos de pozo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">

                      <div class="col-md-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Datos de pozo</h2>

                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <!--Contenido-->
                              <div id="formularioEditar" style="display:block;">
                              <form class="form-horizontal form-label-left input_mask" id="formPozosEdit">
                                  <input id="id" type="hidden" value="">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">



                                    <input type="text" class="form-control has-feedback-left" id="codigoEdit" placeholder="Código" readonly="readonly">

                                    <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                                  </div>


                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                      <select id="deptoEdit" name="deptoEdit" class="form-control">
                                        <option value="0" selected hidden>Seleccione un departamento</option>
                                          <?php
                                            $result = $conexion->query("SELECT * FROM departamentos");
                                            while($fila=$result->fetch_object()){

                                              echo "<option value=".$fila->iddepto.">".$fila->nombredepto."</option>";
                                            }
                                          ?>
                                        </select>
                                    </div>


                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                      <select id="muniEdit" name="muniEdit" class="form-control">
                                        <option value="0"  selected hidden>Seleccione un municipio</option>

                                        </select>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                      <select id="tipoEdit" name="tipoEdit" class="form-control">
                                        <option value="0" selected hidden>Tipo de pozo</option>
                                        <option value="municipal">Municipal</option>
                                        <option value="gubernamental">Gubernamental (ANDA)</option>
                                        <option value="privado">Privado</option>
                                        <option value="comunitario">Comunitario</option>
                                      </select>
                                    </div>


                                  <div class="col-md-1 col-sm-1 col-xs-12 ">
                                    <button id="mapa" type="button" class="btn btn-success"> Mapa</button>
                                  </div>

                                  <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                                    <input id="latEdit" name="latEdit" type="text" class="form-control has-feedback-left" placeholder="Latitud, g°" readonly="readonly">
                                    <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                                    <span class=" form-control-feedback rigth" aria-hidden="true">Lat</span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input id="lonEdit" name="lonEdit" type="text" class="form-control has-feedback-left" placeholder="Longitud, g°" readonly="readonly">
                                    <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                                    <span class=" form-control-feedback rigth" aria-hidden="true">Long</span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input id="alturaEdit" name="alturaEdit" type="text" class="form-control has-feedback-left" placeholder="Altura, msnm (metros sobre el nivel del mar)">
                                    <span class="fa fa-arrow-up form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input id="nivelEdit" name="nivelEdit" type="text" class="form-control has-feedback-left" placeholder="Nivel del pozo, mtrs (metros)">
                                    <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input id="profundidadEdit" name="profundidadEdit" type="text" class="form-control has-feedback-left" placeholder="Profundidad, mts (metros)">
                                    <span class="fa fa-arrow-down form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input name="fechaEdit" id="fechaEdit" type="text" class="form-control has-feedback-left" placeholder="Fecha de creación" onfocus="(this.type='date')">
                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>

                                  </div>

                                    <!--Selected propietarios-->
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                      <select id="propEdit" name="propEdit" class="form-control">
                                        <option value="0" selected hidden>Propietario</option>
                                        <?php
                                            $result = $conexion->query("SELECT * FROM propietariospozos");
                                            while($fila=$result->fetch_object()){

                                              echo "<option value=".$fila->id_propietario.">".$fila->dui."  ".$fila->nombre."</option>";
                                            }
                                          ?>
                                        </select>
                                    </div>

                                    <div  class="col-md-6 col-sm-6 col-xs-12 form-group">
                                      <select id="estadoEdit" name="estadoEdit" class="form-control">
                                        <option value="1" selected>En uso</option>
                                        <option value="0">Inactivo</option>


                                      </select>
                                    </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <textarea id="geologiaEdit" name="geologiaEdit" class="form-control" style="max-height:150px; min-height:100px; resize: vertical;" placeholder="Geología."></textarea>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <textarea id="observacionEdit" name="observacionEdit" class="form-control" style="max-height:150px; min-height:100px;resize: vertical;" placeholder="Observación."></textarea>
                                  </div>

                                  <div class="form-group">
                                    <!--Este div es para que agarre la linea que separa los botones.-->
                                  </div>



                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button id="editarPozo" type="button" class="btn btn-success">Editar</button>



                                    </div>
                                  </div>

                              </form>
                              </div>
                              <!--Contenido-->
                              <div id="mapaEdit" style="display:none;">
                                    <div class="embed-responsive embed-responsive-4by3">
                                              <iframe id="iframe3" src="" class="embed-responsive-item" allowfullscreen></iframe>
                                    </div>
                                    <div class="col-md-1 col-sm-1 col-xs-12 ">
                                    <button id="okeditCoords" type="button" class="btn btn-success">OK!</button>
                                    </div>
                                  </div>
                              </div>
                              <!--iframe-->
                            </div>
                          </div>
                      </div>

                    </div><!--Fin del content-->

                    <div class="modal-footer cerrar">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>


                </div>
              </div>


      <!--Modal para modificacion-->

      <!-- Mapa modal2-->


        <div class="modal fade mapaEdit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"><i class="fa fa-map-marker fa-3x"></i> Ubicación de pozos</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">

                      <div class="col-md-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Seleccione una ubicación</h2>

                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <br />
                              <div class="embed-responsive embed-responsive-4by3">
                                        <iframe id="iframe3" src="" class="embed-responsive-item" allowfullscreen></iframe>
                                      </div>
                            </div>
                          </div>
                      </div>

                    </div><!--Fin del row-->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>

                </div><!--Fin del content-->
              </div>
         </div>

      <!-- Mapa modal2-->

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
	  <script src="../libreriasJS/jquery.mask.min.js"></script>
<script src="../Vistas/js/datosDePozosJs/cargarMunicipios.js"></script>
   <script src="../Vistas/js/datosDePozosJs/procesarDatosJs.js"></script>
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


    <!--scripts de pre procesamiento-->

    

    <!--scripts de pre procesamiento-->

    <!--Scripts de procesamiento-->
    
    <!--Scripts de procesamiento-->

	<!--Configuaracion de las mascaras del formulario-->
	<script>
      $(document).ready(function(){
  $('#codigo').mask('0000');


});
      </script>
      <script>
//-Para validar campos
           $('#altura').mask('000.000.000.000.000,00', {reverse: true});
           $('#nivel').mask('000.000.000.000.000,00', {reverse: true});
           $('#profundidad').mask('000.000.000.000.000,00', {reverse: true});

</script>
  </body>
</html>
