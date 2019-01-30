<?php
session_start();

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

    <title>Sistema Hidrometeorologico </title>

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

    <style>
body {
        background-image: url("../Vistas/images/ima11.jpg");

}

</style>
  </head>

  <body>

    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="login.php">
              <h1 style="color: #0B6121;">INGRESO DE USUARIO</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" id="usuario" name="usuario" required="true" />
              </div>
              <div>
                <input type="password"  class="form-control" placeholder="Password" id="contra" name="contra" required="true" />
              </div>
              <div>
                <button type="submit" class="btn btn-success">ENTRAR</button>


              </div>

              <div class="clearfix"></div>




                </form>
          </section>
              </div>

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


if (!empty($_POST['usuario']) && !empty($_POST['contra']))  {
$user=$_POST['usuario'];
$pass=$_POST['contra'];

  $momb=mysqli_num_rows(mysqli_query($mysqli,"SELECT nombre_de_usuario FROM usuarios where nombre_de_usuario='$user'"));
  $passw=mysqli_num_rows(mysqli_query($mysqli,"SELECT contrasena FROM usuarios where contrasena='$pass'"));
  $iduser=$mysqli->query("SELECT idusuario FROM usuarios where contrasena='$pass' and nombre_de_usuario='$user' ");

  while($fila = $iduser->fetch_object()){
          $idAccess = $_SESSION["idUsuario"]=$fila->idusuario;
    }

  if ($momb!=0 && $passw!=0) {

echo "<script language='javascript'>";
echo  "
         location.href = 'usuarios.php?aux1=1';
         ";
echo "</script>";

      
    $idAccess;
      
     $_SESSION["validar"]=true;

}else if($momb==0 && $passw==0){
echo "<script language='javascript'>";
echo  "
  alertify.alert('El nombre de usuario o la contraseña es incorrecta');";
echo "</script>";

}
}
?>
