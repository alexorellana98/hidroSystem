<?php
$idAccess = $_SESSION["idUsuario"];
if(isset($_REQUEST["id"])){
    include("../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $result = $conexion->query("select * from propietariospozos where id_propietario='$iddatos'");
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $nombre=$fila->nom;
                $apellido=$fila->apellido;
                $dui=$fila->dui;
                $direccion=$fila->direccion;
                $celular=$fila->telcelular;
                $telefono=$fila->telfijo;
                $genero=$fila->genero;
                $correo=$fila->correo;
                $institucion=$fila->institucion;
                $sitoWeb=$fila->sitio_web;
            }
        }
}else{
    $nombre=null;
    $apellido=null;
    $dui=null;
    $direccion=null;
    $celular=null;
    $telefono=null;
    $genero=0;
    $correo=null;
    $institucion=null;
    $sitoWeb=null;
}
?>
<!DOCTYPE html>
<html lang="es">
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
    <!-- Alertify -->
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
                <h3>Propietarios de pozos</h3>
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
                    </ul>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
  
                    <form class="form-horizontal" id="formPropietario" name="formPropietario" method="post">
                    <input type="hidden" name="bandera" id="bandera"/>
                    <input type="hidden" name="tipoPropietario" id="tipoPropietario"/>
                    <div id="cambiaso"><input type="hidden" id="baccionVer" value="1" /></div>
                    <div class="row">
                    <?php  if(!isset($_REQUEST["id"])){ ?>
                    <div class="col-sm-12 text-center" style="padding-bottom: 10px;">
                        <button type="button" class="btn btn-info" id="btnGuardar" onclick="mostrarFormulario('persona');"><i class="fa fa-male">  Persona</i></button>
                        <button type="button" class="btn btn-info" id="btnGuardar" onclick="mostrarFormulario('insti');"><i class="fa fa-institution">  Institución</i></button>
                    </div> 
                    <?php }?>
                    <?php  if(!isset($_REQUEST["id"])){ ?>          
                     <div id="datosPersona" hidden>
                    <?php }else{?>
                    <div id="datosPersona">
                    <?php }?>
                    
                     <?php  if($institucion==="" || $institucion===null){ ?>
                     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="divDui">  
                        <?php }else{?>
                             <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="divDui" hidden>  
                                <?php }?>
                                        
                             <input type="text" class="form-control has-feedback-left" id="dui" name="dui" placeholder="DUI" onblur="return verificar('dui');" data-inputmask="'mask': '99999999-9'" value="<?php echo $dui; ?>">                              
                        <span class="fa fa-barcode form-control-feedback left" aria-hidden="true" ></span>
                    </div>
                     <?php  if($institucion==="" || $institucion===null){ ?>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="divSitio" hidden> 
                        <?php }else{?>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="divSitio"> 
                                <?php }?>                                           
                             <input type="text" class="form-control has-feedback-left" id="sitio" name="sitio" placeholder="Sitio web de la institución"  value="<?php echo $sitoWeb; ?>">                              
                        <span class="fa fa-barcode form-control-feedback left" aria-hidden="true" ></span>
                    </div>
                     
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="correo" name="correo" placeholder="Correo electrónico." value="<?php echo $correo; ?>" onblur="return verificar('correo');">
                        <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    <?php  if($institucion==="" || $institucion===null){ ?>
                    <div id="divNombre" >
                        <?php }else{?>
                            <div id="divNombre" hidden>
                                <?php }?>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="nombre" name="nombre"  placeholder="Nombre" value="<?php echo $nombre;?>" onkeypress="return soloLetras(event)">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="apellido" name="apellido" placeholder="Apellido"
                            value="<?php echo $apellido;?>" onkeypress="return soloLetras(event)">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>
                     
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="telefono" name="telefono" placeholder="Teléfono" onblur="return verificar('telefono');" data-inputmask="'mask': '2999-9999'" value="<?php echo $telefono; ?>">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="celular" name="celular" placeholder="Celular" onblur="return verificar('celular');" data-inputmask="'mask': '9999-9999'" value="<?php echo $celular; ?>">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="direccion" name="direccion" placeholder="Dirección" value="<?php echo $direccion; ?>">
                        <span class="fa fa-map form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <?php  if($institucion==="" || $institucion===null){ ?>
                    <div class="form-group" id="divGenero">
                        <?php }else{?>
                            <div class="form-group" id="divGenero" hidden> 
                                <?php }?>
                      
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control SSexo" id="sexo" name="sexo" style="width: 100%">
                           <?php if($genero===0){
                            ?>
                                <option value="0" selected >Genero</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            <?php
                            }else if($genero==="Femenino"){
                            ?>
                            <option value="0">Genero</option>
                            <option value="Femenino" selected>Femenino</option>
                            <option value="Masculino">Masculino</option>
                            <?php
                            }else if($genero==="Masculino"){
                            ?>
                            <option value="0">Genero</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino" selected>Masculino</option>
                            <?php
                                }
                              ?>
                          </select>
                        </div>
                      </div>
                      <?php  if($institucion==="" || $institucion===null){ ?>
                    <div id="divInstitucion" hidden>
                        <?php }else{?>
                            <div id="divInstitucion">
                                <?php }?>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="institucion" name="institucion" placeholder="Institución que representa" value="<?php echo $institucion ?>"> <span class="fa fa-institution form-control-feedback left" aria-hidden="true"></span> </div>
                    </div>  
                     </div>
                     
                    
                                       
                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>            
                      <div class="ln_solid"></div>
                      <?php  if(!isset($_REQUEST["id"])){ ?>
                        <div class="form-group text-center" id="divBotones" hidden>
                        <?php }else{?>
                            <div class="form-group text-center" id="divBotones">
                                <?php }?>

                       <?php
                        if(!isset($iddatos)){
                                ?>
                       <button type="button" class="btn btn-success" id="btnGuardar" onclick="verificar('guardar');">Guardar</button>
                        <button type="button" class="btn btn-warning" id="btnCancelarG" onclick="cancelar();">Cancelar</button>
                        <?php
                        }else{
                            ?>
                        <button type="button" class="btn btn-success" id="btnModificar" onclick="verificar('modificar');">Modificar</button>
                        <button type="button" class="btn btn-warning" id="btnCancelar" onclick="cancelar();">Cancelar</button>
                        <?php
                        }?>       
                      </div>
                      </div>
                    </form>              
                </div>
                </div>      
            </div> 
          </div>
          <div class="row">
                <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                   <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <h2>Datos</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                       <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                    <div class="x_title">
                          <div class="col-sm-9">
                              
                          </div>
                           <div class="col-sm-3" id="divInactivos">
                               <button type="button" class="btn btn-dark" id="btnCancelar" onclick="cambio('0');"><i class="fa fa-info-circle"></i>   Propietarios Inactivos</button>
                           </div>
                           <div class="col-sm-3" id="divActivos" hidden>
                               <button type="button" class="btn btn-dark" id="btnCancelar" onclick="cambio('1');"><i class="fa fa-info-circle"></i>  Propietarios Activos</button>
                           </div>
                            <div class="clearfix"></div>
                        </div>
                    <div class="x_content" id="contenidoTabla">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap tablita" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                          <th>Tipo</th>
                          <th>Nombre</th>
                          <th>Celular</th>
                          <th>Direccion</th>
                          <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                      <?php
                    include "../Config/conexion.php";
                    $result = $conexion->query("select * from propietariospozos where activo='1'");
                    if ($result) {
                        while ($fila = $result->fetch_object()) {
                            echo "<tr>";
                            $insti=$fila->institucion;
                            if($insti===null || $insti===""){
                                echo "<td>Persona</td>";
                                $tipo=0;
                            }else{
                                echo '<td>Institución</td>';
                                $tipo=1;
                            }
                             if($tipo==0){echo '<td>'.$fila->nom.' '.$fila->apellido.'</td>';}
                             if($tipo==1){echo '<td>'.$fila->institucion.'</td>';}
                            ?>                                 
                            <td><?php echo $fila->telcelular ?></td>
                            <td><?php echo $fila->direccion ?></td>
                            <td width=160 class="text-center">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#propietarioModal" onclick="actualizarModalPropietario('', '<?php echo $fila->id_propietario ?>')"><i class="fa fa-search" ></i></button>
                            <button type="button" class="btn btn-success" onclick="cambios('modificar','<?php echo $fila->id_propietario ?>','<?php if($tipo==0){echo $fila->nom.' '.$fila->apellido; }else if($tipo===1){echo $fila->institucion;}?>')"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-warning" onclick="cambios('desactivar','<?php echo $fila->id_propietario ?>','<?php if($tipo==0){echo $fila->nom.' '.$fila->apellido; }else if($tipo===1){echo $fila->institucion;}?>');"><i class="fa fa-arrow-circle-down"></i></button>
                             </td>
                            <?php
                            echo "</tr>";
                        }
                    }
                    ?>
                    </tbody>
                    </table>  
                    </div>
                    </div>
                    </div>        
                </div>
                 
              </div>      
            </div> 
          
          </div>
        </div>
        <!-- /page content -->
       
       <!-- div para verificar el cambio de estado -->
       <div id="cambioEstado">
           <input type="hidden" value="0" name="quepaso" id="quepaso"/>
       </div>
       
       
      </div>
    </div>
     <!-- footer content -->
       <?php 
       include "footer.php";
       ?>
        <!-- /footer content -->
    
     <!--- Modal -->
        <div class="modal fade" id="propietarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <h4 class="modal-title" id="exampleModalLabel">Informacion propietario</h4> </center>
                    </div>
                    <div class="modal-body" id="cargala"> 
                    <br><br><br><br><br><br><br><br><br><br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal -->
        
    <!-- JQUery Form -->
    <script src="../libreriasJS/jquery_form/dist/jquery.form.min.js"></script>
    <!-- Personal -->
    <script src="js/propietariosPozos/propietariosPozos.js"></script>
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
    <script src="../vendors/select2/dist/js/select2.min.js"></script>
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
    <!-- Jquery Mask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>  
    <!-- Alertify -->
    <script src="../libreriasJS/alertifyjs/alertify.min.js"></script>
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
    <script>
        $(function () {
            $('.SSexo').select2()
        });
    </script>
  </body>
</html>
<?php
    include '../Config/conexion.php';
    $bandera=$_REQUEST["bandera"];
    $nombre=$_REQUEST["nombre"];
    $apellido=$_REQUEST["apellido"];
    $telefono=$_REQUEST["telefono"];
    $direccion=$_REQUEST["direccion"];
    $celular=$_REQUEST["celular"];
    $genero=$_REQUEST["sexo"];
    $correo=$_REQUEST["correo"];
    $dui=$_REQUEST["dui"];
    $institucion=$_REQUEST['institucion'];
    $sitio=$_REQUEST["sitio"];

if ($bandera == "guardar") {
    $consulta  = "INSERT INTO propietariospozos VALUES('".$dui."','".$nombre."','".$apellido."','".$direccion."','".$celular."','".$telefono."','".$genero."','1','null','".$idAccess."','".$correo."','".$institucion."','".$sitio."')";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
       mensaje("exito","guardar");
    } else {
       mensaje("error","guardar");
    }
}
if($bandera==="modificar"){
     $consulta  = "UPDATE propietariospozos set apellido='".$apellido."',  nom='" . $nombre."',telfijo='" . $telefono . "',direccion='" . $direccion . "', telcelular='".$celular."', correo='".$correo."', genero='".$genero."', institucion='".$institucion."', sitio_web='".$sitio."' where id_propietario='".$iddatos."'";
     $resultado = $conexion->query($consulta);
    if ($resultado) {
        mensaje("exito","modificar");
    } else {
        mensaje("error","modificar");
    }
}

function mensaje($tipo,$opcion){
            echo "<script language='javascript'>";
            echo "detener();";
            echo "alerta('".$tipo."','".$opcion."');";
            echo "</script>";
}
?>
















