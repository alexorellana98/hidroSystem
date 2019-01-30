<?php
require '../ProcesoSubir/conexion.php';
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

<script type="text/javascript">




  function sele(){
  var cond= $("#condi").val();
  if (cond==1) {
     window.location="../Vistas/usuarios.php?aux1=1";
  }else{window.location="../Vistas/usuariosBaja.php";}

}



</script>
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

        <form class="form-horizontal form-label-left input_mask"  method="post" action="usuarios.php">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Datos de usuario</h3>
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
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="nombre" name="nombre" placeholder="Nombre" autocomplete="off" onkeypress="return soloLetras(event)" onpaste="return false" maxlength="45" pattern=".{5,}" title="5 caracteres para codigo real" >
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true" required></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="direccion" name="direccion" placeholder="Dirección" autocomplete="off" maxlength="150" pattern=".{10,}" title="10 caracteres para codigo real" required>
                        <span class="fa fa-map form-control-feedback left" aria-hidden="true"></span>
                      </div>

                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="telefono" name="telefono" placeholder="Teléfono" pattern=".{8,}" maxlength="8" autocomplete="off">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true" required></span>
                      </div>
                 <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="genero" name="genero" >
                            <option disabled="true">Seleccione genero</option>
                            <option>Femenino</option>
                            <option>Masculino</option>
                            </select>
                        </div> </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="correo" name="correo" placeholder="E-mail" autocomplete="off" onkeyup="validarEmail(this)">
                        <a id='resultado' required></a>
                        <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                      </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="usuario" name="usuario" placeholder="Nombre de Usuario" autocomplete="off"
                         maxlength="15" pattern=".{5,}" title="5 caracteres para codigo real" required>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="password" class="form-control has-feedback-left" id="contrasena" name="contrasena" placeholder="Contraseña" maxlength="8" pattern=".{5,}" autocomplete="off">
                        <span class="fa fa-at form-control-feedback left" aria-hidden="true" required></span>
                      </div>


                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>



                      <div class="ln_solid"></div>
                      <div class="form-group" style="margin-left: 220px;">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" id="guarda" class="btn btn-success">Guardar</button>
                          <button type="reset" class="btn btn-warning" href="#">Cancelar</button>

               <!-- <button class="btn btn-primary" type="reset">Reset</button> -->

                        </div>
                      </div>


                  </div>
                </div>
              </div>
            </div><!--Fin del row del formulario-->

          </div>

</form>
    <?php

if (!empty($_POST['btnalta']))  {
//Inactiva el activo
$est=1;
$var =$_POST['btnalta'];
$sql = " UPDATE usuarios set estado='$est' WHERE idusuario='$var'";
$resultado = $mysqli->query($sql);
}
?>
     <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Datos de usuario</h2>
                    <br>
                    <br>
                    <!--para desplegar la tabla-->
                     <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                   </li>

                    </ul><!--FIN para desplegar la tabla-->
  <div class="col-md-2 "  style="  margin-left: -10px; margin-top:-15px;">
  <label for="condi">Estado :</label>
 <select class="form-control" data-live-search="true" id="condi" name="condi" onchange="sele()">
<option></option>
<option value="1" disabled="true">Activo</option>

<option value="0" >Inactivo </option>
</select>
</div>

                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                   <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Direccion</th>
                          <th>Telefono</th>
                          <th>Genero</th>
                          <th>Correo</th>
                          <th>Contraseña</th>
                          <th>Nombre Usuario</th>

                          <th>Editar</th>
                          <th>Inactivar</th>
                        </tr>
                      </thead>
                            <!-- extraccion de datos de la base  -->
                            <tbody>

                          <?php
                          include "../ProcesoSubir/conexion.php";
              $query = mysqli_query ($mysqli,"SELECT * FROM usuarios where estado=1");

                while ($fila=mysqli_fetch_array($query)) {
                  $datos=$fila['nombre_real']."||".$fila['direccion']."||".$fila['telefono']."||".$fila['genero']."||".$fila['email']."||".$fila['contrasena']."||".$fila['nombre_de_usuario']."||".$fila['idusuario'];




                    $nombrereal =$fila['nombre_real'];
                    $direccion = $fila['direccion'];
                    $tel=$fila['telefono'];
                    $genero=$fila['genero'];
                    $correo=$fila['email'];
                    $contra=$fila['contrasena'];
                    $nombreusu=$fila['nombre_de_usuario'];
                    $id=$fila['idusuario'];
                ?>

                        <tr>
                          <td><?php echo $fila['nombre_real']; ?></td>
                          <td><?php  echo $fila['direccion']; ?></td>
                          <td><?php  echo $fila['telefono'];?></td>
                          <td><?php  echo $fila['genero']; ?></td>
                          <td><?php  echo $fila['email']; ?></td>
                          <td ><?php  echo $clave1=base64_encode($fila['contrasena']); ?></td>
                          <td><?php  echo $fila['nombre_de_usuario']; ?></td>


                         <td><!--boton de modificar-->
                                  <div class="row">
                                    <div class="col-md-6">

                                        <button type="button"   class="btn btn-success" data-target="#idDeActualizacion" data-toggle="modal" onclick="datosModal('<?php echo $datos?>')" ><i class="fa fa-pencil" ></i></button>

                                    </div>


                                  </div>
                                  </td>
                                  <td>

                                      <div class="row">


                                         <div class="col-md-6">
                                        <form  action="usuariosBaja.php" method="post" class="form-register" >
                                        <button   type="submit" class="btn btn-danger" name="btnbaja"
                                        id="btnbaja" value="<?php echo $fila['idusuario'];?>"><i class="fa fa-arrow-down"></i></button>
                                      </form>

                                    </div>

                                      </div>
                                  </td>
                               </tr>


                       <?php } ?>

                      </tbody>

                    </table>

                      </div>
                      </div>

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
</div>


<!--INICIO DE MODAL -->
 <form class="form-horizontal form-label-left input_mask" method="post" action="usuarios.php">
 <div class="modal fade" id="idDeActualizacion" tabindex="-1" aria-labelledby="myModalLabel"  aria-hidden="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">
                    <font font font font font font color="black">Editar Registro</font></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;</button>
                </div>

                <div class="panel-body">
                    <br>
<div class="row">

                  <div class="col-md-30 col-sm-30 col-xs-30"

              <div class="col-md-20 col-xs-15">


                  <div class="x_content">
                    <br />

                    <!--campo invisible-->
                     <input type="hidden"  class="form-control has-feedback-left" id="ideus2" name="ideus2" >


                      <div class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">
                      <label>Nombre </label>
                      <input type="text" class="form-control has-feedback-left" id="nombre2" name="nombre2" placeholder="Nombre" onkeypress="return soloLetras(event)" onpaste="return false"
                      maxlength="45" pattern=".{5,}" title="5 caracteres para codigo real" autocomplete="off" required>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Dirección </label>
                        <input type="text" class="form-control has-feedback-left" id="direccion2" name="direccion2" placeholder="Direccion" autocomplete="off" maxlength="150" pattern=".{10,}" title="10 caracteres para codigo real" required>
                        <span class="fa fa-map form-control-feedback left" aria-hidden="true"></span>
                      </div>

                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                       <label>Teléfono </label>
                        <input type="text" class="form-control has-feedback-left" id="telefono2" name="telefono2" placeholder="Teléfono" maxlength="8" pattern=".{8,}" required>
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                        <div class="form-group">
                        <label>Genero</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="genero2" name="genero2">
                            <option disabled="true">Seleccione genero</option>
                            <option>Femenino</option>
                            <option>Masculino</option>
                            </select>
                        </div> </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>E-mail</label>
                        <input type="text" class="form-control has-feedback-left" id="correo2" name="correo2" placeholder="E-mail" onkeyup="validarEmail(this)">
                        <a id='resultado' required></a>
                        <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                      </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Tipo de usuario</label>
                        <input type="text" class="form-control has-feedback-left" id="usuario2" name="usuario2" placeholder="Nombre de Usuario" maxlength="15" pattern=".{5,}" title="5 caracteres para codigo real" required>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                       <label>Contraseña</label>
                        <input type="password" class="form-control has-feedback-left" id="contrasena2" name="contrasena2" placeholder="Contraseña" maxlength="8" pattern=".{5,}" required autocomplete="off">
                        <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                      </div>



                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>



                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" id="guarda" class="btn btn-success">Guardar</button>
                          <button type="dissmit" class="btn btn-warning">Cancelar</button>
               <!-- <button class="btn btn-primary" type="reset">Reset</button> -->

                        </div>
                      </div>



                </div>

            </div><!--Fin del row del formulario-->
            </div>
</div>
            </div>
            </div>
</div>


</div>
</form>
<!-- FIN DE MODAL-->
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
    <link rel="stylesheet"  type="text/css" href="../libreriasJS/alertifyjs/css/alertify.css">

    <link rel="stylesheet" type="text/css" href="../libreriasJS/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="../libreriasJS/alertifyjs/css/alertify.rtl.css">
    <link rel="stylesheet" type="text/css" href="../libreriasJS/alertifyjs/css/alertify.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="../libreriasJS/alertifyjs/css/themes/default.css">

    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="../vendors/jQuery-Mask-Plugin-master/dist/jquery.mask.js" type="text/javascript"></script>
    <script src="../vendors/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js" type="text/javascript"></script>


    <script src="../libreriasJS/alertifyjs/alertify.js"></script>
    <script src="../libreriasJS/alertifyjs/alertify.min.js"></script>

  </body>
</html>
<?php

//inicio de consulta para comparar correo y contrasena

if (!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['telefono']) && !empty($_POST['genero']) && !empty($_POST['correo']) && !empty($_POST['usuario']) && !empty($_POST['contrasena']))  {
$cor=$_POST['correo'];
$nom=$_POST['nombre'];

  $momb=mysqli_num_rows(mysqli_query($mysqli,"SELECT nombre_real FROM usuarios where nombre_real='$nom'"));
  $mail=mysqli_num_rows(mysqli_query($mysqli,"SELECT email FROM usuarios where email='$cor'"));
  if ($momb==0 && $mail==0) {
    //inserta usuario
$est=1;
$insertar="INSERT INTO usuarios (nombre_de_usuario,nombre_real,direccion,telefono,genero,email,contrasena,estado) VALUES ('$_POST[usuario]','$_POST[nombre]','$_POST[direccion]','$_POST[telefono]','$_POST[genero]','$_POST[correo]','$_POST[contrasena]','$est')";
$ejecutar=mysqli_query($mysqli,$insertar);

echo "<script language='javascript'>";
echo  "
  alertify.alert('Guardado con exito');";
echo "</script>";

echo "<script language='javascript'>";
echo  "
         location.href = 'usuarios.php?aux1=1';
         ";
echo "</script>";


}else{
echo "<script language='javascript'>";
echo "$('#nombre').val('$_POST[nombre]');
    $('#direccion').val('$_POST[direccion]');
    $('#telefono').val('$_POST[telefono]');
    $('#genero').val('$_POST[genero]');
    $('#correo').val('$_POST[correo]');
    $('#contrasena').val('$_POST[contrasena]');
    $('#usuario').val('$_POST[usuario]');

   ";
echo "</script>";

echo "<script language='javascript'>";
echo  "
  alertify.alert('El nombre o el correo ya existen');";
echo "</script>";


  }
}else if (!empty($_POST['nombre2']) && !empty($_POST['direccion2']) && !empty($_POST['telefono2']) && !empty($_POST['genero2']) && !empty($_POST['correo2']) && !empty($_POST['usuario2']) && !empty($_POST['contrasena2']) && !empty($_POST['ideus2']))  {
    //inserta usuario
$est=1;

$insertar ="UPDATE usuarios set nombre_de_usuario='$_POST[usuario2]',nombre_real='$_POST[nombre2]',direccion='$_POST[direccion2]',telefono='$_POST[telefono2]',genero='$_POST[genero2]',email='$_POST[correo2]',contrasena='$_POST[contrasena2]',estado='$est' WHERE idusuario='$_POST[ideus2]'";

$ejecutar=mysqli_query($mysqli,$insertar);
echo "<script language='javascript'>";
echo  "
  alertify.alert('Datos editados con exito');";
echo "</script>";


echo "<script language='javascript'>";
echo  "
         location.href = 'usuarios.php?aux1=1';
         ";
echo "</script>";

}else {

if ($_GET['aux1'] !=1) {
echo "<script language='javascript'>";
echo  "
  alertify.alert('No se pueden guardar campos vacios');";
echo "</script>";
}

}


?>




 <script type="text/javascript">
    $(document).ready(function(){
                              $("#btnbaja").click(function(){
                  alertify.alert("Usuario dado de baja con exito");

                });
            });

            </script>


<script>
function Editar(nombre_real,direccion,telefono,genero,email,contrasena,nombre_de_usuario,id){
    $("#nombre").val(nombre_real);
    $("#direccion").val(fechavisita);
    $("#telefono").val(telefono);
    $("#genero").val(genero);
    $("#email").val(email);
    $("#contrasena").val(contrasena);
    $("#usuario").val(nombre_de_usuario);
    $("#idDeActualizacion").val(id);



}

function datosModal(datos){
d=datos.split('||');
    $("#nombre2").val(d[0]);
    $("#direccion2").val(d[1]);
    $("#telefono2").val(d[2]);
    $("#genero2").val(d[3]);
    $("#correo2").val(d[4]);
    $("#contrasena2").val(d[5]);
    $("#usuario2").val(d[6]);
    $("#ideus2").val(d[7]);


}


</script>
<script src="../libreriasJS/alertify.js"></script>
    <script src="../libreriasJS/alertify.min.js"></script>


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


function validarEmail(correo){

  var texto = document.getElementById(correo.id).value;
  var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

  if (!regex.test(texto)) {
      document.getElementById("resultado").innerHTML = "Correo invalido";
  } else {
    document.getElementById("resultado").innerHTML = "";
  }

}

    function soloLetras(e) {
        key = e.keyCode || e.which;
        teclado = String.fromCharCode(key).toLowerCase();
        letras = " Ã¡Ã©Ã­Ã³ÃºabcdefghijklmnÃ±opqrstuvwxyz";
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

<script src="../jquery.mask.min.js"></script>

<script type="text/javascript">
    $('.mask-dui').mask('00000000-0');
    $('.mask-celular').mask('0000-0000');

</script>
