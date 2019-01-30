<!DOCTYPE html>

<html lang="es">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Ingenieria de Software</title>

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
   
  
  </head>
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

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
             <!-- sidebar menu -->
             <?php 
               include "../Vistas/menuPrincipal.php";
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
        <div class="top_nav"  align="center">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">Sistemas Operativos
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
        <div class="right_col" role="main" align="center">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3>Visitantes pozos</h3>
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
            </div> <!-- Fin gage -->

            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-3">
                
            </div>
              <div class="col-md-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title"  align="center">
                    <h2>Formulario de ingreso</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />
                    <form id="guardar" method="post" class="form-horizontal form-label-left input_mask" enctype="multipart/form-data">
                        
                        <input type="hidden" name="tirar" id="pase"/>

                      

                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <input name="nombre" type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nombre" autocomplete="off" onkeypress="return soloLetras(event)" onpaste="return false" required="">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback">
                        <input name="celular" type="text" class="form-control mask-celular has-feedback-left" id="inputSuccess2" placeholder="Celular" autocomplete="off" size="10" required="">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback">
                        <input name="dui" type="text" class="form-control mask-dui has-feedback-left" id="inputSuccess2" placeholder="DUI" autocomplete="off" required autofocus">
                        <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                      </div>

                     <div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback">
                        <select class="form-control" name="genero">
                          <option value="">Genero</option>
                          <option value="Femenino">Femenino</option>
                          <option value="Masculino">Masculino</option>

                        </select>
                        
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="tipo" class="form-control">
                            <option value="">Tipo</option>
                            <option value="estudiante">Estudiante.</option>
                            <option value="docente">Docente</option>
                            <option value="investigador">Investigador</option>
                             <option value="Otros">Otro</option>
                          </select>
                        </div>
                      </div>                     

             
                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>



                      <div class="ln_solid"></div>
                      <div class="form-group">
               <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                    <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-3">
                        <input type="submit" value="Guardar" name="guardar" class="btn btn-info" id="guarda"></dinput>
                        <button type="button" class="btn btn-warning" id="cancela">Cancelar</button>
                    </div>
              
                        

                    

                    </form>
                       
                    </div>

  <?php
      if (isset($_REQUEST['tirar'])) {
        try {
        include_once '../conexion/php_conexion.php';
        $Dui = $_POST["dui"];
        $Nombre = $_POST["nombre"];
        $Genero = $_POST["genero"];
        $Tipo = $_POST["tipo"];
        $Celular = $_POST["celular"];
        

         mysqli_query($conexion, "INSERT INTO visitantes(dui, nombre, genero, tipo, celular) VALUES ('$Dui', '$Nombre', '$Genero', '$Tipo', '$Celular')");
         echo' 
             
            <script type="text/javascript">
              

          alertify.success("Registro Guardado    ✔");
    alertify.set("notifier","position", "top");
            </script>
            ';
        } catch (Exception $e) {
            
         
               echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-right");

          alertify.error("Algo salio mal :(");

       alertify.error("EL USUARIO O CORREO YA HAN SIDO REGISTRADOS PRUEBA OTRA ");



        
            </script>
            ';  
                
            
        }
      }     
    
    ?>
                  </div>
                  </div>
            
</div>

</body>
              
        
        <!-- SEGUNDO CONTENEDOR PARA LA TABLA  -->
<?php
include_once '../Vistas/buscaVisitantes.php';


?>

 

       <?php 
       include "../Vistas/footer.php";
       ?>
        <!-- /footer content -->
     
   
  
</html>

<script src="../LibreriasJS/jquery.mask.min.js"></script>

<script type="text/javascript">
    $('.mask-dui').mask('00000000-0');
    $('.mask-celular').mask('0000-0000');

</script>

<script>
  
  $("#order").on( 'click', function () {
      reset();
      alertify.set({ buttonReverse: true });
      alertify.confirm("Confirm dialog with reversed button order", function (e) {
        if (e) {
          alertify.success("You've clicked OK");
        } else {
          alertify.error("You've clicked Cancel");
        }
      });
      return false;
    });
</script>




 <script>
           $(document).ready(function(){
            $('#cancel').click(function(){
              alertify.succes("Mensaje de prueba");
            });
           })
         </script> 





